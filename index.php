<?php

$page_header = "Welcome to Quiz Program";
echo "<h2>$page_header</h2>";




function question(){
	$question_text = "How old are you ?";
	return "<p>" . $question_text . "</p>";
}

function options(){
	$option_items = ["I am 20", "I am 25", "I am 26", "I am 27"];
	$rendered_options = "";
	
	for ($i = 0; $i < count($option_items); $i++) {
    	$rendered_options = $rendered_options . "<p>" .
    		'<input type="radio" name="color" value="red" id="red">
        <label for="red">' . $option_items[$i] . '</label>'
    	  . "</p> ";
	}
	return $rendered_options;

}

function submit_button(){
	return "<button>Submit</button>";

}
echo question();
echo options();
echo submit_button();
?>

