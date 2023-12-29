<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            height:300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
        }

        input{
            width: 90%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .error-message {
            color: red;
            text-align: center;
        }

        .success-message {
            color: green;
            text-align: center;
        }
    </style>




<div class="section" id="settings">
    <h2>Settings</h2>
     <form class ="Lform" action="update.php" method = "POST" autocomplete="off">

   <input type="number" class="login-input" name="id" placeholder=" id" required>
   <input type="text" class="login-input" name="name" placeholder=" name" required>
   <input type="text" class="login-input" name="address" placeholder=" address" required >
   <input type="email" class="login-input" name="email" placeholder="email" required>
   <input type="text" class="login-input" name="phone" placeholder="phone" required>
   <input type="password" class="login-input" name="pass" placeholder="password" required >
   <input type="submit" value="UPDATE" name="submit" class="login-button">
   </form>
</div>
