<b>Controllers usage:</b>

Usage of controllers in this framework are created just like any other MVC controller, but executed via shortcodes.

For example you create a controller called welcome, you can execute this controllers code in WP by calling a shortcode: [welcome]

Secondly you can call a controllers methods by shortcode [welcome_hello_world] assuming the controllers method is hello_world()

Controllers and their methods can also be executed by adding these get variables to your url ?contoller=welcome&method=hello_world

The default method called if none specified is always index(), if no index method exist it just runs the construct code or nothing.

<b>Model usage:</b>

You can create models by extending the PI_Model, when you create a model in PI you are able to create 'virtual tables,' these virtuals table will allow you to organize your model data and make the most of plugin options, for example: Let's say I have a database of cars. So I create a model in PI as follows: Car_model.php

With this I can load the model into a controller as follows:
$this->load->model('Car_model'); // $this->Car_model;
or
$this->load->model('Car_model', 'cars'); // for alias $this->cars;

You can then use the model as a virtual table if you like:
Create table 'cars':
$this->cars->create_table(array('year', 'make', 'model', 'color')); 
The previous method will create a table with the columns: year, make, model and color

With the newly created virtual table you can also do one of many data manipulations, see these examples below:
$this->cars->insert(array('year' => '1998', 'make' => 'honda', 'model' => 'accord', 'color' => 'green')); /* inserts a row into the virtual table */
		$this->cars->get_table(); /* Returns current model table, or another if specified as paramater */
				$this->cars->list_tables(); /* List all virtual tables */
						$this->cars->table_exists('cars'); /* Returns true, also true with prefix: pi_cars */
								$this->cars->delete_table('ta'); /* Attempts to delete specified table, in this case will return false; otherwise true if table deleted */
										$this->cars->get_by_id(1); /* Get row by id, virtual table rows have auto incrementing id's already without you having to make it a column */
												$this->cars->get_by('make', 'honda'); /* You can also retrieve row(s) by a specific column like so */

The idea of virtual tables is to make data models easier to implement in PI, and quicken plugin development in a familiar way.

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
