<?php
/**
	Model helper
	This is used to help the core Model
**/


/*
	This function grabs the class name from a php file
*/
function remove_columns_from_virtual_table($arr)
{
	unset($arr['columns']);
	return $arr;
}
