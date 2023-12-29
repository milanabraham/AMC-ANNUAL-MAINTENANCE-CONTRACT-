<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            display: flex;
            flex-direction:column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        p {
            margin: 10px 0;
            text-align: center;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #4caf50;
        }
    </style>
</head>
<body>

<?php
if (isset($_POST["selected_plan"], $_POST["total_amount"], $_POST["payment_method"], $_POST["name"], $_POST["company_id"])) {

    $selectedPlan = $_POST["selected_plan"];
    $totalAmount = $_POST["total_amount"];
    $paymentMethod = $_POST["payment_method"];
    $userName = $_POST["name"];
    $companyID = $_POST["company_id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "AMC";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $startDate = date('Y-m-d');
    $planDuration = 365; 
    $endDate = date('Y-m-d', strtotime($startDate . ' + ' . $planDuration . ' days'));

    $insertPaymentQuery = $conn->prepare("INSERT INTO amc_payments (company_id, company_name, selected_plan, total_amount, payment_method, start_date, end_date, payment_timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");

    if (!$insertPaymentQuery) {
        echo "Prepare statement failed: " . $conn->error;
    }

    $insertPaymentQuery->bind_param("sssdsss", $companyID, $userName, $selectedPlan, $totalAmount, $paymentMethod, $startDate, $endDate);
    
    if ($insertPaymentQuery->execute()) {
        echo "<h2>Order Confirmation</h2>";
        echo "<p>Your order has been received. Thank you for your payment!</p>";
        echo "<p>User's Name: " . $userName . "</p>";
        echo "<p>Plan: $selectedPlan</p>";
        echo '<a href="dashboard.php">Back to Dashboard</a>';
    } else {
        echo "<h2>Error</h2>";
        echo "<p>Error: Payment data could not be recorded.</p>";
    }

    $conn->close();
} else {
    echo "<h2>Error</h2>";
    echo "<p>Invalid request. Please select a plan, total amount, payment method, and company ID first.</p>";
}
?>
</body>
</html>
