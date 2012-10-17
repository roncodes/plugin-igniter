Controllers usage:

Usage of controllers in this framework are created just like any other MVC controller, but executed via shortcodes.

For example you create a controller called weclome, you can execute this controllers code in WP by calling a shortcode: [welcome]

Secondly you can call a controllers methods by shortcode [welcome_hello_world] assuming the controllers method is hello_world()

In the future controllers will be able to be called by URL of wordpress, I'm thinking something like http://yourblog.com/welcome and http://yourblog.com/welcome/hello_world and or ?contoller=welcome&method=hello_world

The default method called if none specified is always index(), if no index method exist it just runs the construct code or nothing.

Model usage:
Still being implemented, but will be implemented using the WPDB object, models will allow users to create serialized tables and query easily from WPDB by methods like get_all() or get_by()

View usage:
You can load a view by using the load method. Example:
$this->load('views/welcome'); 

Will load the view welcome.php

Plugin Igniter can also implement helpers, and libraries that are auto-loaded into the framework so the helper functions can be used throughout views and controllers.

More updates coming soon, I use this MVC framework for developing Wordpress plugins in a more structured form, hopefully others can find this useful.
