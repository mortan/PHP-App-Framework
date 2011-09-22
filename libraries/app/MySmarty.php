<?php
$basepath = dirname(__FILE__);

define('SMARTY_DIR', $basepath . '/../smarty/');

require_once($basepath . '/../../includes/config.php');
require_once($basepath . '/../smarty/Smarty.class.php');

// smarty configuration
class MySmarty extends Smarty
{
    function __construct()
    {      
      parent::__construct();
      $this->template_dir = SMARTY_DATA_DIR . 'templates';
      $this->compile_dir = SMARTY_DATA_DIR . 'templates_c';
      $this->config_dir = SMARTY_DATA_DIR . 'configs';
      $this->cache_dir = SMARTY_DATA_DIR . 'cache';
    }
}
  