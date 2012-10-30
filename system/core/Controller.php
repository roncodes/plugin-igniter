<?php   
class PI_Controller extends PI_System {
	
	private static $instance;
	
	public static $load;
	
	public static $active_properties = array();
	
	function __construct()
	{
		self::$instance =& $this;
		
		$this->load = new stdClass;
		
		add_action('init', array($this, '_wp_init'));
	}
	
	public static function _init($controller = NULL)
	{
		/* Auto-generate WP shortcodes to controllers and it's methods */
		foreach (get_class_methods(get_class($controller)) as $method) {
			$method = ($method=='__construct') ? 'index' : $method;
			if($method==__FUNCTION__){ break; }
			if($method=='index') {
				add_shortcode(strtolower(get_class($controller)), array(get_class($controller), $method));
			}
			add_shortcode(strtolower(get_class($controller)).'_'.$method, array(get_class($controller), $method));
		}
		/* PI Loader for use */
		self::$load = new PI_Loader;
		self::$instance->load = self::$load;
		$controller->load = self::$load;
	}
	
	public function __set($name, $value)
    {
        self::$active_properties[$name] = $value;
    }
	
	public function __get($name)
	{
        return self::$active_properties[$name];
    }
	
	public static function _load()
	{
		return self::$load;
	}
	
	public static function &_get_instance()
	{
		return self::$instance;
	}
	
	public static function _wp_init()
	{
		if(isset($_GET['controller'])) {
			// $pi = self::_get_instance();
			foreach(glob(PLUGINPATH . 'controllers/*.php') as $controller) 
			{  
				$class = get_class_name_from_file($controller);
				if(strtolower($class)==strtolower($_GET['controller'])){
					$controller = new $class;
					if(isset($_GET['method'])) {
						$controller->$_GET['method']();
					}
					break;
				}
			}
			die();
		}
	}
	
}
