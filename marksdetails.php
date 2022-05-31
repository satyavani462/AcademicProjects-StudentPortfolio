<?php
$sum=0;
$avg=0;
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
    <title>MarksDetails</title>
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
            padding:2px 32px;
            border-radius:9px;
            background-color:green;
            color:white;
            font-size:17px;
        }
        h1{
            color:white;
            font-size:17px;
            margin-left:46%;
            margin-top:3%;
        }
        span{
            color:white;
            font-size:17px;
            margin-left:46%;
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
            <input type="submit" name="search" placeholder="Search By ID" value="search for Results">
        </form>
    </div>
    <?php
    $a=0;
    $b=0;
    $c=0;
    $tr=false;
                $server="localhost";
                $username="root";
                $password="";
                $database="project2";
                $con=mysqli_connect($server,$username,$password,$database);
                if($_SERVER['REQUEST_METHOD']=="POST"){
                    $id=$_POST['id'];
                    $sql="SELECT * FROM marks WHERE `id`='$id'";
                    $result=mysqli_query($con,$sql);
                    $sno=0;
                    while($rows=mysqli_fetch_assoc($result)){
                        $sno+=1;
                        $tr=true;
                         $a=$rows['sub1'];
                         $b=$rows['sub2'];
                         $c=$rows['sub3'];
                       $name=$rows['name'];
                        $id=$rows['id'];
                    }
                }
                if($tr){
                   echo "<table>
                <thead>
                <tr>
                    <th>S.no</th>
                    <th>Subject</th>
                    <th>Grade Points</th>
            
                </tr>
                </thead>
                <tbody>
                <tr>
                <td>1</td>
                <td>Computer Graphics</td>
                <td>$a</td>
                </tr>
                <tr>
                <td>2</td>
                <td>Web Technologies</td>
                <td>$b</td>
                </tr>
                <tr>
                <td>3</td>
                <td>Sensor Networks</td>
                <td>$c</td>
                </tr>
                ";}
                $sum=($a+$b+$c);
                $avg=($sum/3);
                ?>
    </tbody>
    </table>
    <?php
    if($tr)
    {
        $avg1 = round($avg);
echo "<span>".$name." - ".$id."</span>";
echo "<h1>Your Overall CGPA is ".($avg1)." Points</h1>";
    }
?>
    
</body>

</html>