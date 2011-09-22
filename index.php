<?php
// Library Loader einbinden
$basepath = dirname(__FILE__);
require_once $basepath . '/libraries/loader.php';

// Beispiel für eigene Library mit DB-Funktionalität
jimport('app.database.user');

$user = new User();
$result = $user->addUser('John Doe');

echo $result;
