<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contract Details</title>
    <style>
        body {
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .left-section,
        .right-section {
            width: 550px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            max-height: 100vh;
            float: left;
            height:500px;
        }

        .right-section {
            float: right;
        }

        h2,
        h3 {
            color: #333;
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 8px;
        }

        p {
            margin-bottom: 16px;
        }

        .contract-details {
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .highlight {
            color: #007bff;
        }

        form {
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            width: 100%;
            margin-top:20px;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: #ff0000;
            margin-top: 4px;
        }

        span{
            color:green;
        }
    </style>
</head>

<body>

    <?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include("conn.php");

    if (isset($_SESSION['company_id'])) {
        $company_id = $_SESSION['company_id'];

        $sql = "SELECT selected_plan, start_date, end_date FROM amc_payments WHERE company_id = '$company_id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);

            if (isset($row['selected_plan']) && $row['selected_plan'] !== null) {
                $userPlan = $row['selected_plan'];
                $startDate = $row['start_date'];
                $endDate = $row['end_date'];

                echo "<div class='left-section'>";
                echo "<h2>Contract Details</h2>";

                switch ($userPlan) {
                    case "basic":

                        echo "<h3>Basic Contract Details:</h3>";
                        echo "<ul>";
                        echo "<li>Desktop</li>";
                        echo "<li>CPU</li>";
                        echo "<li>Mouse</li>";
                        echo "<li>Keyboard</li>";
                        echo "<li>Service Level: Standard</li>";
                        echo "<li>Usage Limits: Unlimited</li>";
                        echo "</ul>";
                        break;
                    case "standard":

                        echo "<h3>Standard Contract Details:</h3>";
                        echo "<ul>";
                        echo "<li>Desktop</li>";
                        echo "<li>CPU</li>";
                        echo "<li>Mouse</li>";
                        echo "<li>Keyboard</li>";
                        echo "<li>Printers, Scanners, Cameras</li>";
                        echo "<li>Speakers</li>";
                        echo "<li>Service Level: Enhanced</li>";
                        echo "<li>Usage Limits: 100 support requests/month</li>";
                        echo "</ul>";
                        break;
                    case "premium":

                        echo "<h3>Premium Contract Details:</h3>";
                        echo "<ul>";
                        echo "<li>Desktop</li>";
                        echo "<li>CPU</li>";
                        echo "<li>Mouse</li>";
                        echo "<li>Keyboard</li>";
                        echo "<li>Printers, Scanners, Cameras</li>";
                        echo "<li>Speakers</li>";
                        echo "<li>Multimedia Projectors</li>";
                        echo "<li>Disk Drives</li>";
                        echo "<li>Modems</li>";
                        echo "<li>Service Level: Premium</li>";
                        echo "<li>Usage Limits: 200 support requests/month</li>";
                        echo "</ul>";
                        break;
                }

                $currentDate = date('Y-m-d');
                if ($currentDate <= $endDate) {
                    echo "<p class='highlight'>Contract Status:<span> Active </span></p>";
                } else {
                    echo "<p>Contract Status: Expired</p>";
                }

                if ($currentDate <= $endDate) {
                    echo "<p>Renewal Information: Your contract is eligible for renewal. Please check renewal terms.</p>";
                }

                echo "</div>";

                echo "<div class='right-section'>";
                echo "<div class='contract-details'>";
                echo "<p class='highlight'>Contract Start Date: $startDate</p>";
                echo "<p class='highlight'>Contract End Date: $endDate</p>";
                echo "</div>";

                

                echo "<h3>Payment History:</h3>";
                $paymentHistorySql = "SELECT total_amount, payment_timestamp FROM amc_payments WHERE company_id = '$company_id'";
                $paymentHistoryResult = mysqli_query($conn, $paymentHistorySql);
                if ($paymentHistoryResult) {
                    echo "<ul>";
                    while ($paymentRow = mysqli_fetch_assoc($paymentHistoryResult)) {
                        $paymentAmount = $paymentRow['total_amount'];
                        $paymentTimestamp = $paymentRow['payment_timestamp'];
                        echo "<li>Payment Date: $paymentTimestamp - Amount: $$paymentAmount</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "Error fetching payment history: " . mysqli_error($conn);
                }

                // echo '<form method="" action="payment_details.php">';
                echo '<input type="hidden" name="add_contract" value="1">';
                echo '<label for="contract_name">Add a Contract:</label>';
                echo '<input type="text" name="contract_name" required placeholder="You can nenew to a premium contract in the payment page" readonly>';
                echo '<button type="submit" >Add a Contract</button>';
                echo '</form>';

                echo '<form method="post" action="export_contract.php">';
                echo '<button type="submit">Download Contract Details</button>';
                echo '</form>';

                echo "</div>";

            } else {
                echo "No active plan. Please purchase a plan to access contracts.";
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {

        header("Location: login.php");
        exit;
    }
    ?>
</body>

</html>
