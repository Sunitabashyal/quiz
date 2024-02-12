<?php

$error_message = isset($_GET['error']) ? urldecode($_GET['error']) : '';
$success_message = isset($_GET['success']) ? urldecode($_GET['success']) : '';
$page_header = "Register Page";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST Request Example</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
	<h2><?php echo $page_header ?></h2>
	<a href="index.php">Home</a>
	<form class="form-class" method="post" action="/controller/register_controller.php">
        <p style="color:red;"><?php echo $error_message ?></p>
        <label for="email">Email:</label>
        <input class="input-class" type="text" name="email" required>
        <br>
        <label for="name">Name:</label>
        <input class="input-class" type="text" name="name" required>
        <br>
        <label for="address">Address:</label>
        <input class="input-class" type="text" name="address" required>
        <br>
        <label for="password">Password:</label>
        <input class="input-class" type="password" name="password" required>
        <br>
        <label for="confirm_password">Password:</label>
        <input class="input-class" type="password" name="confirm_password" required>
        <br>
        <!-- Add more form fields as needed -->
        <input class="input-class submit-button" type="submit" value="Submit">
    </form>
	</form>

	
</body>
</html>
