<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Home</title>
    <style>
        /* Add your CSS styling here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        #header {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 20px;
        }

        #container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .dashboard-section {
            margin: 20px 0;
        }

        .dashboard-section h2 {
            color: #007BFF;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .welcome-box {
            background-color: #e0e0e0;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="header">
        <h1>Dashboard Home</h1>
    </div>
    <div id="container">
        <div class="dashboard-section" id="welcome">
            <h2>Welcome to Your Dashboard</h2>
            <?php
            // Start the session

            // Check if the user is authenticated, you may use a similar check you used in your login page

            if (isset($_SESSION['company_id'])) {
                $company_id = $_SESSION['company_id']; // Retrieve the "company_id" from the session
            } else {
                // Handle cases where the user is not authenticated
                header("Location: login.php"); // Redirect to the login page
                exit;
            }
            ?>

            <div class="welcome-box">
                <p>Welcome to your dashboard, Company ID: <strong><?php echo $company_id; ?></strong></p>
            </div>
        </div>

        <!-- Add more sections and widgets as needed -->
        <div class="dashboard-section" id="activity">
            <h2>Recent Activity</h2>
            <p>No Recent Activities.</p>
        </div>

        <div class="dashboard-section" id="links">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="?section=settings">Update User Details</a></li>
                <li><a href="?section=payment">Purchase a Plan</a></li>
                <li><a href="?section=reports">Submit a Report</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
