<?php
session_start();
if(!isset($_SESSION['loggedin']) || isset($_SESSION['loggedin'])!=true )
{
  header('location:login.html');
}
else{
$pic="".$_SESSION['username'].".jpg";
$default="stud.jpg";
if(file_exists($pic)){
    $profile=$pic;
}
else{
    $profile=$default;
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
    <link rel="stylesheet" href="home.css">
    <script src="home.js"></script>
    <title>Andhra University|Vishakapatnam</title>
</head>

<body onload="displayTime()">
    <section id="navbar">
        
        <div class="container">
        <img class="pic" style="height: 59px;
    width: 61px;
    border-radius: 50%;position:absolute;left:30px;" src="<?php  if(isset($profile)) 
        echo $profile; ?>" alt="">
            <p href="#">
                
            <img id="logo" src="india.png" alt="">
            <p>|</p>
            <p id="text">India,Andhrapradesh,Vishakapatnam</p>
            <p>|</p>
            <i class="fa fa-clock-o" style="font-size:24px;margin-left:5px;"></i>
            <!-- <i class="fa-solid fa-clock"></i> -->
            <span id="time" ></span>
            </p>
            <div class="icons">
            <a href="https://www.andhrauniversity.edu.in/" target="_blank"><i id="f1"class="fa fa-facebook-square" aria-hidden="true"></i></a>
            <a href="https://www.andhrauniversity.edu.in/" target="_blank"><i id="f2"class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="https://www.andhrauniversity.edu.in/" target="_blank"><i id="f3"class="fa fa-google" aria-hidden="true"></i></a>
            
            </div>
        </div>
    </section>
    <section class="center" id="img">
        <img src="sectionimg.png" alt="">
    </section>
    <section class="center" id="timing">
        
    <p><b>Office Timings </b>: Mon-Sat : 10:00 AM to 5:00 PM</p>
    <p><b>Phone</b>:0891 2844000 </p>
    </section>
    <div class="nav">
        <ul>
        <li class="li"><a href="home.php">Home</a></li>
        <li class="li"><a href="course.html">Courses</a></li>
        <li class="li"><a href="faculty.html" target="_blank">Faculty</a></li>
        <li class="li"><a href="register.html" target="_blank">Register</a></li>
        <li class="li"><a href="contact.html" target="_blank">Contact Us</a></li>
        <li class="li"><a href="#" >Login</a>
        <ul>
        <li><a href="adminlogin.php" target="_blank">Admin</a>
        <li><a href="studentlogin.php" target="_blank">Student</a>
        </ul>
        </li>
        <li class="li log"><a href="logout.php">Logout</a>
        </ul>
        </div>
        <section class="mainsection background">
            <div class="main center">
                <h2>About Us</h2>
                <p>Established in 2010, Andhra University College of Engineering for Women is a constituent college of Andhra University. The college was established under the self-finance category. Andhra University College of Engineering for Women is approved by the All India Council for Technical Education (AICTE). The college has been accredited by NAAC with a grade of ‘A’ and awarded 3.6 on a four-point scale. Andhra University College of Engineering for Women offers B.Tech programme in the following specialisations: electrical and electronics engineering, electronics & communication engineering, mechanical engineering, civil engineering and computer science & systems engineering. Admissions to B.Tech programmes at the college are offered on the basis of performance in AP EAMCET. The total faculty strength at Andhra University College of Engineering for Women is 20. Andhra University College of Engineering for Women is equipped with modern infrastructure such as modern classrooms, laboratories etc.</p>
            </div>
            <div class="mainnext">
            <div class="left center">
                <img id="vice" src="vice.jpg" alt="">
                <h4>Prof. P.V.G.D. Prasad Reddy</h4>
                <h4>Vice Chancellor</h4>
            </div>
            <div class="right center">
                <h3>VICE-CHANCELLER MESSAGE</h3>
It is a great privilege and honour to be a part of the mission to make Andhra University a name to reckon within the academic fraternity by giving a strong impetus to creating an environment of knowledge, application and holistically inspiring youth to become leaders of tomorrow. I believe that the rigours of the contemporary world will require knowledgeable professionals who could withstand the dynamics of the fast-changing world.
            </div>
            </div>
        </section>
        <section id="news">
            <div class="newscont center">
            <h2>NEWS AND EVENTS</h2>
            <marquee class="news" behavior="scroll" direction="up" scrollamount="6">
                <p class="center">30-03-2022::Teachers Felicitation</p>
                <p class="center"> 08-04-2022::CSE Department Fest Is Being Held At KALPANA CHAWLA BLOCK</p>
                <p class="center"> 19-05-2022::3rd year B-Tech Semester Examinations </p>
                <p class="center"> 28-06-2022::MECH Department Fest Is Being Held At KALPANA CHAWLA BLOCK</p>
            </marquee>
            </div>
        </section>
        <div class="map">

            <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3800.397191740555!2d83.32223291448899!3d17.725914597619667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a39434300000001%3A0xf944a3f54bf97a30!2sAndhra%20University!5e0!3m2!1sen!2sin!4v1649502867098!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <footer>
            <div class="center">
                Copyright &copy; 2022 Andhra University College Of Engineering For Womens. All rights reserverd
            </div>
        </footer>
</body>

</html>