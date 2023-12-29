<?php
include("connect.php");


$ids = $_POST["id"];
$names = $_POST["name"];
$dep = $_POST["deps"];
$com = $_POST["Cselect"];
$others = $_POST["other"];
$hiden = $_POST["hide"];

$sql = "insert into complaint values($ids,'$names','$dep','$com','$others','$hiden')";
$result = mysql_query($sql);

if($result)
{
echo " inserted";
}
else
{
echo "not inserted";
}

?>
