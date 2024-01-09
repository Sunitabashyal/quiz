<?php
$error_message = "";
if (isset($_GET['error'])){
    $error_message = urldecode($_GET['error']);
}
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
	<form method="post" action="/controller/register_controller.php">
        <p style="color:red;"><?php echo $error_message ?></p>
        <label for="email">Email:</label>
        <input type="text" name="email" required>
        <br>
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="address">Address:</label>
        <input type="text" name="address" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required>
        <br>
        <!-- Add more form fields as needed -->
        <input type="submit" value="Submit">
    </form>
	</form>

	
</body>
</html>
