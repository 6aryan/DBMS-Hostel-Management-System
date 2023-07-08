<?php
require '../includes/config.inc.php';

// Get the ID of the row to delete
$id = $_GET['id'];
echo $id;
// Create the DELETE statement
$sql = "DELETE FROM student WHERE Student_id='$id'";
$sql1= "DELETE FROM application WHERE Student_id='$id'";
$conn->query($sql);
  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    $previous_page = $_SERVER['HTTP_REFERER'];
  header("Location: " . $previous_page);
  exit;
  } else {
    echo "Error deleting record: " . $conn->error;
  }

  $conn->close();

?>