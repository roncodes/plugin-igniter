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
		// $this->cars->create_table(array('year', 'make', 'model', 'color'));
		// $this->cars->insert(array('year' => '2001', 'make' => 'honda', 'model' => 'nsx', 'color' => 'red'));
		// var_dump($this->cars->get_table());
		// $this->cars->list_tables();
		// var_dump($this->cars->table_exists('saas'));
		// var_dump($this->cars->delete_table('ta'));
	}
}