<!DOCTYPE html>
<html>
<head>
    <title>Complaint Register</title>
    <style>
       /* body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }*/

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .check{
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .error-message {
            color: red;
            text-align: center;
        }

        .success-message {
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="section">
    <?php
    // Check if a message exists
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        $class = "success-message";

        // Check if the message is an error message (ID already exists)
        if (strpos($message, "already exists") !== false) {
            $class = "error-message";
        }

        echo "<p class='$class'>$message</p>";
    }
    ?>
    <h2>Report a Complaint</h2>
    <form action="process.php" method="post">
        <label for="id">COMPANY ID:</label>
        <input type="text" name="company_id" required autocomplete="off"><br><br>

        <label for="name">COMPANY NAME:</label>
        <input type="text" name="company_name" required><br><br>

        <label for="loginError">LOGIN ERRORS:</label>
        <select name="loginError">
            <option value="none">none</option>
            <option value="User_not_found">User not found</option>
            <option value="can't_login">can't login</option>
            <option value="Cannot_change_password">Cannot change password</option>
            <option value="invalid_id ">invalid id </option>
        </select><br><br>
        
        <label for="paymentError">PAYMENT ERRORS:</label>
        <select name="paymentError">
            <option value="none">none</option>
            <option value="Transation_Failed">Transation Failed</option>
            <option value="Server_not_respond">Server not respond</option>
            <option value="Payment_not_reflect">Payment not reflect</option>
            <option value="Payment_Glitch">Payment Glitch</option>
            
        </select><br><br>

        <label for="complaint">Complaint:</label>
        <select name="complaint">
            <option value="none">none</option>
            <option value="system_error">System Error</option>
            <option value="server_issue">Server Issue</option>
            <option value="Equipment_Malfunction">Equipment Malfunction</option>
            <option value="Hardware_Failures">Hardware Failures</option>
            <!-- Add more complaint options as needed -->
        </select><br><br>

        <input type="submit" value="Submit">
        <a class="check" href="check_status.html">Check Status</a>
          <a class="check" href="dashboard.php">Back to Dashboard</a>
    </form>
    </div>
</body>
</html>
