<?php

$page_header = "Quiz Rules";
include "controller/session.php";
include "base.php";


?>

<div class="main-content">
	<div class="rules">
		1. There are two rounds.</br>
		2. First round contains two questions each carrying 10 marks.</br>
		3. If user gains minimum 10 marks can go to next round.</br>
		4. Second round contains 8 questions carrying 10 marks each.</br>
		5. Timer of 30 seconds is provided if user is unable to answer next question will appear.</br>
	</div>
</div>

<form action="play_quiz.php">
	<input class="submit-button" type="submit" value="Start to Play"/>
</form>