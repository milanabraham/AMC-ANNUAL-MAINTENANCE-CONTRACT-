<?php
// Establish a database connection (replace with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form
// Retrieve data from the form
$id = $_POST['id'];
$name = $_POST['name'];
$type = $_POST['type'];
$quantity = $_POST['quantity'];

// Prepare and execute the INSERT query
$sql = "INSERT INTO equipment (id, name, type, quantity) VALUES ('$id', '$name', '$type', '$quantity')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
