<div class="section" id="reports">
    <h2>Reports</h2>
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
            background-color: #007BFF;
            color: white;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
        }
    </style>
</head>
<body>
    
    <?php

    if (isset($_GET['message'])) {
        echo "<p style='color: green;'>" . $_GET['message'] . "</p>";
    }
    ?>
    <form action="admin-action.php" method="post">
        <table>
            <tr>
                <th>COMPANY ID</th>
                <th>COMPANY NAME</th>
                <th>LOGIN ERRORS</th>
                <th>PAYMENT ERRORS</th>
                <th>COMPLAINTS</th>
                <th>STATUS</th>
            </tr>
            <?php
          
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "AMC";

            $conn = new mysqli($servername, $username, $password, $dbname);

          
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $sql = "SELECT * FROM amc_reports";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["company_id"] . "</td>";
                    echo "<td>" . $row["company_name"] . "</td>";
                    echo "<td>" . $row["login_error"] . "</td>";
                    echo "<td>" . $row["payment_error"] . "</td>";
                    echo "<td>" . $row["complaint"] . "</td>";
                    echo "<td>";
                    echo "<select name='status[]'>";
                   echo "<option value='processing' " . ($row["status"] == "processing" ? "selected" : "") . ">Processing</option>";
                    echo "<option value='complete' " . ($row["status"] == "complete" ? "selected" : "") . ">Complete</option>";
                    echo "<option value='reject' " . ($row["status"] == "reject" ? "selected" : "") . ">Reject</option>";
                    echo "</select>";
                  
                    echo "<input type='hidden' name='company_id[]' value='" . $row["company_id"] . "'>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No complaints found.</td></tr>";
            }

           
            $conn->close();
            ?>
        </table>

        <input type="submit" value="Update Status">
    </form>

    <a href="notification.php">Check New Complaints</a><br><br>
    <a href="dashboard.php">BACK TO DASHBOARD </a>
</body>
</html>
</div>
