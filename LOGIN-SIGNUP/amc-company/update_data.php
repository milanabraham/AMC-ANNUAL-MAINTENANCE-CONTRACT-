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
    $newName = $_POST['new_name'];
    $newType = $_POST['new_type'];
    $newQuantity = $_POST['new_quantity'];

    // Perform UPDATE query to update data for the selected item
    $sql = "UPDATE equipment SET 
        name = '$newName',
        type = '$newType',
        quantity = '$newQuantity'
        WHERE id = '$selectedItemId'";

    if ($conn->query($sql) === TRUE) {
        echo "Data updated successfully";
    } else {
        echo "Error updating data: " . $conn->error;
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
    <h2>Update Data</h2>
    <form action="update_data.php" method="post">
        <label for="item_id">Select Item:</label>
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

        <label for="new_name">New Name:</label>
        <input type="text" name="new_name" required><br><br>

        <label for="new_type">New Type:</label>
        <input type="text" name="new_type" required><br><br>

        <label for="new_quantity">New Quantity:</label>
        <input type="number" name="new_quantity" required><br><br>

        <input type="submit" name="submit" value="Update Data">
    </form>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
