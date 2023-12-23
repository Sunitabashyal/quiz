<?php

require "backend.php";
$data = json_decode($json_response, true);

$page_header = "Welcome to Quiz Program";
echo "<h2>$page_header</h2>";


function get_question($question){
	return "<p>" . $question . "</p>";
}

function get_options($options){
	$rendered_options = "";
	
	for ($i = 0; $i < count($options); $i++) {
    	$rendered_options = $rendered_options . "<p>" .
    		'<input type="radio" name="color" value="red" id="red">
        <label for="red">' . $options[$i] . '</label>'
    	  . "</p> ";
	}
	return $rendered_options;

}

function submit_button(){
	return "<button>Submit</button>";

}
echo get_question($data["question"]);
echo get_options($data["options"]);
echo submit_button();

?>
