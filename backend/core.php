<?php
class Backend extends Core {
	
	function __construct()
	{
		add_action('admin_menu', array($this, 'navigation'));
	}
	
	function navigation()
	{
		add_options_page('Plugin Igniter', 'plugin-igniter', 'add_users', 'plugin-igniter', array($this, 'dashboard'), '', 4);
	}
	
	function dashboard()
	{
		$this->load('views/' . strtolower(__CLASS__) . '/' . __FUNCTION__, $data);
	}
}