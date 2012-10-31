<?php
class PI_Control_Panel extends PI_System {

	public $view;
	
	public $data;

	/**
	 * This core library allows for the easy creation for control panels
	 * in the Wordpress back-end
	 */
	public function __construct() { }
	
	public function generate($view, $data)
	{
		$this->view = $view;
		$this->data = $data;
		add_action('admin_menu', array($this, '_menu'));
	}
	
	public function _menu()
	{
		add_options_page(PLUGIN_NAME, PLUGIN_NAME, 'add_users', PLUGIN_NAME, array($this, '_page'), '', 4);
	}
	
	public function _page()
	{
		extract($this->data, EXTR_OVERWRITE);
		include(PLUGINPATH . 'views/' . $this->view . EXT);
	}
	
}