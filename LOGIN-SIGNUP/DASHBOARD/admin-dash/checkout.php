<!DOCTYPE html>
<html>
<head>
    <title>Order Summary</title>
</head>
<body>
    <h2>Order Summary</h2>
    
    <?php


    // Define the prices for each plan
    define("BASIC_PRICE", 10);     // Replace with the actual price for the Basic Plan
    define("STANDARD_PRICE", 20);  // Replace with the actual price for the Standard Plan
    define("PREMIUM_PRICE", 30);   // Replace with the actual price for the Premium Plan

    // Check if the "selected_plan" key is defined in the POST data
    if (isset($_POST["selected_plan"])) {
        // Process the form data
        // Process the form data
$selectedPlan = $_POST["selected_plan"];
$name = $_POST["name"]; // Retrieve the user's name from the form data
$email = $_POST["email"];
$address = $_POST["address"];

// Calculate the total amount based on the selected plan
$totalAmount = 0;
switch ($selectedPlan) {
    case "basic":
        $totalAmount = BASIC_PRICE;
        break;
    case "standard":
        $totalAmount = STANDARD_PRICE;
        break;
    case "premium":
        $totalAmount = PREMIUM_PRICE;
        break;
    default:
        // Handle invalid plan selection
        echo "<p>Invalid plan selected.</p>";
        break;
}

// Display order summary
if ($totalAmount > 0) {
    echo "<p>Plan: $selectedPlan</p>";
    echo "<p>Total Amount: $$totalAmount/month</p>";
    echo "<p>Name: $name</p>"; // Display the user's name
    echo "<p>Email: $email</p>";
    echo "<p>Address:</p>";
    echo "<p>$address</p>";

    // Add a continue button for going to the payment part
    echo '<form action="payment.php" method="post">';
    echo '<input type="hidden" name="selected_plan" value="'.$selectedPlan.'">';
    echo '<input type="hidden" name="total_amount" value="'.$totalAmount.'">';
    echo '<input type="hidden" name="name" value="'.$name.'">'; // Pass the user's name
    echo '<input type="submit" value="Continue to Payment">';
    echo '</form>';

    
}

    } else {
        // If "selected_plan" key is not defined, display an error message
        echo "<p>Invalid request. Please select a plan.</p>";
    }
    ?>
</body>
</html>
