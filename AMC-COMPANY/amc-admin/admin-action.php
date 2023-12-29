<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AMC";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$statusValues = $_POST['status'];
$complaintIds = $_POST['company_id'];


foreach ($statusValues as $key => $status) {
    $company_id = $complaintIds[$key]; 

    $sql = "UPDATE amc_reports SET status='$status' WHERE company_id='$company_id'";

    if ($conn->query($sql) !== TRUE) {
        echo "Error updating status for complaint ID $company_id: " . $conn->error;
    }
}


$conn->close();


header("Location: reports.php?message=Status%20updated%20successfully!");

?>


