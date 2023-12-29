
    <?php
    include("conn.php");
if (isset($_POST['logout'])) {

   // $_SESSION = array();
    session_start();
    session_unset();
    session_destroy();

    header("Location: login.php"); 
    exit;
}
?>

