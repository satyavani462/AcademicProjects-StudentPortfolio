<?php
session_start();
if(!isset($_SESSION['loggedin']) || isset($_SESSION['loggedin'])!=true)
{
  header('location:login.html');
}
$pic="".$_SESSION['username'].".jpg";
$default="stud.jpg";
if(file_exists($pic)){
    $profile=$pic;
}
else{
    $profile=$default;
}
$server="localhost";
$username="root";
$password="";
$database="project2";
$id=$_SESSION['id'];
$con=mysqli_connect($server,$username,$password,$database);
$sql="SELECT * FROM `register` WHERE `register`.`id`='$id'";
$res=mysqli_query($con,$sql);
$rows=mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="homelogo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    background:black;
    background:url('facb.jpg') no-repeat center center/cover;
    background-blend-mode: darken;
    top:0;
    left:0;
    width: 100%;
    height: 100%;
    z-index: -1;
    opacity:0.88;
}

#home{
    position: absolute;
    right: 40px;
    top: 4px;
}
.nav{
    width:100%;
    height:49px;
    position: sticky;
    top: 0;
    background-color:black;
    background-color:#234A7C;
    }
ul{
    
    list-style:none;
    padding:0;
    margin:0;
    position: absolute;
    }
    ul li
    {
    float:left;
    }
    ul li a{
    text-decoration:none;
    width:180px;
    color:white;
    display:block;
    font-size:18px;
    border-radius:10px;
    text-align: center;
    margin-top: 12px;
    margin-bottom: 12px;
    }
    a:hover{
    color: rgb(196, 191, 191);
    }

    ul li ul{
    background-color: #234A7C;
    }
    ul li ul li a{
        color: white;
    }
    ul li ul li{
    float:none;
    }
    ul li ul{
    display:none;
    }
    ul li:hover ul
    {
    display:block;
    }
    ul li ul li{
    border-bottom:1px solid gray;
    }
    h1{
        margin-top: 50px;

    }
     table{
         margin: auto;
        margin-top: 40px;
        margin-left: 60px;
        height: 200px;
        width: 50%; 
        
        /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  */
    } 

 th,td{
        text-align: center;
        font-size: 20px;
        padding: 12px; 
    }
    .div{
        display: flex;
    } 
    .div table{
        /* background:url('facb.jpg'); */
    } 
    .div img{
        height: 250px;
        width: 250px;
        margin-top: 16%;
        margin-left: 150px;
        border-radius:30%;
    }
    .li img{
        border-radius:50%;
        height:50px;
        width:50px;
    }
    </style>
    <title>Student Profile</title>
</head>
<body>
    <div class="nav">
        <ul>
        
        <li class="li"><a href="studentprofile.php">Home</a></li>
        <li class="li"><a href="notification1.php" target="_blank">Notifications</a></li>
        <li class="li"><a href="#" >Details</a>
        <ul>
        <li><a href="marksdetails.php" target="_blank">Results</a>
        <li><a href="attdetails.php" target="_blank">Attendance</a>
        <li><a href="paymentdetails.php" target="_blank">Fee</a>
        </ul>
        </li>
        <li class="li"><a href="#" >Syllabus</a>
        <ul>
        <li><a href="cse.php" target="_blank">cse</a>
        <li><a href="cse.php" target="_blank">ece</a>
        <li><a href="cse.php" target="_blank">eee</a>
        <li><a href="cse.php" target="_blank">mech</a>
        <li><a href="cse.php" target="_blank">civil</a>
        </ul>
        </li>
        <li class="li"><a href="contact.html" target="_blank">Contact Us</a></li>
        <li class="li"><a href="logout.php"  >Logout</a></li>
        </ul>
        <a href="home.php" target="_blank"><i class="fa fa-home" id="home" aria-hidden="true" style="font-size:40px;color:white" ></i></a>
    </div>
   <h1 class="center">Student Profile</h1>
   <div class="div">
    <div>
        <img src="<?php 
        if(isset($profile)) 
        echo $profile;
         ?>" alt="">
    </div>
     <table>
          <tr>
              <td>StudentName:</td>
              <td><?php echo $_SESSION['username'] ?> </td>
          </tr>
          <tr>
              <td>RollNo:</td>
              <td><?php echo $_SESSION['id'] ?> </td>
          </tr>
          <tr>
              <td>Branch:</td>
              <td><?php echo $rows['branch']?></td>
          </tr>
          <tr>
              <td>Address:</td>
              <td><?php echo $rows['address']?></td>
          </tr>
          <tr>
              <td>Contact:</td>
              <td><?php echo $rows['contact']?></td>
          </tr>
      </table>
   </div>
</body>
</html>