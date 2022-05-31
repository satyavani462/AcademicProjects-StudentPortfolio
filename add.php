<?php
$t1=false;
if($t)
    {
    echo '<div class="nav">
    <h1 class="center">Notifications</h1>
    <a href="home.php" target="_blank"><i class="fa fa-home" id="home" aria-hidden="true" style="font-size:40px;color:white" ></i></a>
    </div>';
    }
    if(!$t){
        echo '<div class="nav">
    <h1 class="center">Notifications</h1>
    <a href="home.php" target="_blank"><i class="fa fa-home" id="home" aria-hidden="true" style="font-size:40px;color:white" ></i></a>
    <form action="">
    <input type="text" id="addTxt" placeholder="Use Add to add notifications.">
    <button id="addBtn">Add</button>
</form>
    </div>';
    }
    ?>