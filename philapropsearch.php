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

#addressBlock{
float:left;
}

#unitBlock{
float:right;
}

.labelBlock{
font: bold 18px Arial, sans-serif;
margin-bottom: 0px;
}

</style>

<div class="home"><div class="hero">
    <h1>Property Search</h1>
</div>

<div id="search-tabs" class="tabbable">
    <div class="tab-content row">
        <div class="tab-pane active" id="byAddress">
            <form data-method="address">
                <div class="controls-row">
                    <div class="control-group span4" id="addressBlock">
                        <h4 class="labelBlock"><label for="address">Address</label></h4>
                        <input type="text" name="address" id="address" placeholder="ex. 1234 Market St" class="span4" autofocus="" value="">
                    </div>
                    <div class="control-group span2" id="unitBlock">
                        <h4 class="labelBlock"><label for="unit">Unit</label></h4>
                        <input type="text" name="unit" id="unit" placeholder="ex. B" class="span2">
                    </div>
                </div>
            </form>
        </div>
		<h2>
			<input type="button" onclick="redirect()" value="Search">
		</h2>
    </div>
</div>



<hr>

<footer>
<a href="http://property.phila.gov/">More Search Options</a>
</footer>
        
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
