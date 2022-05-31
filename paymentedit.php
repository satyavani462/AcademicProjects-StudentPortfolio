<?php
$update=false;
$delete=false;
$server="localhost";
$username="root";
$password="";
$database="project2";
$con=mysqli_connect($server,$username,$password,$database);
if(!$con)
{
  die("connection failed due to ".mysqli_error());
}
if($_SERVER['REQUEST_METHOD']=="POST")
{
  if(isset($_POST['snoEdit'])){
  $sno=$_POST['snoEdit'];
  $status=$_POST['statusEdit'];
  $sql="UPDATE `fee` SET `status`='$status'  WHERE `fee`.`sno`='$sno' ";
  $result=mysqli_query($con,$sql);
  if($result)
  {
    $update=true;
  }
  else{
    echo "update failed due to ".mysqli_error();
  }
  }
  else if(isset($_POST['snoDel']))
  {
    $sno=$_POST['snoDel'];
    $sql="DELETE FROM `fee` WHERE `fee`.`sno` = '$sno'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
      $delete=true;
    }
    else{
      echo "deletion failed due to ".mysqli_error();
    }
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="homelogo.png" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <title>Fee Details</title>
      <style>
        *{
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    color: black;
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
    /* background-color: black; */
    /* background:url('facb.jpg') no-repeat center center/cover; */
    background-blend-mode: darken;
    top:0;
    left:0;
    width: 100%;
    height: 130%;
    z-index: -1;
    opacity:0.88;
}
#home{
    position: absolute;
    right: 40px;
    top: 4px;
}
.container {
            display: inline;
            width: 500px;
        }

        input[type=number] {
            margin-left: 340px;
            margin-top: 20px;
            width: 600px;
        }
        input[type=submit] {
            padding:2px 32px;
            border-radius:9px;
            background-color:green;
            color:white;
        }
.nav{
    width:100%;
    height:49px;
    position: sticky;
    top: 0;
    background-color:black;
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

    ul li ul li a{
        color: white;
    }
    ul li ul li{
    border-bottom:1px solid gray;
    }
    
    table{
        margin:20px;
    }
    .container{
      width:900px;
    }
    th,td{
        text-align:center;
    }
    .x{
        color:black;
    }
    .edit{
      background:#234A7C;
        margin-right:2px;
    }
    .delete{
      background:#234A7C;
        margin-left:2px;
    }
    #mytable_wrapper.dataTables_wrapper{
      margin-left:80px;
      margin-top:70px;
      width:1300px;
    }
  </style>
</head>

<body>
 

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">EDIT STUDENT DETAILS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="paymentedit.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="statusEdit">Payment Status</label>
              <input type="text" class="form-control" id="statusEdit" name="statusEdit" aria-describedby="emailHelp">
            </div>
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">DELETE STUDENT FEE DETAILS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="paymentedit.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoDel" id="snoDel">  
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">DELETE</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
if($update)
{
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success! </strong>Student Details Updated Successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true' class='x'>X</span>
    </button>
  </div>";
}
if($delete)
{
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success! </strong>Student Details Deleted Successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true' class='x' >X</span>
    </button>
  </div>";
}
?>
    <div class="nav">
        <ul>
            <li class="li"><a href="adminpage.html">Home</a></li>
            <li class="li"><a href="contact.html" target="_blank">Contact</a></li>
            <li class="li"><a href="notification.php" target="_blank">Notifications</a></li>
            <li class="li"><a href="studentsearch.php" target="_blank">Student Search</a></li>
            <li class="li"><a href="logout.php">Logout</a></li>
        </ul>
        <a href="home.php" target="_blank"><i class="fa fa-home" id="home" aria-hidden="true"
                style="font-size:40px;color:white"></i></a>
    </div>
    <!-- <div class="container">
        <form action="" method="post">
            <input class="center" type="number" name="id" placeholder="Enter ID" id="search">
            <input type="submit" name="search" placeholder="Search By ID" value="search for student details" >
        </form>
    </div> -->

  <div class="container my-4">


    <table class="table" id="mytable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope= "col">Username</th>
          <th scope="col">ID</th>
          <th scope="col">Purpose</th>
          <th scope="col">Scholar</th>
          <th scope="col">Join Year</th>
          <th scope="col">Semester</th>
          <th scope="col">TuitionFee</th>
          <th scope="col">ExamFee</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>


      <?php

      $sql="SELECT * FROM `fee`";
      $result=mysqli_query($con,$sql);
      $no=mysqli_num_rows($result);
      $sno=0;
      if($no>0)
      {
        while($row=mysqli_fetch_assoc($result))
        {
          $sno+=1;
          echo "<tr>
          <th scope='row'>". $sno . "</th>
          <td>". $row['username'] . "</td>
          <td class='id'>". $row['id'] . "</td>
          <td>". $row['purpose'] . "</td>
          <td>". $row['scholar'] . "</td>
          <td>". $row['joinyear'] . "</td>
          <td>". $row['semester'] . "</td>
          <td>". $row['tutfee'] . "</td>
          <td>". $row['exfee'] . "</td>
          <td>". $row['status'] . "</td>
          <td> <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button>  </td>
        </tr>";
        }
      }
      ?>

      </tbody>
    </table>
  </div>
  <hr>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
    <script>
    $(document).ready( function () {
    $('#mytable').DataTable();
    } );
  </script>
  <script>
    edits=document.getElementsByClassName('edit');
    Array.from(edits).forEach((element)=>{
      element.addEventListener('click',(e)=>{
        tr=e.target.parentNode.parentNode;
          sub1=tr.getElementsByTagName('td')[8].innerText;
          statusEdit.value=sub1;
          snoEdit.value=e.target.id;
          console.log(snoEdit.value);
          $('#editModal').modal('toggle');
      })
    })
  </script>
<script>
   deletes=document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element)=>{
      element.addEventListener('click',(e)=>{
         snoDel.value=e.target.id.substr(1);
         console.log(snoDel.value);
         $('#delModal').modal('toggle');
      })
      })
</script>
</body>

</html>