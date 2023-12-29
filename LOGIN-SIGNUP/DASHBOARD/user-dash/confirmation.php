<?php
if (isset($_POST["selected_plan"], $_POST["total_amount"], $_POST["payment_method"], $_POST["name"])) {
    // Retrieve payment details from the form
    $selectedPlan = $_POST["selected_plan"];
    $totalAmount = $_POST["total_amount"];
    $paymentMethod = $_POST["payment_method"];
    $userName = $_POST["name"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "AMC";

    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $insertPaymentQuery = "INSERT INTO payments (user_name, selected_plan, total_amount, payment_method, payment_timestamp) VALUES ('$userName', '$selectedPlan', '$totalAmount', '$paymentMethod', NOW())";

    if ($conn->query($insertPaymentQuery) === TRUE) {
  
        echo "<h2>Order Confirmation</h2>";
        echo "<p>Your order has been received. Thank you for your payment!</p>";
        echo "User's Name: " . $userName;

      
        echo '<a href="add_contract.php?username='.$userName.'&selected_plan='.$selectedPlan.'">Add Contract</a>';
    } else {
      
        echo "<h2>Error</h2>";
        echo "<p>Error: Payment data could not be recorded.</p>";
    }

    
    $conn->close();
} else {
    
    echo "<h2>Error</h2>";
    echo "<p>Invalid request. Please select a plan, total amount, and payment method first.</p>";
}
?>
