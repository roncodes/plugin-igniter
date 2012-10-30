<?php
class Car_model extends PI_Model {

	public static $table = 'cars';
	
	function __construct() {}
	
	function test()
	{
		echo $this->$table;
	}
}