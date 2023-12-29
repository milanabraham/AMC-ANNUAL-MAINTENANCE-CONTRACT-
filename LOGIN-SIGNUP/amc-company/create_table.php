<?php

// Create a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create a table for equipment inventory
$sql = "CREATE TABLE equipment (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    quantity INT(6) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table equipment created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the database connection
$conn->close();

?>