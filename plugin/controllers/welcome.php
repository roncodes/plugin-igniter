<?php
class Welcome extends PI_Controller {
	
	function __construct() 
	{
		parent::init($this);
	}
	
	function index()
	{
		echo 'Index method';
	}
	
	function hello_world()
	{
		echo 'Hello World';
	}
}