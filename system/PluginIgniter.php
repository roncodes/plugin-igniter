<?php   
class PI_System {

	public $version = '1.0';
	
	public $controllers = array();
	
	private $load; // PI_Loader property is loaded from the system for wide use
	
	function __construct()
	{
		/* Constants */
		define('PI_SYS_VERSION', $this->version);
		define('PI_SYS_AUTHOR', 'Ronald A. Richardson');
		define('PI_SYS_WEBSITE', 'www.ronaldarichardson.com');
		
		/* Set PluginIgniter defaults */
		if(PIINFO){
			$this->wp_pi_menu();
		}
		
		/* Load system helpers */
		foreach(glob(BASEPATH . 'helpers/*.php') as $helper) 
		{  
			include($helper);
		}
		
		/* Load core classes */
		foreach(glob(BASEPATH . 'core/*.php') as $core) 
		{  
			include($core);
		}
		$pi = new PI_Controller;
		
		/* Load System libraries */
		foreach(glob(BASEPATH . 'libraries/*.php') as $lib) 
		{  
			include($lib);
		}
		
		/* Load helpers */
		foreach(glob(PLUGINPATH . 'helpers/*.php') as $helper) 
		{  
			include($helper);
		}
		
		/* Load Controllers */
		foreach(glob(PLUGINPATH . 'controllers/*.php') as $controller_file) 
		{  
			include($controller_file);
			$controller_name = get_class_name_from_file($controller_file);
			$this->controllers[] = new $controller_name;
		}
	
	}
	
	function base_load($file, $data = array())
	{
		extract($data, EXTR_OVERWRITE);
		include(BASEPATH . $file . EXT);
	}
	
	function plugin_load($file, $data = array())
	{
		extract($data, EXTR_OVERWRITE);
		include(PLUGINPATH . $file . EXT);
	}
	
	function wp_pi_menu()
	{
		add_action('admin_menu', array($this, 'wp_pi_options'));
	}
	
	function wp_pi_options()
	{
		add_options_page('WP PluginIgniter', 'WP PluginIgniter', 'add_users', 'WPPluginIgniter', array($this, 'wp_pi_info'), '', 4);
	}
	
	function wp_pi_info()
	{
		$this->base_load('interface/' . str_replace(EXT, '', basename(__FILE__)));
	}
	
}
$sys = new PI_System;
