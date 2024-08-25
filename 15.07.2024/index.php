<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            background-color: gray;
            display:flex;
            align-items: center;
            justify-content: center;
        }
        .login {
            width: 400px;
            height: 360px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
        }
        .login form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            margin-top: 0;
            font-weight: 500;
            font-size: 40px;
        }
        input {
            height: 40px;
            width: 300px;
            border-radius: 5px;
            border: solid 1px;
            outline: none;
            margin-bottom: 20px;
            padding: 0 10px;
        }
        button {
            height: 43px;
            width: 310px;
            border-radius: 5px;
            outline: none;
            border: none;
            background-color: #42A5F5;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .error-message {
            color: red;
            margin-top: 5px;
            display: none;
            text-align: left; 
        }
    </style>
</head>
<body>
   <div class="login">
       <form  action="test1.php" method="post" onsubmit="return userFormAddress()">   

           <h1>Login</h1>
           <label for="username"></label>
           <input type="text" name="username" id="username" placeholder="Username" >
           <p id="usernameError" class="error-message">Zəhmət olmasa username xanasını doldurun.</p>
 
           <label for="email"></label>
           <input type="email" name="email" id="email" placeholder="Email Address" >
           <p id="emailError" class="error-message">Zəhmət olmasa Email Address xanasını doldurun.</p>

           <button type="submit">Login</button>
           <p id="errorMessage" class="error-message">Zəhmət olmasa hər iki xananı doldurun.</p>
       </form>
   </div>

   <script>
       function userFormAddress() {
           var username = document.getElementById('username').value;
           var email = document.getElementById('email').value;
           var isValid = true;

           if (username.trim() === '') {
               document.getElementById('usernameError').style.display = 'block';
               isValid = false;
           } else {
               document.getElementById('usernameError').style.display = 'none';
           }

           if (email.trim() === '') {
               document.getElementById('emailError').style.display = 'block';
               isValid = false;
           } else {
               document.getElementById('emailError').style.display = 'none';
           }

           if (!isValid) {
               document.getElementById('errorMessage').style.display = 'block';
               return false; 
           }
    

           return true; 
       }
   </script>
</body>
</html>
