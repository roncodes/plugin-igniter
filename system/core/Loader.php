<?php
class PI_Loader {

	protected $_pi_ob_level;
	
	/* Paths */
	protected $_pi_view_paths		= array();
	protected $_pi_library_paths	= array();
	protected $_pi_model_paths		= array();
	protected $_pi_helper_paths		= array();
	
	/* Base classes */
	protected $_base_classes		= array(); // Set by the pi controller class
	
	/* Properties */
	protected $_pi_cached_vars		= array();
	protected $_pi_classes			= array();
	protected $_pi_loaded_files		= array();
	protected $_pi_models			= array();
	protected $_pi_helpers			= array();
	
	public function __construct()
	{
		$this->_pi_ob_level  = ob_get_level();
		$this->_pi_library_paths = array(PLUGINPATH, BASEPATH);
		$this->_pi_helper_paths = array(PLUGINPATH, BASEPATH);
		$this->_pi_model_paths = array(PLUGINPATH);
		$this->_pi_view_paths = array(PLUGINPATH.'views/'	=> TRUE);

		log_message('debug', "Loader Class Initialized");
	}
	
	public function initialize()
	{
		$this->_pi_classes = array();
		$this->_pi_loaded_files = array();
		$this->_pi_models = array();

		return $this;
	}
	
	public function library($lib = NULL)
	{
		$file = PLUGINPATH . 'libraries/' . $lib . EXT;
		if($lib==NULL) {
			log_message('error', 'Attempted to load non existing library');
			return false;
		}
		if(!file_exists($file)) {
			log_message('error', 'Attempted to load non existing library');
			return false;
		}
		include($file);
		$lib_name = get_class_name_from_file($file);
		$this->$lib_name = new $lib_name;
		return $this->$lib_name;
	}
	
	public function view($view = NULL, $data = array())
	{
		$file = PLUGINPATH . 'views/' . $view . EXT;
		if($view==NULL) {
			log_message('error', 'Attempted to load non existing view');
			return false;
		}
		if(!file_exists($file)) {
			log_message('error', 'Attempted to load non existing view');
			return false;
		}
		extract($data, EXTR_OVERWRITE);
		include($file);
	}
	
}