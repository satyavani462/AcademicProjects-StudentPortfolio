<?php
$showError=false;
$showsuccess=false;
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $server="localhost";
    $username="root";
    $password="";
    $database="project2";
    $con=mysqli_connect($server,$username,$password,$database);
    $name=$_POST['name'];
    $pwd=$_POST['pwd'];
    $id=$_POST['id'];
    $sql="SELECT * FROM `register` WHERE `id`='$id'";
    $res=mysqli_query($con,$sql);
    $num=mysqli_num_rows($res);
    if($num==1)
    {
      while($rows=mysqli_fetch_assoc($res))
      {
        if (($pwd==$rows['password']) && ($name==$rows['username'])){ 
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $name;
            $_SESSION['id']=$id;
            header("location:studentprofile.php");
        } 
        else{
            $showError = "Invalid Credentials";
        }
    }
}
else{
    
    $showError="Invalid Credentials";
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="homelogo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        *{
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    color:white;
}
html{
    scroll-behavior: smooth;
}
.center{
    text-align: center;
}
body::before{
    content: "";
    position: absolute;
    background: black;
    background-blend-mode: darken;
    top:0;
    left:0;
    width: 100%;
    height: 100%;
    z-index: -1;
    opacity:0.88;
}
h1{
    padding-right: 40px;
}
.container
{
display:flex;
justify-content:center;
align-items:center;
margin:auto 50%;
width: 30%;
padding-top: 90px;
padding-bottom: 20px;
padding-right:700px;
}
#home{
    position: absolute;
    right: 40px;
    top: 1.3rem;
}
.smallcont input[type=text],input[type=number],input[type=password],input[type=submit],textarea{
    display:block;
    padding:5px 34px;
    margin:15px 12px;
    width:393px;
    font-size:18px;
    border-radius: 10px;
    color: black;
}
.smallcont input[type=checkbox]{
margin-left:19px;
height: 15px;
width: 16px;
}
span{
    font-weight: 500;
    margin: 12px;
   font-size:18px;
   color: white;    
}
.smallcont label
{
font-weight: 500;
 margin: 12px;
font-size:18px;
color: white;
} 
input[type=submit]
{
    background-color: #234A7C;
    border-radius: 20px;
    color: white;
}
input[type=submit]:hover{
    opacity: 0.7;
}
.reg{
    position: relative;
    left:42rem;
}
    </style>
    <title>Student Login</title>
</head>
<body>
<?php
if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong style="color:white">Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
if($showsuccess){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong style="color:white">Error!</strong> '. $showsuccess.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
    <a href="home.php" target="_blank"><i class="fa fa-home" id="home" aria-hidden="true" style="font-size:40px;color:white" ></i></a>
    <div class="container ">
        <h1 class="center">Student Login</h1>
    <form onsubmit="validateForm()" action="studentlogin.php" method="post">
        <div class="smallcont">
        <label for="name">Username</label>
        <input type="text" id="name" placeholder="Your name" name="name" required>
        <label for="id">ID</label>
        <input type="number" id="id" placeholder="Your ID" name="id" onblur="funce()" required>
        <label for="pwd">Password</label>
        <input type="password" id="pwd" placeholder="Your password" name="pwd" onblur="funcp()" required>
        <input type="checkbox"><span>Remember me</span>
        <input type="submit" value="Login">
        </div>
    </form>
</div>
<p class="reg">Don't have an account? <a href="/html/register.html" style="color: dodgerblue;">signup here</a></p>
</body>
<script>
function validateForm() {
let e=document.getElementById('name').value;
let p=document.getElementById('id').value;
if (e == "") {
alert("**enter email");
return false;
}
if(p=="")
{
alert("**enter password");
return false;
}
}

function funce()
{
let regemail=/^3191141100[0-9]{2}/;
let id=document.getElementById('id').value;
if(regemail.test(id))
{
return true;
}
else
{
alert("**id must starts with 3191141100");
return false;
}
}

function funcp()
{
let regpassword=/^[a-zA-Z0-9!@#$%^&*]{6,16}/;
let password=document.getElementById('pwd').value;
if(regpassword.test(password))
{
return true;
}
else
{
alert("**password must have atleast 6 characters");
return false;
}
}
    </script>
</html>