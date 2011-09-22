<?php
require_once(dirname(__FILE__) . '/../../includes/config.php');

class Dispatcher
{
	public static function handleRequest()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$invokeData = self::getServiceAndMethod($_POST);
		}
		else if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$invokeData = self::getServiceAndMethod($_GET);
		}
		else
		{
			throw new Exception('Invalid Request Method');
		}

		$service = self::createService($invokeData['service']);
		$result = self::invokeMethod($service, $invokeData['method']);

		return $result;
	}

	private static function getServiceAndMethod($array)
	{
		if (!isset($array['service']) || !isset($array['method']))
		{
			throw new Exception('Invalid Argument');
		}

		return array('service' => $array['service'], 'method' => $array['method']);
	}

	public static function findService($name)
	{
		$servicePath = SERVICES_DIR;
		$availableServices = glob("$servicePath/service.*.php");
		$selectedService = null;
		foreach ($availableServices as $curService)
		{
			// "/pfad/zu/datei/service.Name.php" zu "service.Name"
			$basename = basename($curService, '.php');
			$start = strpos($basename, '.') + 1;

			// "service." abschneiden
			$basename = substr($basename, $start);
			if (strcasecmp($basename, $name) == 0)
			{
				$selectedService = $curService;
				break;
			}
		}
		return $selectedService;
	}

	public static function createService($serviceName)
	{
		$selectedService = self::findService($serviceName);
		if ($selectedService == null)
		{
			throw new Exception('Invalid Service Requested');
		}

		require_once($selectedService);

		$service = new ReflectionClass($serviceName);

		return $service->newInstance();
	}

	public static function buildParameters($method)
	{
		$methodParameters = $method->getParameters();

		$parameters = array();
		foreach ($methodParameters as $param)
		{
			if ($_SERVER['REQUEST_METHOD'] == 'POST' && array_key_exists($param->getName(), $_POST))
			{
				$value = $_POST[$param->getName()];
			}
			else if (array_key_exists($param->getName(), $_GET))
			{
				$value = $_GET[$param->getName()];
			}
			else if ($param->isDefaultValueAvailable())
			{
				$value = $param->getDefaultValue();
			}
			else
			{
				throw new Exception('Invalid Argument');
			}
			$parameters[$param->getName()] = $value;
		}

		return $parameters;
	}

	public static function invokeMethod($instance, $methodName)
	{
		$serviceObject = new ReflectionObject($instance);
		$method = $serviceObject->getMethod($methodName);
		if ($method == null)
		{
			throw new Exception('Method not found');
		}
		$parameters = self::buildParameters($method);

	    return $method->invokeArgs($instance, $parameters);
    }
}
