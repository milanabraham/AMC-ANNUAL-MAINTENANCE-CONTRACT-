	
<html>
<head>
<title>Dashboard</title>
<link rel ="stylesheet" href="dashboard.css">
</head>

<body>


<div class="container">

  <div class="nav-bars">
   <h1 id="logo">LOGO</h1>
    <nav>
    <ul>
<li class ="dash1">Dashboard</li>
<li class ="dash">Contracts</li>
<a href="customers.php"><li class ="dash">Customers</li></a>
<li class ="dash">Reports</li>
<li class ="dash">Settings</li>
<form action="../LOGIN-SIGNUP/student.php">
<input type="submit" class="log-btn" value="LogOut">
</form>
    </ul>
    </nav>
  </div>
  
<div class="content">



<h2 class="wel">Welcome Back Admin! </h2>



<!-- starting of box1 -->

<div class="contact-box1">

<div class="contracts">
<h3>Total Active Contracts</h3>
<p>356</p>
</div>

<div class="contracts">
<h3>Upcomming Renewals</h3>
<p>23 contracts due soon</p>
</div> 

</div>
<!-- end of box1 -->


<!-- starting of box2 -->
<div class="contact-box1">

<div  class="contracts"> 
<ul>
<li>contarct-id : 12342</li>
<li>customer : ABC Crop</li>
<li>Renewal Date:2023-9-23</li>
</div>

<div class="contracts">
<h3>Open service requests</h3>
<p>5 pending Requests</p>
</div>
</div>
<!-- end of box2 -->

<!-- starting of box3 -->
<div class="contact-box1">
<div  class="contracts"> 
<h3>Revenue Overview </h3>
<p>$8500 this month </p>
</div> 

<div  class="contracts"> 
<h3>Quick Links </h3>
<p>$8500 this month </p>
</div> 
</div>
<!-- end of box3 -->

</div>


