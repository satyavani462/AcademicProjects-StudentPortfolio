<?php
$show=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$server="localhost";
$username="root";
$password="";
$database="project2";
$con=mysqli_connect($server,$username,$password,$database);
    $name=$_POST['name'];
    $pwd=$_POST['pwd'];
    $cpwd=$_POST['cpwd'];
    $branch=$_POST['branch'];
    $id=$_POST['id'];
    $address=$_POST['add'];
    $contact=$_POST['cno'];
    $existsql="SELECT * FROM `register` WHERE `id`='$id'";
    $r=mysqli_query($con,$existsql);
    $n=mysqli_num_rows($r);
    if($n>0)
    {
        $show=true;
    }
    else{
        if(($pwd==$cpwd))
        {
            $sql="INSERT INTO `register`(`username`,`id`,`branch`,`password`,`address`,`contact`,`dt`) VALUES ('$name','$id','$branch','$pwd','$address','$contact',current_timestamp())";
            $res=mysqli_query($con,$sql);
            if($res){
                header('location:home.php');
            }
        }
        else{
            echo "<h1>passwords are not matching</h1>";
            
        }
    }

}
?>
<html>
    <head>
    <style>
    
    *{
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    color: white;
   }
   html{
    scroll-behavior: smooth;
    }
    body{
        background:url('studentback.jpg') no-repeat center center/cover;
    }
    .center{
            text-align:center;
        }
        .main{
           display:flex;
           justify-content:center;
           align-items:center;
           position: relative;
           top:200px;
        }
        a{
            text-decoration:none;
        }
        .btn{
            background-color: black;
            color: white;
            padding: 6px 12px;
            margin: 10px 10px;
            font-size: 17px;
            border-radius:12px;
        }
        .btn:hover{
            background:none;
        }
        .container{
            margin-top:20px;
        }
    </style>
    </head>
    <body>
        <div class="main">
        <?php
        if($show){
            echo '<h1 class="center">Someone Already Registered Using This ID';
        }
       echo '<div class="container">
       <a href="register.html"><button class="btn">Register Here</button></a>
        <a href="home.php"><button class="btn">Go To Home Page</button></a>
        </div>';
        ?>
        </div>
    </body>
</html>