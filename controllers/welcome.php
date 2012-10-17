<?php
class Welcome extends Core {
	
	function __construct() 
	{
		foreach (get_class_methods(__CLASS__) as $method) {
			add_shortcode(strtolower(__CLASS__).'_'.$method, array($this, $method));
		}
	}
	
	function hello_world()
	{
		echo 'Hello World';
	}
}