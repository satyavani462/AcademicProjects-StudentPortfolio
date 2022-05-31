<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="homelogo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="stureg.css">
    <title>Student Regsitration</title>
</head>
<body>
    <a href="home.php" target="_blank"><i class="fa fa-home" id="home" aria-hidden="true" style="font-size:40px;color:white" ></i></a>
    <div class="container ">
        <p>Student Regsitration</p>
    <form action="">
        <div class="smallcont">
        <label for="name">Username</label>
        <input type="text" id="name" name="name">
        <label for="id">ID</label>
        <input type="number" id="id" name="id">
        <label for="add">Address</label>
        <textarea name="add" id="add" cols="5" rows="4"></textarea>
        <label for="contact">Contact No </label>
        <input type="number" name="cno" id="contact">
        <label for="regdate">Regsitration Date</label>
        <input type="text" name="regdate" id="regdate">
        <input type="submit" value="SUBMIT">
        </div>
    </form>
    </div>
</body>
</html>