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

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $selectedItemId = $_POST['item_id'];

    // Perform DELETE query to delete data for the selected item
    $sql = "DELETE FROM equipment WHERE id='$selectedItemId'";

    if ($conn->query($sql) === TRUE) {
        echo "Data deleted successfully";
    } else {
        echo "Error deleting data: " . $conn->error;
    }
}

// Retrieve a list of items from the database
$sql = "SELECT id, name FROM equipment";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Operations</title>
</head>
<body>
    <h2>Delete Data</h2>
    <form action="delete_data.php" method="post">
        <label for="item_id">Select Item to Delete:</label>
        <select name="item_id">
            <?php
            // Display the list of items as options
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
            }
            ?>
        </select>
        <br><br>

        <input type="submit" name="submit" value="Delete Data">
    </form>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
