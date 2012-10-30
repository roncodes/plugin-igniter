<?php
/* 
    Plugin Name: Wordpress PluginIgniter
    Plugin URI: https://github.com/theprestig3/wp-plugin-igniter
    Description: An virtual MVC framework for developing wordpress plugins
    Author: Ronald A. Richardson
    Version: 1.0 
    Author URI: http://www.ronaldarichardson.com/
*/  

/*
 *---------------------------------------------------------------
 * CONFIG VARIABLES
 *---------------------------------------------------------------
 */
	define('PIINFO', true); // This determines whether or not to display WP PI Info page in the admin
	define('DBPREFIX', 'pi_'); // This is your prefix for the virtual tables created in PI_Model

/*
 *---------------------------------------------------------------
 * PLUGIN ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
	$url = explode('.', $_SERVER['HTTP_HOST']);
	if ($url[0] == 'local' OR $url[0] == 'localhost')
	{
		define('ENVIRONMENT', 'development');
	}
	else if ($url[0] == 'dev' OR $url[0] == 'staging')
	{
		define('ENVIRONMENT', 'testing');
	}
	else
	{
		define('ENVIRONMENT', 'production');
	}
	define('SYSTEM_NAME', 'WP PluginIgniter');
	date_default_timezone_set('America/Phoenix');

/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL);
		break;
	
		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The plugin environment is not set correctly.');
	}
}

/*
 *---------------------------------------------------------------
 * SYSTEM FOLDER NAME
 *---------------------------------------------------------------
 */
	$system_path = str_replace('\\', '/', ABSPATH . 'wp-content/plugins/' . basename(dirname(__FILE__))).'/system/';

/*
 *---------------------------------------------------------------
 * PLUGIN FOLDER NAME
 *---------------------------------------------------------------
 */
	$plugin_folder = str_replace('\\', '/', ABSPATH . 'wp-content/plugins/' . basename(dirname(__FILE__))).'/plugin/';

/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */

	// Set the current directory correctly for CLI requests
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	// ensure there's a trailing slash
	$system_path = rtrim($system_path, '/').'/';

	// Is the system path correct?
	if ( ! is_dir($system_path))
	{
		exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
	}

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// The PHP file extension
	// this global constant is deprecated.
	define('EXT', '.php');

	// Path to the system folder
	define('BASEPATH', str_replace("\\", "/", $system_path));

	// Path to the front controller (this file)
	define('FCPATH', str_replace(SELF, '', __FILE__));

	// Name of the "system folder"
	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));


	// The path to the "plugin" folder
	if (is_dir($plugin_folder))
	{
		define('PLUGINPATH', $plugin_folder);
	}
	else
	{
		if ( ! is_dir(BASEPATH.$plugin_folder.'/'))
		{
			exit("Your plugin folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
		}

		define('APPPATH', BASEPATH.$plugin_folder.'/');
	}

/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 *
 */
require_once BASEPATH.'PluginIgniter.php';
