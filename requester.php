<?php
$basepath = dirname(__FILE__);
require_once $basepath . '/libraries/loader.php';

jimport('app.Dispatcher');

$result = Dispatcher::handleRequest();

echo json_encode($result);