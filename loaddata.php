<?php

// MySQL configuration
$mysql_config = array(
    'host' => 'localhost',
    'user' => 'root',
    'password' => 'root',
    'database' => 'quiz',
);

// Function to create a connection to MySQL
function createConnection() {
    global $mysql_config;
    $connection = new mysqli($mysql_config['host'], $mysql_config['user'], $mysql_config['password'], $mysql_config['database']);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    echo "Connected to MySQL database: " . $mysql_config['database'];
    return $connection;
}

// Function to execute a SQL query
function executeQuery($connection, $query) {
    if ($connection->query($query) === TRUE) {
        echo "Query executed successfully\n";
    } else {
        echo "Error executing query: " . $connection->error . "\n";
    }
}

function get_array_from_std_class($given){
	return json_decode(json_encode($given), true);
}

// Function to load data from JSON file into MySQL table
function loadDataFromJson($connection, $tableName, $jsonFile) {
	if (!file_exists($jsonFile)){
		echo "$jsonFile does not exist.";
		exit();
	}
    $jsonData = json_decode(utf8_encode(file_get_contents($jsonFile)));

    if ($jsonData == null || empty($jsonData)){
    	echo "No data available";
    	exit();
    }
    $count = 0;
    foreach ($jsonData as $record) {
    	$count += 1;
    	echo "\n\nreading record ... $count\n";
    	$data_array = get_array_from_std_class($record);
        $columns = implode(', ', array_keys($data_array));
        $values = "'" . implode("', '", array_values($data_array)) . "'";
        $query = "INSERT INTO $tableName ($columns) VALUES ($values)";
        executeQuery($connection, $query);
        echo "added to database record ..... $count\n";
        echo "*****************************************************";
    }

    echo "\n\n$count rows loaded into '$tableName' table successfully.\n";
}

// Main script
$questionsTableFile = 'data.json';
$questionsTableName = 'question';

$connection = createConnection();

if ($connection) {
    loadDataFromJson($connection, $questionsTableName, $questionsTableFile);
    $connection->close();
}
?>