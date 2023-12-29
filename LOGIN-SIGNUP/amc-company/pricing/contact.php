<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <!-- Include CSS styles for your contact page here -->
    <link rel="stylesheet" type="text/css" href="contact.css">
</head>
<body>
    <h2>Contact Us</h2>
    <p>For inquiries or to subscribe to our AMC plans, please fill out the form below:</p>
    <form action="submit_contact.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="message">Message:</label>
        <textarea name="message" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
    <!-- Include JavaScript for form validation or interactivity -->
    <script src="contact.js"></script>
</body>
</html>
