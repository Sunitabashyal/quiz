<?php
    
    function check_login_credentials($email, $password){
        // if no user with that email return false
        $hash_pass_from_db = ""; // write a query to get hash value from email. make unique email in db.
        // the following line checks password.
        // return password_verify($password, $hash_pass_from_db);
        return true;
    }

    function get_uuid_from_email($email){
        $uuid = 'abcd';
        return $uuid;
        //
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

