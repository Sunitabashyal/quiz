<?php

$db_hostname = "localhost";
$db_username = "root";
$db_password = "root";
$db_name = "quiz";


function run_query($query){
	global $db_hostname, $db_username, $db_password, $db_name;
	// Create connection
	$conn = new mysqli($db_hostname, $db_username, $db_password, $db_name);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$conn->query($query);
	$conn->close();
}


function run_select_query($query, $single=false){
	global $db_hostname, $db_username, $db_password, $db_name;
	// Create connection
	$conn = new mysqli($db_hostname, $db_username, $db_password, $db_name);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$result = $conn->query($query);

	if (!$result) {
	    die("Query failed: " . $conn->error);
	}

	$result_list = array();
	if ($single){
		$value = $result->fetch_assoc();
		$conn->close();
		return $value;
	}else {
		while ($row = $result->fetch_assoc()) {
		    array_push($result_list, $row);
		}

	}
	

	// Close the result set
	$result->close();

	// Close the MySQL connection
	$conn->close();

	return $result_list;
}

?>