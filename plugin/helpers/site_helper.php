<?php
/*
	Site Helper
*/

function fallback_redirect($location)
{
	echo '<meta http-equiv="REFRESH" content="0;url='.home_url($location).'">';
}

function url($src = '')
{
	return plugins_url('infusionsoft').'/'.$src;
}

function my_shortcode_parse_atts($text) 
{
	$atts = array();
	$pattern = '/(\w+)\s*=\s*"([^"]*)"(?:\s|$)|(\w+)\s*=\s*\'([^\']*)\'(?:\s|$)|(\w+)\s*=\s*([^\s\'"]+)(?:\s|$)|"([^"]*)"(?:\s|$)|(\S+)(?:\s|$)/';
	$text = preg_replace("/[\x{00a0}\x{200b}]+/u", " ", $text);
	if ( preg_match_all($pattern, $text, $match, PREG_SET_ORDER) ) {
			foreach ($match as $m) {
					if (!empty($m[1]))
							$atts[$m[1]] = stripcslashes($m[2]);
					elseif (!empty($m[3]))
							$atts[$m[3]] = stripcslashes($m[4]);
					elseif (!empty($m[5]))
							$atts[$m[5]] = stripcslashes($m[6]);
					elseif (isset($m[7]) and strlen($m[7]))
							$atts[] = stripcslashes($m[7]);
					elseif (isset($m[8]))
							$atts[] = stripcslashes($m[8]);
			}
	} else {
			$atts = ltrim($text);
	}
	return $atts;
}