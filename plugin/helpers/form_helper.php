<?php
/*
	Form Helper
*/

function form_open($post = '/', $options = array())
{
	$form_options = "";
	foreach($options as $key => $val){
		$form_options .= "$key='$val' ";
	}
	echo "<form method='post' accept-charset='utf-8' action='$post' $form_options>";
}

function form_close()
{
	echo "</form>";
}

function text_input($name, $label = '', $default = NULL, $extra = 'class="span4"')
{
?>
	<?php if ( ! empty($label)): ?>
	<label for="<?=$name?>"><?=$label?>: </label>
	<?php endif; ?>
	<input id="<?=$name?>" name="<?=$name?>" type="text" value="<?=$default?>" <?=trim($extra)?>>
<?php
}
