<?php
// Include your database connection file here
include("conn.php");

// Start the session
session_start();

if (isset($_SESSION['company_id'])) {
    $company_id = $_SESSION['company_id'];

    // Fetch payment details for the user
    $sql = "SELECT * FROM amc_payments WHERE company_id = '$company_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $payment = mysqli_fetch_assoc($result);

        if ($payment) {
            echo "<h2>Payment Details</h2>";
            if (isset($payment['selected_plan'])) {
                echo "<p>Plan: " . $payment['selected_plan'] . "</p>";
            }
            if (isset($payment['total_amount'])) {
                echo "<p>Total Amount: $" . $payment['total_amount'] . " per month</p>";
            }
            if (isset($payment['payment_method'])) {
                echo "<p>Payment Method: " . $payment['payment_method'] . "</p>";
            }
            if (isset($payment['payment_timestamp'])) {
                echo "<p>Payment Timestamp: " . $payment['payment_timestamp'] . "</p>";
            }

            // Display renewal option
            echo "<h2>Renewal</h2>";
            echo "<p>Your current plan is valid until: " . $payment['end_date'] . "</p>";
            echo "<p>If you wish to renew, please select a plan and proceed with the payment:</p>";

            // Display plan selection form
            echo '<form method="post" action="renewal_process.php">';
            echo '<label for="selected_plan">Select a Plan:</label>';
            echo '<select name="selected_plan" required>';
            echo '<option value="basic">Basic</option>';
            echo '<option value="standard">Standard</option>';
            echo '<option value="premium">Premium</option>';
            echo '</select>';
            echo '<br>';
            echo '<button type="submit">Renew</button>';
            echo '</form>';
        } else {
            echo "<p>No payment details found.</p>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // Redirect the user to the login page if they are not authenticated
    header("Location: login.php");
    exit;
}
?>
