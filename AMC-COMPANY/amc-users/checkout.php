<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
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
    width: 60%;
    max-width: 400px; /* Adjust as needed */
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    color: #555;
}

input, textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 12px;
    cursor: pointer;
    border: none;
    border-radius: 4px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}


    </style>
</head>
<body>
    <h2>Order Summary</h2>

    <?php
    define("BASIC_PRICE", 10);
    define("STANDARD_PRICE", 20);
    define("PREMIUM_PRICE", 30);

    if (isset($_POST["selected_plan"])) {
        $selectedPlan = $_POST["selected_plan"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $company_id = $_POST["company_id"];

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
                echo "<p>Invalid plan selected.</p>";
                break;
        }

        if ($totalAmount > 0) {
            echo "<p><strong>Plan:</strong> $selectedPlan</p>";
            echo "<p><strong>Total Amount:</strong> $$totalAmount/month</p>";
            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Address:</strong></p>";
            echo "<p>$address</p>";

            echo '<form action="payment.php" method="post">';
            echo '<input type="hidden" name="selected_plan" value="'.$selectedPlan.'">';
            echo '<input type="hidden" name="total_amount" value="'.$totalAmount.'">';
            echo '<input type="hidden" name="company_id" value="'.$company_id.'">';
            echo '<input type="hidden" name="name" value="'.$name.'">';
            echo '<input type="submit" value="Continue to Payment">';
            echo '</form>';
        }
    } else {
        echo "<p>Invalid request. Please select a plan.</p>";
    }
    ?>
</body>
</html>
