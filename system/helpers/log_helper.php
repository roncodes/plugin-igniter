<?php
/**
	Log Helper:
	Helps log system and error messages
**/

function log_message($type, $message)
{
	file_put_contents(PLUGINPATH . 'logs/log-' . date('Y-m-d') . EXT, 'ERROR - ' . date('Y-m-d H:i:s') . ' --> Severity: ' . $type . ' --> ' . $message."\n", FILE_APPEND);
}