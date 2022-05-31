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
    $purpose=$_POST['purpose'];
    $scholar=$_POST['scholar'];
    $joinyear=$_POST['joinyear'];
    $semester=$_POST['semester'];
    $tutfee=$_POST['tutfee'];
    $exfee=$_POST['exfee'];
    $status=$_POST['status'];
    $sql="INSERT INTO `fee` (`username`, `id`, `purpose`, `scholar`, `joinyear`, `semester`, `tutfee`, `exfee`, `status`) VALUES ('$name', '$id', '$purpose', '$scholar', '$joinyear', '$semester', '$tutfee', '$exfee', '$status')";
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
    /* background:url('studentback.jpg') no-repeat center center/cover; */
    background-color: black;
    background-blend-mode: darken;
    top:0;
    left:0;
    width: 100%;
    height: 150%;
    z-index: -1;
    opacity:0.88;
}
p{
    font-size: 40px;
    padding-right: 40px;
}
#home{
    position: absolute;
    right: 40px;
    top: 4px;
}
.container
{
position: relative;
display:flex;
justify-content:center;
align-items:center;
margin:auto 50%;
width: 50%;
top: 50px;
right: 500px;
}
.smallcont input[type=text],input[type=number],input[type=password],input[type=submit],textarea{
    display:block;
    padding:5px 34px;
    margin:10px 12px;
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
     
}

.smallcont label
{
font-weight: 500;
 margin: 12px;
font-size:18px;

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
    <title>Payment Form</title>
</head>
<body>
    <a href="home.php" target="_blank"><i class="fa fa-home" id="home" aria-hidden="true" style="font-size:40px;color:white" ></i></a>
    <?php
    if(!$success){
    echo '<div class="container ">
        <p>Payment Form</p>
    <form action="payment.php" method="post">
        <div class="smallcont">
        <label for="name">Username</label>
        <input type="text" id="name" name="name" required>
        <label for="id">ID</label>
        <input type="number" id="id" name="id" required>
        <label for="purpose">Purpose</label>
        <input type="text" name="purpose" id="purpose" required>
        <label for="scholar">Scholar Eligibility</label>
        <input type="text" name="scholar" id="scholar" required>
        <label for="joinyear">Joinyear</label>
        <input type="text" name="joinyear" id="joinyear" required>
        <label for="semester">Semester</label>
        <input type="text" name="semester" id="semester" required>
        <label for="tutfee">Tuition Fee</label>
        <input type="text" name="tutfee" id="tutfee" required>
        <label for="exfee">exam fee</label>
        <input type="text" name="exfee" id="exfee" required>
        <label for="status">Status</label>
        <input type="text" name="status" id="status" required>
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
    <a class="a" href="payment.php">Go Back</a>
    <a class="a" href="paymentedit.php">Manage Payment</a>
</div>';
    }
    ?>
</body>
</html>