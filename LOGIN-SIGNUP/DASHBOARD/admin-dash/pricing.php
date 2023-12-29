<!DOCTYPE html>
<html>
<head>
    <title>Pricing</title>
    <link rel="stylesheet" href="payment.css">
</head>
<body>
    <h2>Pricing</h2>
    <form action="user_details_input.php" method="post">
        <div class="plan-selection">
            <h3>Step 1: Select a Plan</h3>
            <div class="plan-radio">
                <input type="radio" name="selected_plan" value="basic" required>
                <label for="basic">Basic Plan: $X/month</label>
            </div>
            <div class="plan-radio">
                <input type="radio" name="selected_plan" value="standard" required>
                <label for="standard">Standard Plan: $Y/month</label>
            </div>
            <div class="plan-radio">
                <input type="radio" name="selected_plan" value="premium" required>
                <label for="premium">Premium Plan: $Z/month</label>
            </div>
            <!-- Continue Button for Plan Selection -->
            <input type="submit" value="Continue">
        </div>
    </form>
</body>
</html>
