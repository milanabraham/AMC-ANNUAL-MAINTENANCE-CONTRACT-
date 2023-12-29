<?php
// Include your database connection file (e.g., conn.php)
include("conn.php");

// Define the FAQ class
class FAQ {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Function to add a new FAQ
    public function addFAQ($question, $answer, $category, $categorySource) {
        $query = "INSERT INTO tbl_faq (question, answer, category, created_at, updated_at, category_source) VALUES (?, ?, ?, NOW(), NOW(), ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $question, $answer, $category, $categorySource);

        if ($stmt->execute()) {
            return true; // Success
        } else {
            return false; // Error
        }
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

    // Other functions (updateFAQ, deleteFAQ, etc.) can be added as needed
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userQuestion = $_POST['user_question'] ;
    $selectedCategory = $_POST['category'] ;

    if (!empty($userQuestion) && !empty($selectedCategory)) {
        // Instantiate the FAQ class
        $faqManager = new FAQ($conn);

        // Assuming default values for answer and category source
        $answer = 'To be answered';
        $categorySource = 'User';

        // Add the user's question to the database
        $faqManager->addFAQ($userQuestion, $answer, $selectedCategory, $categorySource);

        // Redirect to prevent form resubmission
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
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
    <title>FAQ Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container-main {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .container {
            text-align: center;
        }

        h1.amc {
            color: #333;
        }

        .faq form {
            margin-bottom: 20px;
        }

        .faq label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .faq input[type="text"],
        .faq select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .faq button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .faq button:hover {
            background-color: #45a049;
        }

        .faq hr {
            border: 1px solid #ddd;
            margin: 20px 0;
        }

        .faq p {
            margin-bottom: 10px;
        }

        .faq a {
            color: #007bff;
            text-decoration: none;
        }

        .faq a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container-main">
        <div class="container">
            <h1 class="amc">FAQs</h1>
            <div class="faq">
                <!-- User question form -->
                <form method="post" action="">
                    <label for="user_question">Ask a Question:</label>
                    <input type="text" id="user_question" name="user_question" required>
                    
                    <!-- Dropdown menu for selecting category -->
                    <label for="category">Select Category:</label>
                    <select id="category" name="category" required>
                        <option value="Technical">Technical</option>
                        <option value="Billing">Billing</option>
                        <!-- Add more options as needed -->
                    </select>
                    
                    <button type="submit">Submit</button>
                </form>

                <hr>

                <!-- Display FAQs here -->
                <?php
                foreach ($faqs as $faq) {
                    echo "<p><strong>Question:</strong> " . $faq['question'] . "</p>";
                    echo "<p><strong>Answer:</strong> " . $faq['answer'] . "</p>";
                    echo "<p><strong>Category:</strong> " . $faq['category'] . "</p>";
                    echo "<hr>";
                }
                ?>

      
            </div>
        </div>
    </div>

</body>
</html>
