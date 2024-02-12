<?php 

if (isset($_POST['logout'])) {
    logout();
    header("location: /login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play Quiz</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="margin-panel">
			<div class="profile">
			<nav class="navigation-bar">
				<h4 class="center-align margin-panel"><?php echo $user["email"] ?></h4>
				<h4><?php echo $user["name"] ?></h4>
				<h4><?php echo $user["address"] ?></h4>
				<form method="post" action="home.php">
					<input class="link" type="submit" value="logout" name="logout" />
				</form>
			</nav>
		</div>
		<h2 class="center-align margin-panel"><?php echo $page_header ?></h2>
	</div>

</body>
</html>


