<?php
session_start();

include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_id = $_POST['admin_id'];
    $password = $_POST['password'];

    // Validate admin credentials
    $query = "SELECT * FROM admin WHERE admin_id = '$admin_id' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Admin credentials are valid
        $_SESSION['admin_id'] = $admin_id;
        header("location:dashboard.php");
        exit();
    } else {
        $error_message = "Invalid admin credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../amc-users/login.css">
    <title>Admin Panel Login</title>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h1>Admin Login Panel</h1>
            <?php if (isset($error_message)) : ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <form action="" method="POST">
                <div class="input-container">
                    <label for="username">Username:</label>
                    <input type="text"  name="admin_id" placeholder="Enter your username" required>
                </div>
                <div class="input-container">
                    <label for="password">Password:</label>
                    <input type="password"  name="password" placeholder="Enter your password" required>
                </div>
                <div class="button-container">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
