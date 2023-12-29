<style>
form{
width:500px;
height:300px;
background-color:white;
margin-right:80px;
display:flex;
flex-direction:column;
justify-content:center;
}

.login-input{
    width: 300px;
    height: 20px;
    border-radius: 5px;
    border: 1px solid black;
    margin-bottom: 10px;
    margin-left:80px;
    padding:5px;
}
.login-button{
    margin-top: 13px;
    color: #fff;
    font-family: geneva;
    background: #333;
    border-radius: 20px;
    outline: 0;
    width: 150px;
    height: 40px;
    font-size: 13px;
    font-weight: bold;
    text-align: center;
    cursor: pointer;
    margin-left: 160px;
}
</style>




<div class="section" id="settings">
    <h2>Settings</h2>
     <form class ="Lform" action="update.php" method = "POST" autocomplete="off">

   
   <input type="text" class="login-input" name="name" placeholder=" name" required>
   <input type="text" class="login-input" name="address" placeholder=" address" required >
   <input type="email" class="login-input" name="email" placeholder="email" required>
   <input type="text" class="login-input" name="phone" placeholder="phone" required>
   <input type="password" class="login-input" name="pass" placeholder="password" required >
   <input type="submit" value="UPDATE" name="submit" class="login-button">
   </form>
</div>
