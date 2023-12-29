<?php
// Include your database connection file here
include("conn.php");

// Start the session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_plan'])) {
    $company_id = $_SESSION['company_id'];
    $selected_plan = $_POST['selected_plan'];

    // Assuming you have a function to calculate the renewal end date
    $renewal_end_date = calculateRenewalEndDate($selected_plan);

    // Update the payment record with the new plan and renewal end date
    $updateSql = "UPDATE amc_payments SET selected_plan = '$selected_plan', end_date = '$renewal_end_date' WHERE company_id = '$company_id'";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        echo "<h2>Renewal Successful</h2>";
        echo "<p>Your plan has been renewed. Thank you for your payment!</p>";
        echo '<a href="dashboard.php">Back to Dashboard</a>';
    } else {
        echo "<h2>Error</h2>";
        echo "<p>Error updating payment details.</p>";
    }
} else {
    // Redirect the user to an error page if the request is invalid
    header("Location: error.php");
    exit;
}

// Function to calculate renewal end date (you can customize this based on your business logic)
function calculateRenewalEndDate($selected_plan) {
    // Add logic to calculate renewal end date based on the selected plan
    // For example, you might add a fixed duration to the current end date
    // or use a predefined renewal period for each plan
    return date('Y-m-d', strtotime('+1 year'));
}
?>
