<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 30px;
        }

        .plan-selection {
            width: 50%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .plan-radio {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            background: #f1f1f1;
            padding: 10px;
            border-radius: 8px;
        }

        .plan-radio input {
            margin-right: 10px;
            cursor: pointer;
        }

        .plan-radio label {
            font-size: 18px;
            color: #333;
        }

        #submit {
            width: 100%;
            margin-top: 15px;
            height: 40px;
            border: none;
            border-radius: 5px;
            background: #4caf50;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        #submit:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <h2>Pricing</h2>
    <form action="user_details_input.php" method="post">
        <div class="plan-selection">
            <h3>Step 1: Select a Plan</h3>
            <input type="hidden" name="company_id" value="<?php echo $_SESSION['company_id']; ?>">
            <div class="plan-radio">
                <input type="radio" name="selected_plan" value="basic" required>
                <label for="basic">Basic Plan: $100/month</label>
            </div>
            <div class="plan-radio">
                <input type="radio" name="selected_plan" value="standard" required>
                <label for="standard">Standard Plan: $300/month</label>
            </div>
            <div class="plan-radio">
                <input type="radio" name="selected_plan" value="premium" required>
                <label for="premium">Premium Plan: $500/month</label>
            </div>
            <!-- Continue Button for Plan Selection -->
            <input id="submit" type="submit" value="Continue">
        </div>
    </form>
</body>
</html>
