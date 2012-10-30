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
		// $this->cars->create_table(array('year', 'make', 'model', 'color')); /* Creates a virtual table called 'cars' */
		$this->cars->insert(array('year' => '1998', 'make' => 'honda', 'model' => 'accord', 'color' => 'green')); /* inserts a row into the virtual table */
		$this->cars->get_table(); /* Returns current model table, or another if specified as paramater */
		$this->cars->list_tables(); /* List all virtual tables */
		$this->cars->table_exists('cars'); /* Returns true, also true with prefix: pi_cars */
		$this->cars->delete_table('ta'); /* Attempts to delete specified table, in this case will return false; otherwise true if table deleted */
		$this->cars->get_by_id(1); /* Get row by id, virtual table rows have auto incrementing id's already without you having to make it a column */
		$this->cars->get_by('make', 'honda'); /* You can also retrieve row(s) by a specific column like so */
	}
	
	function view_cars()
	{
		$shortcode = self::_get_instance();
		$shortcode->load->model('Car_model', 'cars');
		$data['cars'] = $shortcode->cars->get_all();
		$shortcode->load->view('view_cars', $data);
	}
}