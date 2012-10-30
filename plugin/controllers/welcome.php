<?php
class Welcome extends PI_Controller {
	
	function __construct() 
	{
		parent::_init($this);
	}
	
	function index()
	{
		echo 'Test loader';
		self::$load->library('Twilio');
	}
	
	function hello_world()
	{
		echo 'Hello World';
	}
	
	function test_model()
	{
		$this->load->model('Car_model', 'cars');
		$this->cars->list_tables();
	}
}