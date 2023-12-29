<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
        }

        #error {
            color: red;
            text-align: center;
            font-weight: bold;
        }

        #success {
            color: blue;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <form id="resetForm" action="forgot.php" method="post">
        <h2>Password Reset</h2>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <div id="emailError" class="error"></div>

        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword" required>
        <div id="passwordError" class="error"></div>

        <button type="submit" onclick="resetPassword()">Reset Password</button>
        <a href="login.php"><button type="button" style="background:blue">Back To Login</button></a>
    </form>

    <script>
        function resetPassword() {
            var email = document.getElementById('email').value;
            var newPassword = document.getElementById('newPassword').value;
            var emailError = document.getElementById('emailError');
            var passwordError = document.getElementById('passwordError');

            emailError.innerHTML = '';
            passwordError.innerHTML = '';

            if (!validateEmail(email)) {
                emailError.innerHTML = 'Invalid email address';
                return;
            }

            // Validate password
            if (!validatePassword(newPassword)) {
                passwordError.innerHTML = 'Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 6 characters long.';
                return;
            }

            // If all validations pass, submit the form
            document.getElementById('resetForm').submit();
        }

        function validateEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        
        
    </script>

</body>
</html>
<?php

include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $newPassword = $_POST["newPassword"];

    // Validate password criteria
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/', $newPassword)) {
        echo "<p id='error'>Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 6 characters long.</p>";
        exit;
    }

    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $updateSql = "UPDATE amc_users SET password = ? WHERE email = ?";
    $stmt = $conn->prepare($updateSql);

    if ($stmt) {
        $stmt->bind_param("ss", $hashedPassword, $email);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<p id='success'>Password reset successfully!</p>";
        } else {
            echo "<p id='error'>Error updating password. User not found or no such email.</p>";
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>
