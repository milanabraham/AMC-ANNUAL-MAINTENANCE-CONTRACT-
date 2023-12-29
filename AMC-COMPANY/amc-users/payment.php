<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
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

        form {
            width: 80%;
            max-width: 400px; /* Adjust as needed */
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        p {
            margin: 10px 0;
        }

        label {
            display: block;
            margin: 8px 0;
            color: #555;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 12px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
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
        $company_id = $_POST["company_id"];

        // Display the order summary
        echo "<p>Order Summary:</p>";
        echo "<p><strong>Plan:</strong> $selectedPlan</p>";
        echo "<p><strong>Total Amount:</strong> $$totalAmount/month</p>";

        // Display payment method options
        echo '<form action="confirmation.php" method="post">';
        echo '<input type="hidden" name="selected_plan" value="'.$selectedPlan.'">';
        echo '<input type="hidden" name="total_amount" value="'.$totalAmount.'">';
        echo '<input type="hidden" name="name" value="'.$userName.'">';
        echo '<input type="hidden" name="company_id" value="'.$company_id.'">';

        // Payment method radio buttons
        echo '<label><input type="radio" name="payment_method" value="credit_card" required> Credit Card</label><br>';
        echo '<label><input type="radio" name="payment_method" value="paypal" required> PayPal</label><br>';
        echo '<label><input type="radio" name="payment_method" value="upi" required> UPI</label><br>';
        echo '<label><input type="radio" name="payment_method" value="net_banking" required> Net Banking</label><br>';

        // Add more payment methods as needed
        // Example:
        // echo '<label><input type="radio" name="payment_method" value="another_method" required> Another Payment Method</label><br>';

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
