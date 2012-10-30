<?php   
class PI_Model extends PI_System {

	public static $prefix = DBPREFIX;
	
	public static $table = '';
	
	function __construct() { }
	
	function list_tables()
	{
		// do code
		echo 'test';
	}
	
	function create_table($table, $columns = array())
	{
		return add_option($this->prefix . $table, json_encode(array('columns' => $columns)));
	}
	
	function insert($table, $columns = array())
	{
		// do code
	}
	
	function table_exist($table)
	{
		// do code
	}
	
	function delete_table()
	{
		// do code
	}
	
	function get_table()
	{
		// do code
	}
	
	function get_all()
	{
		// do code
	}
	
}
