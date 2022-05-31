<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="homelogo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="adminlogin.css">
    <title>Admin Login</title>
</head>
<body>
    <a href="home.php" target="_blank"><i class="fa fa-home" id="home" aria-hidden="true" style="font-size:40px;color:white" ></i></a>
    <div class="container ">
        <h1 >Admin Login</h1>
    <form onsubmit=" return func()" action="adminpage.html" method="post">
        <div class="smallcont">
        <label for="name">Username</label>
        <input type="text" id="name" placeholder="Your name" name="name" required>
        <label for="pwd">Password</label>
        <input type="password" id="pwd" placeholder="Your password" name="pwd" required>
        <input type="checkbox"><span>Remember me</span>
        <input type="submit" value="Login">
        </div>
    </form>
    </div>
    <script>
        function func(){
            let name=document.getElementById('name').value;
            let pwd=document.getElementById('pwd').value;
            if(name=="admin" && pwd=="aucew123")
            {
                return true;
            }
            else{
                document.getElementById('name').value="";
                document.getElementById('pwd').value="";
                alert("enter correct username and password");
                return false;
            }
        }
      </script>
</body>
</html>