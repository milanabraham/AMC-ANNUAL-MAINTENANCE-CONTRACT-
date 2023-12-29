<?php

include("connect.php");

$ids = $_POST["user"];
$names = $_POST["add"];
$add = $_POST["phone"];
$mail = $_POST["suggest"];


$sql = "insert into contact values('$ids','$names',$add,'$mail')";

$result = mysql_query($sql);

if($result)
{
  echo "Thank you for contact us . Your request will process soon .";
}
else
{
echo "not inserted";
}
