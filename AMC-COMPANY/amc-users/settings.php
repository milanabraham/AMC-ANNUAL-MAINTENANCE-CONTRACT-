<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['company_id'] == NULL) {
    header("Location: login.php");
    exit;
}

include("conn.php");

$company_id = $_SESSION['company_id'];

// Fetch user data from the database
$selectUserSQL = "SELECT company_name, email, company_address FROM amc_users WHERE company_id = '$company_id'";
$result = mysqli_query($conn, $selectUserSQL);

if ($result) {
    $userData = mysqli_fetch_assoc($result);

    // Check if user data is retrieved
    if ($userData) {
        $currentName = $userData['company_name'];
        $currentEmail = $userData['email'];
        $currentAddress = $userData['company_address'];
    } else {
        // Handle the case when user data is not found
        echo "Error: User data not found.";
        exit;
    }
} else {
    // Handle the case when the query fails
    echo "Error: " . $selectUserSQL . "<br>" . mysqli_error($conn);
    exit;
}

if (isset($_POST['update'])) {
    $newName = $_POST['new_name'];
    $newEmail = $_POST['new_email'];
    $newAddress = $_POST['new_address'];
    $newPassword = password_hash($_POST['new_pass'], PASSWORD_DEFAULT);

    // Validate form data on the server side
    if (empty($newName) || empty($newEmail) || empty($newAddress) || empty($newPassword)) {
        echo "Error: All fields must be filled.";
    } else {
        $updateUserSQL = "UPDATE amc_users SET company_name = '$newName', email = '$newEmail', company_address = '$newAddress', password = '$newPassword' WHERE company_id = '$company_id'";

        if (mysqli_query($conn, $updateUserSQL)) {
            echo "User information updated successfully!";
        } else {
            echo "Error: " . $updateUserSQL . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <style>
        h2, h3 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }

        .logout-form {
            text-align: center;
            margin-top: 20px;
        }

        .error-message {
            color: #ff0000;
            margin-top: 4px;
        }
    </style>
    <script>
        function validateForm() {
            const newName = document.getElementById("new_name").value;
            const newEmail = document.getElementById("new_email").value;
            const newPassword = document.getElementById("new_pass").value;

            // Validate company name (can be extended based on requirements)
            if (newName.trim() === "") {
                alert("Please enter a valid company name.");
                return false;
            }

            // Validate email (basic validation)
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(newEmail)) {
                alert("Please enter a valid email address.");
                return false;
            }

            // Validate password
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
            if (!passwordRegex.test(newPassword)) {
                alert("Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 6 characters long.");
                return false;
            }

            // If all validations pass, the form will be submitted
            return true;
        }
    </script>
</head>
<body>
    <h2>Settings</h2>
    <form method="post" action="settings.php" onsubmit="return validateForm()">
        <h3>Update User Information</h3>
        <label for="new_name">Company Name:</label>
        <input type="text" name="new_name" id="new_name" value="<?php echo isset($currentName) ? $currentName : ''; ?>"><br><br>

        <label for="new_email">Email:</label>
        <input type="email" name="new_email" id="new_email" value="<?php echo isset($currentEmail) ? $currentEmail : ''; ?>"><br><br>

        <label for="new_address">Address:</label>
        <textarea name="new_address" rows="4"><?php echo isset($currentAddress) ? $currentAddress : ''; ?></textarea><br><br>

        <label for="new_password">Password:</label>
        <input type="password" name="new_pass" id="new_pass"><br><br>

        <input type="submit" name="update" value="Update Information">
        <input type="reset" name="reset">
    </form>

    <form method="post" action="logout.php">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>
