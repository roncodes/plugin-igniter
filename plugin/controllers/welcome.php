<?php
class Welcome extends PI_Controller {
	
	function __construct() 
	{
		parent::init($this);
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
}