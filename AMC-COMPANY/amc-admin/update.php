<?
include("connect.php");


$names = $_POST["name"];
$add = $_POST["address"];
$mail = $_POST["email"];
$num = $_POST["phone"];
$pass = $_POST["pass"];
$cpass = $_POST["cpass"];

$sql = "update student set('$names','$add','$mail','$num','$pass','$cpass') ";

$result = mysql_query($sql);

if($pass == $cpass)
{
if($result)
{
header("location: student-login.php");
}
else
{
echo "not inserted";
}
}
else
{
echo "<html>
<head>
<style>
h1{
color:red;
text-align:center;
}
</style>
<body>
<h1>password not matching</h1> </body></html>";
}

?>




