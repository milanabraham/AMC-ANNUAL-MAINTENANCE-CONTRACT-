<?php
    $company_id = $_POST["company_id"];
    $selectedPlan = $_POST["selected_plan"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }
        h2 {
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>User Details</h2>
    <form action="checkout.php" method="post">
        <input type="hidden" name="selected_plan" value="<?php echo htmlspecialchars($selectedPlan); ?>">
        <input type="hidden" name="company_id" value="<?php echo htmlspecialchars($company_id); ?>">

        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="address">Address:</label>
        <textarea name="address" rows="4" required></textarea>

        
        <input type="submit" value="Continue to Order Summary">
    </form>
</body>
</html>
