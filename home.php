<?php

$page_header = "Home Page";

include "controller/session.php";
include "base.php";


if ($_SERVER["REQUEST_METHOD"] == "GET"){
	$param = isset($_GET['param']) ? $_GET['param'] : '';
	
	if ($param == "run"){
		$query = "INSERT INTO user (name, email, uuid) VALUES ('example_user', 'user@example.com', 'hashed_password'); ";
		// run_query($query);
		$query = "select name, email, uuid from user";
		$result = run_select_query($query);
		foreach ($result as $row){
			foreach ($row as $key => $value){
				echo "$key: $value<br>";
			}
		}
		
	}
}



?>

<div class="main-content">
	If you want to play quiz you need to follow the rules. To understand all the rules press next button below.
	
</div>

<form action="quiz_rules.php">
	<input class="submit-button" type="submit" value="Next"/>
</form>