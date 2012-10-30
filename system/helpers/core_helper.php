<?php
/**
	Core Helper
	This is used to provide quick and simple functions to the Core libraries of PI
**/


/*
	This function grabs the class name from a php file
*/
function get_class_name_from_file($core)
{
	foreach(file($core) as $ln) {
		if(strstr($ln, 'class')){
			if($ln[0]=='c'){
				$arr = explode(' ', $ln);
				return $arr[1];
			}
		}
	}
	return false;
}

/*
	This returns a styled error for the pi core libraries
*/
function pi_error($message = 'PI Core failed somewhere...', $type = 'PluginIgniter Error:')
{
	return '<div style="border:1px #ccc solid;padding:10px;display:block;margin:20px;"><b>' . $type . '</b>  ' . $message . '</div>';
}
