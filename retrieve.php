<?php
// Database connection details for the retrieval
$host = "localhost";
$username = "root";
$password = "";
$database = "dir_data";

// Create a new MySQLi instance for the retrieval
$mysqli = new mysqli($host, $username, $password, $database);

// Check if the connection was successful for the retrieval
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve the last inserted direction from the direction column
$sql = "SELECT direction FROM data ORDER BY id DESC LIMIT 1";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastDirection = $row["direction"];
    echo $lastDirection;
} else {
    echo "No data found in the table.";
}

// Close the database connection for the retrieval
$mysqli->close();
?>
