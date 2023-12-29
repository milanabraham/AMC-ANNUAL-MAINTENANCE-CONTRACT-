<?php

session_start();

session_unset();

session_destroy();

header("location: ..LOGIN-SIGNUP/student.php");
exit;

?>
