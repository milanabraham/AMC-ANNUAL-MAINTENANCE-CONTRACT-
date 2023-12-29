<!DOCTYPE html>
<html>
<head>
    <title>User Page</title>
</head>
<body>
    <h2>User Page</h2>
    <div id="notifications">
        <?php
        // Define a function to fetch notifications for a user
        function getNotificationsForUser($userId) {
            // Replace this with your database query to fetch notifications for the user
            // You should return an array of notifications
            $notifications = array(
                "Notification 1",
                "Notification 2",
                "Notification 3"
            );
            return $notifications;
        }

        // Example user ID (replace with your actual user ID)
        $user_id = 123;

        // Get notifications for the user
        $notifications = getNotificationsForUser($user_id);

        // Output notifications
        foreach ($notifications as $notification) {
            echo "<div class='notification'>$notification</div>";
        }
        ?>
    </div>

    <script>
        // JavaScript to hide notifications after a few seconds
        window.onload = function() {
            var notifications = document.getElementsByClassName("notification");
            for (var i = 0; i < notifications.length; i++) {
                setTimeout(function() {
                    notifications[i].style.display = 'none';
                }, 5000); // Hide notifications after 5 seconds (adjust as needed)
            }
        };
    </script>
</body>
</html>
