<?php
include("connect.php");

$id = $_POST["id"];

$sql = "select status from complaint where id = '$id' ";
$result = mysql_query($sql);

if($result>0)
{
$row=mysql_fetch_assoc($result);
$status=$row['status'];
echo "complaint status : $status";
}
else
{
echo "not found";
}
