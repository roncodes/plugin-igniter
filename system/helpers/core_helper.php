<?php

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