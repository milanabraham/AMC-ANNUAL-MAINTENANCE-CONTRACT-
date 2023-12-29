<?php
// Establish a database connection (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AMC";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$id = $_POST['company_id'];
$name = $_POST['company_name'];
$loginError = $_POST['loginError'];
$paymentError = $_POST['paymentError'];
$complaint = $_POST['complaint'];



$sql = "INSERT INTO amc_reports (company_id, company_name, login_error, payment_error, complaint, status) VALUES ('$id', '$name', '$loginError', '$paymentError', '$complaint', 'processing')";

if ($conn->query($sql) === TRUE) {

    $message = "Complaint registered successfully!";
    header("Location: reports.php?message=" . urlencode($message));
} else {

    $message = "Error registering complaint: " . $conn->error;
    header("Location: reports.php?message=" . urlencode($message));
}


$conn->close();
?>
