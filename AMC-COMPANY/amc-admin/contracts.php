<html>
    <head>
    <style>
    /* Style for the Customers section */
    .section#customers {
        padding: 20px;
    }

    /* Style for the table */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    /* Style for table headers */
    th {
        background-color: #007BFF;
        color: white;
        font-weight: bold;
        padding: 10px;
        text-align: left;
    }

    /* Style for alternating rows */
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Style for table cells */
    td {
        padding: 10px;
    }

    /* Hover effect for rows */
    tr:hover {
        background-color: #007BFF;
        color: white;
    }
</style>

    </head>
    <body>




<div class="section" id="contracts">
    <h2>Customer Contracts</h2>

    <?php
  
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "AMC";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $sql = "SELECT * FROM amc_users"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Company Id</th><th>Company Name</th><th>Email</th><th>	
        Mobile Number</th><th>Company Address</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            //echo "<td>" . $row["contract_id"] . "</td>"; 
            echo "<td>" . $row["company_id"] . "</td>"; 
            echo "<td>" . $row["company_name"] . "</td>"; 
            echo "<td>" . $row["email"] . "</td>"; 
            echo "<td>" . $row["mobile_number"] . "</td>";
            echo "<td>" . $row["company_address"] . "</td>";
             
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No contracts found.";
    }

    // Close the database connection
    $conn->close();
    ?>
</div>
</body>

</html>
