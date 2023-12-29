<?php
include("conn.php");


function checkIfUserHasPurchasedPlan($company_id, $conn) {
    $sql = "SELECT * FROM amc_payments WHERE company_id = '$company_id'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}


session_start();

if (isset($_SESSION['company_id'])) {
    $company_id = $_SESSION['company_id'];


    $hasPurchasedPlan = checkIfUserHasPurchasedPlan($company_id, $conn);
} else {
  
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMC Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">AMC Dashboard</div>
            <ul class="nav-items">
                <li class="nav-item active"><a href="?section=overview">Home</a></li>
                <li class="nav-item"><a href="?section=contracts">Contracts</a></li>
                <li class="nav-item"><a href="?section=payment">Payments</a></li>
                <li class="nav-item"><a href="?section=reports">Reports</a></li>
                <li class="nav-item"><a href="?section=settings">Settings</a></li>
                 
            </ul>
        </div>
        <div class="content">
            <?php

            if (isset($_GET['section'])) {
                $section = $_GET['section'];


                switch ($section) {
                    case 'overview':
                        include('dhome.php');
                        break;
                    case 'contracts':
                        include('contract.php');
                        break;
                    case 'payment':
                        if ($hasPurchasedPlan) {
                            include('payment_details.php'); 
                        } else {
                            include('pricing.php'); 
                        }
                        break;
                    case 'reports':
                        include('reports.php');
                        break;
                    case 'settings':
                        include('settings.php');
                        break;
                        
                    default:
                        echo 'Invalid section selected.';
                        break;
                }
            } else {
                
                include('dhome.php');
            }
            ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
