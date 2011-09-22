<?php
$basepath = dirname(__FILE__);

require_once($basepath . '/../libraries/loader.php');

jimport('app.database.user');

class BasicAccess
{
    public function addUser($userName)
    {
    	// Just a proto, add authentification!
    	$loggedIn = true;
    	
    	if (!$loggedIn)
    	{
    		// Or exception handling!
    		return "not logged in";
    	}
    	
        $user = new User();
		$result = $user->addUser($userName);
			
		return $result;
    }
}