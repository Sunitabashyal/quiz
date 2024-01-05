<?php

include "controller/session.php";

$page_header = "You are Playing Quiz Now";

include "base.php";
include "controller/quiz_controller.php";

$data = json_decode($json_response, true);
$question = $data["question"];
$options = $data["options"];

?>


<form method="post" action="/controller/quiz_controller.php">
	<p>  <?php echo $question ?> </p>
    
    <ul class="no-list">
    	<?php
    		foreach ($options as $index => $option) {
		      echo '<li>';
		      echo '<input type="radio" id="id_option_' . ($index + 1) . '" name="selected_option" value="option_' . ($index + 1) . '">';
		      echo '<label for="option_' . ($index + 1) . '">' . $option . '</label>';
		      echo '</li>';
			}
    	?>
    </ul>
    <input type="submit" value="Submit" />
</form>