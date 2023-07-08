<?php

if (isset($_POST['hm_remove_submit'])) {

  require 'config.inc.php';

  $username = $_POST['hm_uname'];
  $hostel_name = $_POST['hostel_name'];
  $Adminpassword = $_POST['pass'];

  if (empty($username) || empty($hostel_name) || empty($Adminpassword)) 
  {
    header("Location: ../admin/create_hm.php?error=emptyfields");
    exit();
  }
  else {
      $sql = "DELETE FROM Hostel_Manager WHERE Username = '$username'";
      mysqli_query($conn, $sql);
      header("Location: ../admin/create_hm.php");
  }
}
else {
  header("Location: ../index.php");
  exit();
}
