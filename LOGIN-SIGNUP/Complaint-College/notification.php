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

// Check if there are new complaints
$sql = "SELECT * FROM complaint WHERE status='processing'"; // Assuming 'new' is the initial status of a complaint

$result = $conn->query($sql);

if (!$result) {
    echo "Error executing query: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        echo "<h2>New Complaints</h2>";
        echo "<table>";
        echo "<tr><th>Complaint ID</th><th>Complainant Name</th><th>Complaint</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["complaint"] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
        // You can add further actions or buttons for the admin to take action on these complaints
    } else {
        echo "No new complaints at the moment.";
    }
}

// Close the database connection
$conn->close();
?>
