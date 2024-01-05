<a href="index.php">Home</a>
<form method="post" action="/controller/login_controller.php">
    <p style="color:red;"><?php echo $error_message ?></p>
    <p style="color:green;"><?php echo $success_message ?></p>
    <label for="email">Email:</label>
    <input type="text" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <br>
    <input type="submit" value="Submit">
</form>