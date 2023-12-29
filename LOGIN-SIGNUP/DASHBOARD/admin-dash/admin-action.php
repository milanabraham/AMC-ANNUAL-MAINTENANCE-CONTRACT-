<?php
// Establish a database connection (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AMC";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the selected status values and complaint IDs for all complaints
$statusValues = $_POST['status'];
$complaintIds = $_POST['id'];

// Loop through the status values and update each complaint
foreach ($statusValues as $key => $status) {
    $complaint_id = $complaintIds[$key]; // Get the complaint ID from the array

    // Prepare and execute SQL query to update the status of the complaint
    $sql = "UPDATE complaint SET status='$status' WHERE id='$complaint_id'";

    if ($conn->query($sql) !== TRUE) {
        echo "Error updating status for complaint ID $complaint_id: " . $conn->error;
    }
}

// Close the database connection
$conn->close();

// Redirect back to the admin dashboard
header("Location: reports.php?message=Status%20updated%20successfully!");

?>
