<! Doctype html>
<html>
<head>
<title>LOGIN</title>
<link rel="stylesheet" href="style.css">

</head>
  <body>
 
   <form class ="Lform" action="adminac.php" method = "POST" autocomplete="off">
   <h1 class="login-title">LOGIN </h1>
   <input type="text" class="admin-input" id="username" name="username" placeholder="admin-username" autofocus ="true"  required >
   <input type="password" class="admin-input" name="password" placeholder="password"  required>
   <input type="submit" value="LOGIN" name="submit" class="login-button" onclick="validate()">

  
  </body>
</html>
