<?php

$page_header = "Quiz Home Page";
include "controller/session.php";
include "base.php";

?>

<div>
	If you want to play quiz you need to follow the rules. To understand all the rules press next button below.
	<form action="quiz_rules.php">
		<input type="submit" value="Next"/>
	</form>
</div>