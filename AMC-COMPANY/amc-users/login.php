<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_company_id = $_POST["email_company_id"];
    $password = $_POST["password"];

    
    include("conn.php");

   
    $login_field = filter_var($email_company_id, FILTER_VALIDATE_EMAIL) ? "email" : "company_id";


    $sql = "SELECT * FROM amc_users WHERE $login_field = ?";


    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        
        mysqli_stmt_bind_param($stmt, "s", $email_company_id);

       
        mysqli_stmt_execute($stmt);

        
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $row = mysqli_fetch_assoc($result);

            if ($row && password_verify($password, $row["password"])) {
               
                $_SESSION['company_id'] = $row["company_id"];

          
                header("Location: dashboard.php?section=overview"); 
                exit;
            } else {
                $login_error = "Invalid email or password. Please try again.";
            }
        } else {
            $login_error = "Database query error.";
        }

        
        mysqli_stmt_close($stmt);
    } else {
        $login_error = "Failed to prepare the statement.";
    }


    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <style>
    #error{
    color:red;
    }
    </style>
</head>
<body>
 <div class="login-container">
 <div class="login-box">
    <h2>Login</h2>

    <form action="" method="post">
     <div class="input-container">
        <label for="email_company_id">Email or Company ID:</label>
        <input type="text" name="email_company_id" required><br><br>
        </div>

       <div class="input-container">
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        </div>

          <div class="button-container">
        <button type="submit" >Login </button>
        </div>
          <div class="button-container">
          <a href="signup.html"><button type="button" >signup </button></a>
        </div>
        <!-- <p> Don't have an account ? <a href="signup.html">signup here</a> -->
        <p>  <a href="forgot.php">Forgot Password ?</a>
    </form>

    <?php
    if (isset($login_error)) {
        echo "<p id='error'>$login_error</p>";
    }
    ?>
      </div>
    </div>
</body>
</html>
