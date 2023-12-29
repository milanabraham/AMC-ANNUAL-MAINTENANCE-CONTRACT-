<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        select {
            width: 100%;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Admin Dashboard</h2>
    <?php
    // Check if a status update message exists
    if (isset($_GET['message'])) {
        echo "<p style='color: green;'>" . $_GET['message'] . "</p>";
    }
    ?>
    <form action="admin-action.php" method="post">
        <table>
            <tr>
                <th>Complaint ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Complaint</th>
                <th>Status</th>
            </tr>
            <?php
            // Establish a database connection (replace with your database credentials)
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AMC";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve all complaints
            $sql = "SELECT * FROM complaint";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["department"] . "</td>";
                    echo "<td>" . $row["complaint"] . "</td>";
                    echo "<td>";
                    echo "<select name='status[]'>";
                    echo "<option value='processing' " . ($row["status"] == "processing" ? "selected" : "") . ">Processing</option>";
                    echo "<option value='complete' " . ($row["status"] == "complete" ? "selected" : "") . ">Complete</option>";
                    echo "<option value='reject' " . ($row["status"] == "reject" ? "selected" : "") . ">Reject</option>";
                    echo "</select>";
                    // Add a hidden input for the complaint ID
                    echo "<input type='hidden' name='id[]' value='" . $row["id"] . "'>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No complaints found.</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </table>

        <input type="submit" value="Update Status">
    </form>

    <!-- Add a link to the notification page -->
    <a href="notification.php">Check New Complaints</a>
</body>
</html>
