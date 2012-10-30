<?php
class PI_Loader extends PI_Controller {

	protected $_pi_ob_level;
	
	/* Base classes */
	protected $_base_classes		= array(); // Set by the pi controller class
	
	/* Properties */
	protected $_pi_cached_vars		= array();
	protected $_pi_classes			= array();
	protected $_pi_loaded_files		= array();
	protected $_pi_models			= array();
	protected $_pi_helpers			= array();
	
	/* Model misc */
	public $_pi_loaded_models_alias = array();
	static $alias;
	
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
	
	public function library($lib = NULL, $alias = false)
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
		
		$lib_class = get_class_name_from_file($file);
		$lib_name = ($alias) ? $alias : $lib_class;
		
		include($file);
		$lib = new $lib_class;
		parent::__set($lib_name, $lib);
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
	
	public function model($model, $alias = false)
	{
		$file = PLUGINPATH . 'models/' . $model . EXT;
		if($model==NULL) {
			log_message('error', 'Attempted to load non existing model');
			return false;
		}
		if(!file_exists($file)) {
			log_message('error', 'Attempted to load non existing model');
			return false;
		}
		if (preg_match('/[^a-zA-Z]+/', $alias, $matches)) {
			log_message('error', 'Model alias contains special characters');
			return false;
		}
		
		$model_class = get_class_name_from_file($file);
		$model_name = ($alias) ? $alias : $model_class;
		
		include($file);
		$model = new $model_class;
		parent::__set($model_name, $model);
	}
	
}