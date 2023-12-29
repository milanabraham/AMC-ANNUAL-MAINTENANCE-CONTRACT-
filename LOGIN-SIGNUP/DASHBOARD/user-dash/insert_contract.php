<?php
// Retrieve contract details from the form
$customer = $_POST["username"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];
$selected_plan = $_POST["selected_plan"]; // Add this line

// Assuming you have established a database connection earlier
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AMC";

// Create a new connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert contract data into the database
$insertQuery = "INSERT INTO contracts (customer, start_date, end_date, selected_plan) VALUES ('$customer', '$start_date', '$end_date', '$selected_plan')";

if ($conn->query($insertQuery) === TRUE) {
    // Contract data inserted successfully
    echo "<h2>Contract Confirmation</h2>";
    echo "<p>Contract details have been recorded successfully.</p>";
} else {
    // Handle the case where insertion fails
    echo "<h2>Error</h2>";
    echo "<p>Error: Contract data could not be recorded.</p>";
}

// Close the database connection
$conn->close();

?>



