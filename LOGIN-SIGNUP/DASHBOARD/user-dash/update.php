<?
include("connect.php");

$ids = $_POST["id"];
$names = $_POST["name"];
$add = $_POST["address"];
$mail = $_POST["email"];
$num = $_POST["phone"];
$pass = $_POST["pass"];


$sql = "update student set id=$ids,name='$names',address='$add',email='$mail',phone='$num',password='$pass' where id=$ids ";

$result = mysql_query($sql);

if($result)
{
header("location: dashboard.php");
}
else
{
echo "not inserted";
}


?>




