<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play Quiz</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
	<h2><?php echo $page_header ?></h2>
	
	<div>
		<h4><?php echo $user["email"] ?></h4>
		<h4><?php echo $user["name"] ?></h4>
		<h4><?php echo $user["address"] ?></h4>
		<form method="post" action="home.php">
			<input type="submit" value="logout" name="logout" />
		</form>
	</div>
	
</body>
</html>


<?php 

if (isset($_POST['logout'])) {
    logout();
    header("location: /login.php");
    exit();
}

?>