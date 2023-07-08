<?php

if (isset($_POST['hm_signup_submit'])) {

  require 'config.inc.php';

  $username= $_POST['hm_uname'];
  $fname = $_POST['hm_fname'];
  $lname = $_POST['hm_lname'];
  $mobile = $_POST['hm_mobile'];
  $hostel_name = $_POST['hostel_name'];
  $email = $_POST['Email'];
  $password = $_POST['pass'];
  $cnfpassword = $_POST['confpass'];
  $hashedPwd = password_hash($password, PASSWORD_DEFAULT);


  $sql = "SELECT *FROM Hostel WHERE Hostel_name = '$hostel_name'";
  $result = mysqli_query($conn, $sql);
  if($row = mysqli_fetch_assoc($result))
  {
    $HostelID = $row['Hostel_id'];
    $sql1 = "INSERT INTO Hostel_Manager(Username, Fname, Lname, Mob_no, Hostel_id,Pwd, Isadmin) VALUES ('$username', '$fname', '$lname', '$mobile', '$HostelID', '$hashedPwd', '0')";
    //  mysqli_stmt_bind_param($stmt, "ssssssss",'$username', $fname, $lname, $mobile, $HostelID, $email, $hashedPwd, $zz);
    //  mysqli_stmt_execute($stmt);
    $result = mysqli_query($conn, $sql1);
    if($result)
    {
      header("Location: ../admin/create_hm.php?added=success");
    }
    else {
      header("Location: ../admin/create_hm.php?added=failure");
    }
  }
  else {
    header("Location: ../admin/create_hm.php");
    exit();
  }
}