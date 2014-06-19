<?php
/* Plugin Name: Phila Property Search
Plugin URI: localhost/wordpress
Description: Allows you to search for Property information
Version: 1.0
Author: Andrew Kennel
Author URI: localhost/wordpress
*/
add_shortcode('PhilaPropSearch', 'philapropsearch_handler');

function philapropsearch_handler(){
    $message = <<<EOM

<head>
<script type="text/javascript">
<!--
function redirect() {
	if (document.getElementById('unit').value != "")
	{
		window.location = "http://property.phila.gov/#address/" + document.getElementById('address').value + "/" + document.getElementById('unit').value; 
	}
	else
	{
		window.location = "http://property.phila.gov/#address/" + document.getElementById('address').value
	}
}
//-->
</script>
</head>

<style>

#address{
width:100%;
}

#unitBlock{
float:right;
}

</style>

<div id="PhilaPropSearchWidget">
	<span id="PhilaPropSearchMainWindow">
		<h1>Property Search</h1>	
		<div id="PhilaPropSearchInputFields">
			<input type="text" name="address" id="address" placeholder="Address:eg 1234 Market St" class="span4" autofocus="" value="">
			<br>
			<input type="text" name="unit" id="unit" placeholder="Unit:eg 1A" class="span2">
		</div>
		<h2>
			<input type="button" onclick="redirect()" value="Search">
		</h2>
		<a href="http://property.phila.gov/">More Search Options</a>
	</span>
</div>        


EOM;

return $message;
}

function philapropsearchwidget($args, $instance) { // widget sidebar output
  extract($args, EXTR_SKIP);
  echo $before_widget; // pre-widget code from theme
  echo philapropsearch_handler();
  echo $after_widget; // post-widget code from theme
}
?>
