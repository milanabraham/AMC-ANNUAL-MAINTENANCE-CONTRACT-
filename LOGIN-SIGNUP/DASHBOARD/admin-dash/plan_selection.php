<!DOCTYPE html>
<html>
<head>
    <title>Add Contract</title>
</head>
<body>
    <h2>Add Contract</h2>
    <form action="insert_contract.php" method="post">
        <label for="customer">Customer Name:</label>
        <input type="text" name="customer" required><br><br>

        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" required><br><br>

        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" required><br><br>

        <!-- Plan Selection Input -->
        <label for="selected_plan">Select a Plan:</label>
        <select name="selected_plan" required>
            <option value="basic">Basic Plan</option>
            <option value="standard">Standard Plan</option>
            <option value="premium">Premium Plan</option>
        </select><br><br>

        <input type="submit" value="Add Contract">
    </form>
</body>
</html>
