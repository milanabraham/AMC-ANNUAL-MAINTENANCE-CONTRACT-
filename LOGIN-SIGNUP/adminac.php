<?php

session_start();

include("connect.php");

$admin = $_POST["username"];
$pass = $_POST["password"];

if($admin == "milan" && $pass == "milans")
{
 header("location: dashboard.php");
}

else
{
  echo "invalid username or password";
}

?>
