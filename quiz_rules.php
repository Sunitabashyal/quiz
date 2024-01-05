<?php

$page_header = "Quiz Rules";
include "controller/session.php";
include "base.php";

?>

<div>
	--- > this is rule number one <br/>
	---> this is rule number two <br/>
	---> this is rule number three <br/>

	<form action="play_quiz.php">
		<input type="submit" value="Start to Play"/>
	</form>
</div>