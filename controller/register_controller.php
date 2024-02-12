<?php

include "db_controller.php";

function get_password_hash($password){
    return password_hash($password, PASSWORD_DEFAULT);
}

function is_unique_email($email){
    // check_unique_email_from_db_query
    $query = "select count(*) as row_count from user where email='" . $email. "'";
    $query_result = run_select_query($query, $single=true);
    if ($query_result['row_count'] == 0){
        return true;
    }
}


function generate_random_string($length = 18) {
    $randomBytes = random_bytes(ceil($length / 2));
    return substr(bin2hex($randomBytes), 0, $length);
}

function save_to_db($email, $name, $address, $password){
    $query = "INSERT INTO user (email, name, address, password, uuid) VALUES ('" . $email ."', '" .$name ."', '". $address ."', '". get_password_hash($password). "', '". generate_random_string() . "');";
    run_query($query);
}

function confirm_password_ok($password, $confirm_password){
    if ($password == $confirm_password){
        return true;
    }
    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    if (!is_unique_email($email)){
        $error_message = "This email has already registered.";
        $encoded_error_message = urlencode($error_message);
        header("location: /register.php?error=$encoded_error_message");
        exit();
    }

    else if (!confirm_password_ok($password, $confirm_password)) {
        $error_message = "Password confirmation did't match.";
        $encoded_error_message = urlencode($error_message);
        header("location: /register.php?error=$encoded_error_message");
        exit();

    } else {
        save_to_db($email, $name, $address, $password);
        $success_message = 'User created successfully with your email. You can login with "' . $email . '" email from here.';
        $encoded_success_message = urlencode($success_message);
        header("location: /login.php?success=$encoded_success_message");
        exit();
    }

}
    
?>