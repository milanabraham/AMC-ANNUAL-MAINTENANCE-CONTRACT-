<?php
include("connect.php");



$id = $_POST["userid"];
$pass = $_POST["password"];



$sql = "select * from student where id = $id and password =  '$pass'";
$result = mysql_query($sql);

$query = mysql_fetch_assoc($result);
if($query)
{
   header("location: DASHBOARD/dashboard.php");
}
else
{
  echo "login error";
 
}

?>
