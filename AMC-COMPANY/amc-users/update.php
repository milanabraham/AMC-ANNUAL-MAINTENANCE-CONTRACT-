<?
include("conn.php");


$names = $_POST["company_name"];
$add = $_POST["company_address"];
$mail = $_POST["email"];
$num = $_POST["mobile_number"];
$pass = $_POST["password"];


$sql = "update amc_users set( company_name, email , mobile_number,  company_address , password) VALUES ('$names','$mail','$num','$add','$pass') ";

$result = mysql_query($sql);



if($result)
{
header("location: login.php");
}
else
{
echo "not inserted";
}


?>




