<?php
$error_message = "";
$success_message = "";
if (isset($_GET['error'])){
    $error_message = urldecode($_GET['error']);
}
if (isset($_GET['success'])){
    $success_message = urldecode($_GET['success']);
}

$page_header = "Login Page";

include "public_base.php";

include "login_form.php";


?>

