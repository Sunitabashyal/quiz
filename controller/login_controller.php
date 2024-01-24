<?php

include "db_controller.php";
    
function check_login_credentials($email, $password){
    $query = "select password from user where email='" . $email . "';";
    $query_result = run_select_query($query, $single=true);
    // the following line checks password.
    return password_verify($password, $query_result['password']);
}

function get_uuid_from_email($email){
    $uuid = 'abcd';
    return $uuid;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (check_login_credentials($email, $password)) {
        session_start();
        $_SESSION['session_id'] = get_uuid_from_email($email);
        header("location: /home.php");
        exit();
    } else {
        $error_message = "Email or password doesn't match.";
        $encoded_error_message = urlencode($error_message);
        header("location: /login.php?error=$encoded_error_message");
        exit();
    }

}
    
?>

