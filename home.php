<?php

$page_header = "Quiz Home Page";
include "controller/session.php";
include "base.php";

?>

<div class="main-content">
		If you want to play quiz you need to follow the rules. To understand all the rules press next button below.

</div>
<form class="form-class" action="quiz_rules.php">
	<input class="submit-button" type="submit" value="Next"/>
</form>