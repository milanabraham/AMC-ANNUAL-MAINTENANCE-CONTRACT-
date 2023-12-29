<?php
// Establish a database connection (replace with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form
$id = $_POST['id'];

// Perform SELECT query and display data
$sql = "SELECT * FROM equipment WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2>Equipment Details</h2>";
        echo "<p><strong>ID:</strong> " . $row["id"] . "</p>";
        echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
        echo "<p><strong>Type:</strong> " . $row["type"] . "</p>";
        echo "<p><strong>Quantity:</strong> " . $row["quantity"] . "</p>";
    }
} else {
    echo "No data found.";
}

// Close the database connection
$conn->close();
?>
