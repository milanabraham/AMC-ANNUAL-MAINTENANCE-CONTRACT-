<?
include("connect.php");
?>
<! Doctype html>
<html>
<head>
<title>LOGIN</title>
<link rel="stylesheet" href="student.css">

<script>

function val()
{
  var pass = document.getElementById("pass").value;
  var cpass = document.getElementById("cpass").value;
  
  if(pass === cpass)
  {
  
   alert("pass not match");
  }
}


</script>

</head>
  <body>
 
   <form class ="Lform" action="studentac.php" method = "POST" autocomplete="off">
   <h1 class="login-title">STUDENT SIGNUP</h1>
   <input type="text" class="login-input" name="id" placeholder="student id" autofocus ="true"/ required>
   <input type="text" class="login-input" name="name" placeholder=" name" required>
   <input type="text" class="login-input" name="address" placeholder=" address" required >
   <input type="email" class="login-input" name="email" placeholder="email" required>
   <input type="text" class="login-input" name="phone" placeholder="phone" required>
   <input type="password" class="login-input" name="pass" placeholder="password" required >
   <input type="password" class="login-input" name="cpass" placeholder="confirm password" required >
   
   <input type="submit" value="SIGN UP" name="submit" class="login-button" onclick="val()">
   <p class="link" ><a href="student-login.php">LOGIN</a></p>
   
   
   
  </body>
</html>
