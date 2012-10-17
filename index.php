<?php   
/* 
    Plugin Name: Infusionsoft Wordpress Plugin for Developers
    Plugin URI: http://www.infusionsoft.com/
    Description: The core application that serves Infusionsoft API hooks for developers
    Author: Ronald A. Richardson
    Version: 1.0 
    Author URI: http://www.ronaldarichardson.com/
*/  

class Core {
	
	function __construct()
	{
		/* Plugin vars */
		$this->plugin_dir = str_replace('\\', '/', ABSPATH . 'wp-content/plugins/' . basename(dirname(__FILE__))).'/';

		/* Load libraries */
		foreach(glob($this->plugin_dir . 'libraries/*.php') as $lib) 
		{  
			include($lib);
		}
		
		/* Load helpers */
		foreach(glob($this->plugin_dir . 'helpers/*.php') as $helper) 
		{  
			include($helper);
		}
		
		/* Backend */
		include($this->plugin_dir . 'backend/core.php');
		$backend = new Backend;
		
		/* Load Controllers and views */
		foreach(glob($this->plugin_dir . 'controllers/*.php') as $controller_file) 
		{  
			include($controller_file);
			$controller_name = ucfirst(basename($controller_file, '.php'));
			$controller = new $controller_name;
			if($controller_name=='Infusionsoft'){
				$this->infusionsoft = $controller;
				$this->run = $controller;
			}
			add_shortcode(basename($controller_file, '.php'), array($controller, 'index'));
		}
	
	}
	
	function load($file, $data = array())
	{
		extract($data, EXTR_OVERWRITE);
		include($this->plugin_dir . $file . '.php');
	}
	
}
$infusionsoft = new Core;