<?php
// Example 1: Load a Smarty Template that shows some basic AJAX

// Library Loader einbinden
$basepath = dirname(__FILE__);
require_once $basepath . '/libraries/loader.php';

// Smarty Template Engine einbinden
jimport('app.MySmarty');

$smarty = new MySmarty();
$smarty->assign('subTitle', 'Powered by unobtrusive Javascript!');
$smarty->display('example1.tpl');
