<?php
    
function get_password_hash($password){
    return password_hash($password, PASSWORD_DEFAULT);
}


function is_unique_email($email){
    // check_unique_email_from_db_query
    return true;
}

function save_to_db($email, $name, $address, $password){
    //save the parameters here.
    // use hash password using get_password_hash function to save the database.
}

function confirm_password_ok($password, $confirm_password){
    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (!is_unique_email($email)){
        echo "at unique email error";
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

