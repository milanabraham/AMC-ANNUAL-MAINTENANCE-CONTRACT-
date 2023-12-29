<?php
// Include your database connection file here
include("conn.php");

// Start the session only if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['company_id'])) {
    $company_id = $_SESSION['company_id'];

    // Fetch the user's plan and payment details from the amc_payments table
    $sql = "SELECT selected_plan, start_date, end_date FROM amc_payments WHERE company_id = '$company_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if (isset($row['selected_plan']) && $row['selected_plan'] !== null) {
            $userPlan = $row['selected_plan'];
            $startDate = $row['start_date'];
            $endDate = $row['end_date'];

            // Prepare contract details for export
            $contractDetails = array(
                'User Plan' => $userPlan,
                'Start Date' => $startDate,
                'End Date' => $endDate,
                // Add more details as needed
            );

            // Set up CSV headers
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="contract_details.csv"');

            // Open output stream
            $output = fopen('php://output', 'w');

            // Output CSV headers
            fputcsv($output, array_keys($contractDetails));

            // Output contract details
            fputcsv($output, $contractDetails);

            // Close output stream
            fclose($output);

            // Exit to prevent additional content from being added to the CSV
            exit;
        }
    }
}

// If there is an issue or the session is not set, redirect to an error page or login page
header("Location: error.php");
exit;
?>
