<!DOCTYPE html>
<head>
    <title>AMC Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">AMC Dashboard</div>
            <ul class="nav-items">
                <li class="nav-item active"><a href="?section=overview">Home</a></li>
              
                <li class="nav-item"><a href="?section=reports">Reports</a></li>
                <li class="nav-item"><a href="?section=settings">Settings</a></li>
            </ul>
        </div>
        <div class="content">
            <?php
      
            if (isset($_GET['section'])) {
                $section = $_GET['section'];

                switch ($section) {
                    case 'overview':
                        include('overview.php');
                        break;
                   
                  
                    case 'reports':
                        include('reports.php');
                        break;
                    case 'settings':
                        include('settings.php');
                        break;
                    default:
                        echo 'Invalid section selected.';
                        break;
                }
            } else {
        
                include('overview.php');
            }
            ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
