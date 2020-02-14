<?php

    session_start();
    //$diaryContent="";

    if (array_key_exists("id", $_COOKIE) && $_COOKIE ['id']) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }

    if (array_key_exists("id", $_SESSION)) {
              
      include("connection.php");
      
      $query = "SELECT diary FROM `users` WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
      $row = mysqli_fetch_array(mysqli_query($link, $query));
 
      $diaryContent = $row['diary'];

      $query = "SELECT name FROM `users` WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
      $row = mysqli_fetch_array(mysqli_query($link, $query));
      $name = $row['name'];

      $query = "SELECT dob FROM `users` WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
      $row = mysqli_fetch_array(mysqli_query($link, $query));
      $dob = @$row['dob'];

      $query = "SELECT age FROM `users` WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
      $row = mysqli_fetch_array(mysqli_query($link, $query));
      $age = @$row['age'];

      $query = "SELECT cno FROM `users` WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
      $row = mysqli_fetch_array(mysqli_query($link, $query));
      $contact = @$row['cno'];
      
    } else {
        
        header("Location: index.php");
        
    }

	include("header.php");

?>
<nav class="navbar navbar-light bg-faded navbar-fixed-top">
  

  <a class="navbar-brand" href="#">Secret Diary</a>

    <div class="pull-xs-right">
      <a href ='index.php?logout=1'>
        <button class="btn btn-success-outline" type="submit">Logout</button></a>
    </div>

</nav>



    <div class="container-fluid" id="containerLoggedInPage">

        <textarea id="name" class="form-control" >Name:   <?php echo $name; ?></textarea>
        <textarea id="dob" class="form-control" >DOB:   <?php echo $dob; ?></textarea>
        <textarea id="age" class="form-control" >Age:   <?php echo $age; ?></textarea>
        <textarea id="cno" class="form-control" >Contact Number:   <?php echo $contact; ?></textarea>
        <textarea id="diary" class="form-control" rows="15"><?php echo $diaryContent; ?></textarea>

    </div>
<?php
    
    include("footer.php");
?>