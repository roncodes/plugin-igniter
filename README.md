<b>Controllers usage:</b>

Usage of controllers in this framework are created just like any other MVC controller, but executed via shortcodes.

For example you create a controller called welcome, you can execute this controllers code in WP by calling a shortcode: [welcome]

Secondly you can call a controllers methods by shortcode [welcome_hello_world] assuming the controllers method is hello_world()

Controllers and their methods can also be executed by adding these get variables to your url ?contoller=welcome&method=hello_world

The default method called if none specified is always index(), if no index method exist it just runs the construct code or nothing.

<b>Model usage:</b>

Still being implemented, but will be implemented using the WPDB object, models will allow users to create serialized tables and query easily from WPDB by methods like get_all() or get_by()

<b>View usage:</b>

You can load a view by using the PI_Loader. Example:
Loading a view within a shortcode:
self::$load->view('welcome/hello_world');

If you're loading a view to a controller rendered page, simply:
$this->load->view('welcome/hello_world');

You can also pass in variables to your view via an array, same as CI, see:
self::$load->view('test', array('foo' => 'bar'));

In your view you can now use $foo, 
<?=$foo?> will print: bar

This would load the view welcome/hello_world.php


<b>Future updates...</b>

PluginIgniter can also implement helpers, and libraries that are auto-loaded into the framework so the helper functions can be used throughout views and controllers.

More updates coming soon, I use this MVC framework for developing Wordpress plugins in a more structured form, hopefully others can find this useful.

This is based off CodeIgniter
