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

<script type="text/javascript">
<!--
function redirect() {
		window.location = "http://property.phila.gov/#address/" + document.getElementById('address').value
}
//-->
</script>

<div id="PhilaPropSearchWidget" class="PhilaWidget">
	<span id="PhilaPropSearchMainWindow">
		<h1 class="PhilaWidgetTitle">Property Search</h1>	
		<div id="PhilaPropSearchInputFields">
        <div class="left-inner-addon">
        <span class="glyphicon glyphicon-search"></span>
			<input type="text" name="address" id="address" placeholder="Address: eg 1234 Market St" class="span4" value="">
			</div>
        </div>
			<input type="button" onclick="redirect()" value="Search">
		<p><a href="http://property.phila.gov/">More Search Options &raquo;</a></p>
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
