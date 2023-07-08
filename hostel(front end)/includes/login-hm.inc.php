<?php
if (isset($_POST['login-submit'])) {

  require 'config.inc.php';
  $username = $_POST['username'];
  $password = $_POST['pwd'];

$sql = "SELECT * FROM hostel_manager WHERE Username='$username' AND Pwd='$password' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
  $row = mysqli_fetch_assoc($result);
  $_SESSION['hostel_man_id'] = $row['Hostel_man_id'];
        $_SESSION['fname'] = $row['Fname'];
        $_SESSION['lname'] = $row['Lname'];
        $_SESSION['mob_no'] = $row['Mob_no'];
        $_SESSION['username'] = $row['Username'];
        $_SESSION['hostel_id'] = $row['Hostel_id'];
        $_SESSION['email'] = $row['Email'];
        $_SESSION['isadmin'] = $row['Isadmin'];
        $_SESSION['PSWD'] = $row['Pwd'];

    // header("location: index.php?message=success");
    header("Location: ../admin/admin_home.php?login=success");
    echo "connected";
    exit();
} 
else{
  header("Location: ../login-hostel_manager.php?error=nouser");
  exit();
}
mysqli_close($conn);
}
?>