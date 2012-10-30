<?php   
class PI_Model extends PI_System {

	public static $prefix = DBPREFIX;
	
	public static $table;
	
	function __construct() { }
	
	/*
		Virtual table methods
	*/
	
	function list_tables($tables = array())
	{
		$options = get_alloptions();
		echo '<pre>';
		foreach($options as $key => $val) {
			if(substr($key, 0, strlen(self::$prefix))==self::$prefix) {
				echo $key . '<br>';
				$tables[] = $key;
			}
		}
		echo '</pre>';
		return $tables;
	}
	
	function get_tables($tables = array())
	{
		$options = get_alloptions();
		foreach($options as $key => $val) {
			if(substr($key, 0, strlen(self::$prefix))==self::$prefix) {
				$tables[] = $key;
			}
		}
		return $tables;
	}
	
	function create_table($columns = array(), $table = NULL)
	{
		$this->_table_name($table);
		if(!$this->table_exists($table)) {
			return add_option($table, json_encode(array('columns' => $columns)));
		} else {
			die(pi_error('Virtual table \'' . $table . '\' already exists'));
		}
	}
	
	function insert($input = array(), $table = NULL, $row = array())
	{
		$this->_table_name($table);
		$data = $this->get_table($table);
		foreach($data['columns'] as $index => $column) {
			if(array_key_exists(0, $input)){
				$row[$column] = $input[$index];
			} else {
				foreach($input as $key => $el) {
					if($column==$key){
						$row[$column] = $el;
					}
				}
			}
		}
		return update_option(self::$prefix . $table, json_encode(array_merge($data, array($row))));
	}
	
	function table_exists($table)
	{
		$this->_table_name($table);
		if(in_array($table, $this->get_tables())){
			return true;
		}
		return false;
	}
	
	function delete_table($table = NULL)
	{
		$this->_table_name($table);
		return delete_option($table);
	}
	
	function get_table($table = NULL)
	{
		$this->_table_name($table);
		return json_decode(get_option(self::$prefix . $table), true);
	}
	
	function _table_name(&$table)
	{
		$table = (is_null($table)) ? self::$table : $table;
		if(substr($table, 0, strlen(self::$prefix))!=self::$prefix) {
			$table = self::$prefix . $table;
		}
	}
	
	/*
		End virtual table methods
	*/
	
	function get_all($table = NULL)
	{
		return $this->get_table($table);
	}
	
}
