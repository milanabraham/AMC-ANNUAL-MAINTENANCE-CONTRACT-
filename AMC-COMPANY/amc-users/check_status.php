<!DOCTYPE html>
<html>
<head>
    <title>Check Complaint Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .complaint-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
        }

        p {
            margin-bottom: 10px;
        }

        .status-processing {
            background-color: blue;
            color: white;
        }

        .status-complete {
            background-color: green;
            color: white;
        }

        .status-reject {
            background-color: red;
            color: white;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "AMC";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $company_id = $_POST['company_id'];

  
    $complaint = "";
    $status = "";
    
    $company_name = "";
    $login_error = "";
    $payment_error = "";
    


    $sql = "SELECT * FROM amc_reports WHERE company_id='$company_id'";
    $result = $conn->query($sql);
    
    

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $company_id = $row['company_id'];
        $company_name = $row['company_name'];
        $login_error = $row['login_error'];
        $payment_error = $row['payment_error'];
        $complaint = $row['complaint'];   
        $status = $row['status'];
    }
    ?>

    <h2>Complaint Status</h2>
    <div class="complaint-container">
        <label>COMPANY ID:</label> <?php echo $company_id; ?><br>
        <label>COMPANY NAME:</label> <?php echo $company_name; ?><br>
        <label>LOGIN ERROR:</label> <?php echo $login_error; ?><br>
        <label>PAYMENT ERROR:</label> <?php echo $payment_error; ?><br>
        <label>COMPLAINT:</label> <?php echo $complaint; ?><br>
 


        <?php

        $statusClass = '';
        if ($status == 'processing') {
            $statusClass = 'status-processing';
        } elseif ($status == 'complete') {
            $statusClass = 'status-complete';
        } elseif ($status == 'reject') {
            $statusClass = 'status-reject';
        }
        ?>

        <label class="<?php echo $statusClass; ?>">STATUS:</label> <?php echo $status; ?><br>
    </div>

    <a href="dashboard.php">Back</a>

    <?php

    $conn->close();
    ?>
    
    
</body>
</html>
