<?php
$success=false;
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $server="localhost";
    $username="root";
    $password="";
    $database="project2";
    $con=mysqli_connect($server,$username,$password,$database);
    $name=$_POST['name'];
    $id=$_POST['id'];
    $sub1=$_POST['sub1'];
    $sub2=$_POST['sub2'];
    $sub3=$_POST['sub3'];
    $sql="INSERT INTO `marks` (`name`, `id`, `sub1`, `sub2`,`sub3`) VALUES ('$name', '$id', '$sub1', '$sub2','$sub3');";
    $res=mysqli_query($con,$sql);
    if($res){
        $success=true;
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
    <link rel="stylesheet" href="marks.css">
    <script src="marks.js"></script>
    <title>Marks Form</title>
    <style>
        .div{
    height:100vh;
}

        .div{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
        }
.a{
    font-size: 18px;
    margin: 8px;
}
    </style>
</head>
<body>
    <a href="home.php" target="_blank"><i class="fa fa-home" id="home" aria-hidden="true" style="font-size:40px;color:white" ></i></a>
    <?php
    if(!$success){
    echo '<div class="container ">
        <p>Marks Form</p>
    <form action="marks.php" method="post">
        <div class="smallcont">
        <label for="name">Username</label>
        <input type="text" id="name" name="name" required>
        <label for="id">ID</label>
        <input type="number" id="id" name="id" required>
        <label for="sub1">Computer Graphics</label>
        <input type="number" name="sub1" id="sub1">
        <label for="sub2">WebTechnologies</label>
        <input type="number" name="sub2" id="sub2">
        <label for="sub3">Sensor Networks</label>
        <input type="number" name="sub3" id="sub3">
        <input type="submit" value="SUBMIT">
        </div>
    </form>
    </div>';
    }
    ?>
    <?php
    if($success){
    echo '   <div class="div">
    <h1 class="h1">Inserted Successfully</h1>
    <a class="a" href="marks.php">Go Back</a>
    <a class="a" href="marksedit.php">Manage Marks</a>
</div>';
    }
    ?>
</body>
</html>