<?php 

$conn = mysqli_connect("localhost","root","","AMC");

if(!$conn)
{
    die("cant connect".mysqli_connect_error());
}

