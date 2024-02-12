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
	$query = "select id, email, name, address from user where uuid='" . $session_id . "';";
	$query_result = run_select_query($query, $single=true);
	return array(
		"email" => $query_result["email"],
		"name" => $query_result["name"],
		"address" => $query_result["address"],
		"uuid" => $session_id,
		"id" => $query_result["id"]
	);
	// if $query_result is the return value of run_select_query with multple rows;
	// $result = array();
	// foreach ($query_result as $row){
	// 		foreach ($row as $key => $value){
	// 			$result[$key] = $value;
	// 		}
	// 	}
	// return $result;
}

$user = get_user_detail($session_id);

?>