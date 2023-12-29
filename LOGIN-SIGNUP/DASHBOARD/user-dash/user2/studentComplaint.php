<!DOCTYPE html>
<html>
<head>
    <title>Complaint Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

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

        a {
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
    <h2>Complaint Register</h2>
    <form action="process.php" method="post">
        <label for="id">ID:</label>
        <input type="text" name="id" required autocomplete="off"><br><br>

        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>

        <label for="department">Department:</label>
        <select name="department">
            <option value="bca">BCA</option>
            <option value="bba">BBA</option>
            <option value="bsc">BSc</option>
            <option value="msw">MSW</option>
        </select><br><br>

        <label for="complaint">Complaint:</label>
        <select name="complaint">
            <option value="system_error">System Error</option>
            <option value="server_issue">Server Issue</option>
            <option value="Equipment_Malfunction">Equipment Malfunction</option>
            <option value="Hardware_Failures">Hardware Failures</option>
            <!-- Add more complaint options as needed -->
        </select><br><br>

        <input type="submit" value="Submit">
        <a href="./check_status.html">Check Status</a>
    </form>
</body>
</html>
