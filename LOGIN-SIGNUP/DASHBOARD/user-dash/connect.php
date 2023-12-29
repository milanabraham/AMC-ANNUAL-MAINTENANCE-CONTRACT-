<?php

$conn = mysql_connect("localhost","root","");
mysql_select_db("AMC");

if(!$conn)
{
 die("cant connect".mysql_connect_error());
}

?>
