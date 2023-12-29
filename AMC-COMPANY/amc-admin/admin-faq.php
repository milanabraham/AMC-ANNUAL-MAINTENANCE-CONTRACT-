<?php
// Include your database connection file (e.g., conn.php)
include("conn.php");

// Define the FAQ class
class FAQ {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Function to get all FAQs
    public function getAllFAQs() {
        $query = "SELECT * FROM tbl_faq";
        $result = $this->conn->query($query);

        $faqs = array();
        while ($row = $result->fetch_assoc()) {
            $faqs[] = $row;
        }

        return $faqs;
    }

    // Function to update the answer for a specific FAQ
    public function updateAnswer($faqId, $answer) {
        $query = "UPDATE tbl_faq SET answer = ?, updated_at = NOW() WHERE faq_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $answer, $faqId);

        return $stmt->execute();
    }
}

// Handle form submission to update answers
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $faqId = $_POST['faq_id'] ;
    $answer = $_POST['answer'] ;

    if (!empty($faqId) && !empty($answer)) {
        // Instantiate the FAQ class
        $faqManager = new FAQ($conn);

        // Update the answer in the database
        $faqManager->updateAnswer($faqId, $answer);
    }
}

// Fetch all FAQs
$faqManager = new FAQ($conn);
$faqs = $faqManager->getAllFAQs();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

    <div class="container-main">
        <div class="container">
            <h1 class="amc">Admin Panel</h1>
            <div class="faq">
                <!-- Display FAQs and provide a form to update answers -->
                <?php
                foreach ($faqs as $faq) {
                    echo "<div>";
                    echo "<p><strong>Question:</strong> " . $faq['question'] . "</p>";
                    echo "<p><strong>Answer:</strong> " . $faq['answer'] . "</p>";
                    echo "<form method='post' action=''>";
                    echo "<input type='hidden' name='faq_id' value='" . $faq['faq_id'] . "'>";
                    echo "<label for='answer'>Update Answer:</label>";
                    echo "<textarea id='answer' name='answer' rows='3' required></textarea>";
                    echo "<button type='submit'>Submit Answer</button>";
                    echo "</form>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>

</body>
</html>
