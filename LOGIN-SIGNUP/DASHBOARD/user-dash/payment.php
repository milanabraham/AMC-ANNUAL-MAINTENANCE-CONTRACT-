<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
</head>
<body>
    <h2>Select Payment Method</h2>
    
    <?php
    // Check if the "selected_plan" and "total_amount" keys are defined in the POST data
    if (isset($_POST["selected_plan"]) && isset($_POST["total_amount"])) {
        // Retrieve the selected plan and total amount
        $selectedPlan = $_POST["selected_plan"];
        $totalAmount = $_POST["total_amount"];
        $userName = $_POST["name"];

        
        
        // Display the order summary
        echo "<p>Order Summary:</p>";
        echo "<p>Plan: $selectedPlan</p>";
        echo "<p>Total Amount: $$totalAmount/month</p>";

        // Display payment method options
        echo '<form action="confirmation.php" method="post">';
        echo '<input type="hidden" name="selected_plan" value="'.$selectedPlan.'">';
        echo '<input type="hidden" name="total_amount" value="'.$totalAmount.'">';
        echo '<input type="hidden" name="name" value="'.$userName.'">';
        

        // Payment method radio buttons
        echo '<input type="radio" name="payment_method" value="credit_card" required>';
        echo '<label for="credit_card">Credit Card</label><br>';

        echo '<input type="radio" name="payment_method" value="paypal" required>';
        echo '<label for="paypal">PayPal</label><br>';

        echo '<input type="radio" name="payment_method" value="upi" required>';
        echo '<label for="upi">UPI</label><br>';

        echo '<input type="radio" name="payment_method" value="net_banking" required>';
        echo '<label for="net_banking">Net Banking</label><br>';

        // Add more payment methods as needed
        // Example:
        // echo '<input type="radio" name="payment_method" value="another_method" required>';
        // echo '<label for="another_method">Another Payment Method</label><br>';

        // Continue button for payment
        echo '<br>';
        echo '<input type="submit" value="Continue to Payment">';
        echo '</form>';

        
    } else {
        // If the required data is not defined, display an error message
        echo "<p>Invalid request. Please select a plan and total amount first.</p>";
    }
    ?>
</body>
</html>
