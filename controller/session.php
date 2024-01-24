<?php

include "db_controller.php";

session_start();

function logout(){
	// this code should be executed after the session is started to logout the user.
	$_SESSION = array();
	session_destroy();
}

$session_id = isset($_SESSION['session_id']) ? $_SESSION['session_id'] : '';

if (!$session_id){
	header("location: /login.php");
    exit();
}

function get_user_detail($session_id){
	// create a query to get user details from user email;
	$query = "select email, name, address, uuid from user;";
	$query_result = run_select_query($query);
	$result = array();
	foreach ($query_result as $row){
			foreach ($row as $key => $value){
				$result[$key] = $value;
			}
		}
	return $result;
}

$user = get_user_detail($session_id);

?>