<?php
$avg=0;
$sum=0;
$name="";
$id="";
$tr=false;
session_start();
$pic="".$_SESSION['username'].".jpg";
$default="stud.jpg";
if(file_exists($pic)){
    $profile=$pic;
}
else{
    $profile=$default;
}
?>

<html>

<head>
    <title>AttendanceDetails</title>
    <link rel="shortcut icon" href="homelogo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: black;
        }

        html {
            scroll-behavior: smooth;
        }

        .center {
            text-align: center;
        }

        body::before {
            content: "";
            position: absolute;
            background-color: black;
            /* background:url('facb.jpg') no-repeat center center/cover; */
            background-blend-mode: darken;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.88;
        }

        .container {
            display: inline;
            width: 500px;
        }

        input[type=number] {
            margin-left: 380px;
            margin-top: 70px;
            width: 600px;
        }

      
        table {
            width: 600px;
        }
        th{
            background:black;
        }
        table,
        th,
        td {
            margin: auto 40 %;
            margin-top: 60px;
            margin-left: 460px;
            margin-bottom:2%;
            border: 2px solid white;
            border-collapse: collapse;
            color:white;
            text-align:center;
        }
        th,tr,td{
            padding:8px 12px;
        }

        .nav {
            width: 100%;
            height: 49px;
            position: sticky;
            top: 0;
            background-color: black;
            background-color: #234A7C;
        }

        ul {

            list-style: none;
            padding: 0;
            margin: 0;
            position: absolute;
        }

        ul li {
            float: left;
        }

        ul li a {
            text-decoration: none;
            width: 180px;
            color: white;
            display: block;
            font-size: 18px;
            border-radius: 10px;
            text-align: center;
            margin-top: 12px;
            margin-bottom: 12px;
        }

        a:hover {
            color: rgb(196, 191, 191);
        }

        ul li ul {
            background-color: #234A7C;
        }

        ul li ul li a {
            color: white;
        }

        ul li ul li {
            float: none;
        }

        ul li ul {
            display: none;
        }

        ul li:hover ul {
            display: block;
        }

        ul li ul li {
            border-bottom: 1px solid gray;
        }

        #home {
            position: absolute;
            right: 40px;
            top: 4px;
        }
        input{
            font-size:17px;
        }
        input[type=submit] {
            font-size:17px;
            padding:2px 32px;
            border-radius:9px;
            background-color:green;
            color:white;
        }
        h1{
            color:white;
            font-size:17px;
            margin-left:40%;
            margin-top:3%;
        }
        span{
            color:white;
            font-size:17px;
            margin-left:40%;
        }
        .li img{
        border-radius:50%;
        height:50px;
        width:50px;
    }
    </style>
</head>

<body>
    <div class="nav">
        <ul>
        <li class="li"><img src="<?php  if(isset($profile)) 
        echo $profile; ?>" alt=""></li>
            <li class="li"><a href="studentprofile.php">Home</a></li>
            <li class="li"><a href="notification1.php" target="_blank">Notifications</a></li>
            <li class="li"><a href="#">Details</a>
                <ul>
                    <li><a href="marksdetails.php" target="_blank">Results</a>
                    <li><a href="attdetails.php" target="_blank">Attendance</a>
                    <li><a href="paymentdetails.php" target="_blank">Fee</a>
                </ul>
            </li>
            <li class="li"><a href="contact.html" target="_blank">Contact Us</a></li>
            <li class="li"><a href="logout.php">Logout</a></li>
        </ul>
        <a href="home.php" target="_blank"><i class="fa fa-home" id="home" aria-hidden="true"
                style="font-size:40px;color:white"></i></a>
    </div>
    <div class="container">
        <form action="" method="post">
            <input class="center" type="number" name="id" placeholder="Enter ID">
            <input type="submit" name="search" placeholder="Search By ID" value="search for attendance">
        </form>
    </div>
    <?php
    $a="";
    $b="";
    $c="";
    $d="";
    $tr=false;
                $server="localhost";
                $username="root";
                $password="";
                $database="project2";
                $con=mysqli_connect($server,$username,$password,$database);
                if($_SERVER['REQUEST_METHOD']=="POST"){
                    $id=$_POST['id'];
                    $sql="SELECT * FROM attendance WHERE `id`='$id'";
                    $result=mysqli_query($con,$sql);
                    $sno=0;
                    while($rows=mysqli_fetch_assoc($result)){
                        $sno+=1;
                        $tr=true;
                         $a =  $rows['jan'];
                          $b=  $rows['feb'];
                           $c= $rows['march'];
                           $d= $rows['april'];
                        $name=$rows['username'];
                        $id=$rows['id'];
                    }
                }
                if($tr){
                   echo "<table>
                <thead>
                <tr>
                    <th>S.no</th>
                    <th>Month</th>
                    <th>Attendance</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td>1</td>
                <td>January</td>
                <td>$a</td>
                </tr>
                <tr>
                <td>2</td>
                <td>Febrauary</td>
                <td>$b</td>
                </tr>
                <tr>
                <td>3</td>
                <td>March</td>
                <td>$c</td>
                </tr>
                <tr>
                <td>3</td>
                <td>April</td>
                <td>$d</td>
                </tr>
                ";}
                $att1=(int)$a;
                $att2=(int)$b;
                $att3=(int)$c;
                $att4=(int)$d;
                $sum=$att1+$att2+$att3+$att4;
                $avg=$sum/4;
                ?>
    </tbody>
</table>
<?php

if($tr)
{
echo "<span>".$name." - ".$id."</span>";
echo "<h1>Your Overall Attendance Percentage Is ".($avg)."%</h1>";
}
?>
</body>

</html>