<!DOCTYPE html>
<html>
<head>
    <title>Add Contract</title>
</head>
<body>
    <h2>Add Contract</h2>
    <?php
    if (isset($_GET["username"], $_GET["selected_plan"])) {
        $username = $_GET["username"];
        $selectedPlan = $_GET["selected_plan"];
    ?>
    <!-- Display the username and selected plan -->
    <p>User Name: <?php echo $username; ?></p>
    <p>Selected Plan: <?php echo $selectedPlan; ?></p>

    <form action="insert_contract.php" method="post">
        <!-- Hidden fields to pass data -->
        <input type="hidden" name="username" value="<?php echo $username; ?>">
        <input type="hidden" name="selected_plan" value="<?php echo $selectedPlan; ?>">
        
        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" required><br><br>

        <label for "end_date">End Date:</label>
        <input type="date" name="end_date" required><br><br>

        <input type="submit" value="Add Contract">
    </form>
    <?php } else {
        echo "Username and selected plan not provided.";
    }
    ?>
</body>
</html>
