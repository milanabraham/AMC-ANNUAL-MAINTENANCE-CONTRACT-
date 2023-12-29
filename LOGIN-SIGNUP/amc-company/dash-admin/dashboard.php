<?php
function getTotalEquipmentCount() {
    // Implement code to fetch total equipment count from the database
    $count = 100; // Replace with actual database query
    return $count;
}

function getPendingRequestsCount() {
    // Implement code to fetch pending requests count from the database
    $count = 5; // Replace with actual database query
    return $count;
}

function getRecentActivityLog() {
    // Implement code to fetch recent activity log from the database
    // Example data for demonstration purposes:
    $activityLog = '<li>User John Doe added new equipment.</li>';
    $activityLog .= '<li>User Jane Smith approved a request.</li>';
    // Replace with actual database query to retrieve activity log
    return $activityLog;
}
?>
