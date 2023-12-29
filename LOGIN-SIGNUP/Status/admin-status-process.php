<?php

include("connect.php");

$status = $_POST["Cselect"];
$ids = $_POST["id"];

$sql = "update complaint set status = '$status' where id = '$ids'";

if(mysql_query($sql) === TRUE)
{
echo "status updated..";
}
else
{
echo "Error while update";
}
