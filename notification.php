<?php
$t=false;
$server="localhost";;
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password);
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
    color: white;
}
html{
    scroll-behavior: smooth;
}
.center{
    text-align: center;
    
}
#home{
    position: absolute;
    right: 40px;
    top: 4px;
}
.nav::after{
    content: "";
    position: absolute;
    background:url('facb.jpg') no-repeat center center/cover;
    background-blend-mode: darken;
    top:0;
    left:0;
    width: 100%;
    height: 120%;
    z-index: -1;
    opacity:0.88;
}
.nav{
    background-color: black;
}
input[type=text]
{
    width: 86%;
    margin-left: 20px;
    margin-top: 20px;
    margin-bottom: 20px;
    color: black;
    padding: 2px;
    font-size: 17px;
}
button{
    margin-left: 12px;
    margin-right: 10px;
    padding: 2px 53px;
    background-color: green;
    font-size: 16px;
}
button:hover{
    background-color: rgb(15, 156, 15);
}
.mainbox{
    background: url(/img/adminlogin.webp) no-repeat;
    margin:40px auto;
    width: 60%;
    padding: 12px 10px;
}
#notes{
   text-align: center;
    font-size: 18px;
}
.card-body{
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 23px;
    background-color: #234A7C;
    padding:8px 12px;
}
.btnclass{
    position: absolute;
    right:340px ;
}
    </style>
    <title>Notifications</title>
</head>
<body>
    <?php
    include 'add.php'
    ?>
    <div class="mainbox">
        <!-- <h1 class="center">Your notifications</h1> -->
        <div id="notes"></div>
    </div>
</body>

<script>
    showNotes();
let addBtn = document.getElementById("addBtn");
addBtn.addEventListener("click", function(e) {
  let addTxt = document.getElementById("addTxt");
  let notes = localStorage.getItem("notes");
  if (notes == null) {
    notesObj = [];
  } else {
    notesObj = JSON.parse(notes);
  }
  notesObj.push(addTxt.value);
  localStorage.setItem("notes", JSON.stringify(notesObj));
  addTxt.value = "";
  showNotes();
});
function showNotes() {
  let notes = localStorage.getItem("notes");
  if (notes == null) {
    notesObj = [];
  } else {
    notesObj = JSON.parse(notes);
  }
  let html = "";
  notesObj.forEach(function(element, index) {
    html += `<div class="noteCard">
                    <div class="card-body">
                        <p class="card-text"> ${element}</p>
                        <div class="btnclass">
                        <button id="${index}" onclick="deleteNote(this.id)" class="nbtn">Delete</button>
                        </div>
                    </div>
            </div>`;
  });
  let notesElm = document.getElementById("notes");
  if (notesObj.length != 0) {
    notesElm.innerHTML = html;
  } else {
    notesElm.innerHTML = `Nothing to show! Use "Add" section above to add notifications....`;
  }
}
function deleteNote(index) {
    let notes = localStorage.getItem("notes");
    if (notes == null) {
      notesObj = [];
    } else {
      notesObj = JSON.parse(notes);
    }
    notesObj.splice(index, 1);
    localStorage.setItem("notes", JSON.stringify(notesObj));
    showNotes();
  }
  

</script>

</html>