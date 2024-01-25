<?php

include "controller/session.php";

$page_header = "You are Playing Quiz Now";

include "base.php";
include "controller/quiz_controller.php";

$data = json_decode($json_response, true);
$question = $data["question"];
$options = $data["options"];



function get_option_val($idx){
	$option_val = array("a", "b", "c", "d");
	return $option_val[$idx];	
}

?>

<div class="main-content">
	<form class="form-class" method="post" action="/controller/quiz_controller.php">
		<p>  <?php echo $question ?> </p>
	    
	    <ul class="no-list">
	    	<?php
	    		foreach ($options as $index => $option) {
			      echo '<li>';
			      echo '<input type="radio" id="id_option_' . get_option_val($index) . '" name="selected_option" value="' . get_option_val($index) . '">';
			      echo '<label for="option_' . get_option_val($index) . '">' . $option . '</label>';
			      echo '</li>';
				}
	    	?>
	    </ul>
	    <input class="submit-button" type="submit" value="Submit" />
	</form>
</div>