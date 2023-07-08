<?php
require '../includes/config.inc.php';


$student_id = $_GET['id'];
$hostel = $_GET['hostel_id'];
$room_id = $_GET['Room_id'];
echo $student_id;
echo $room_id ;
// Create the INSERT statement
$sql = "UPDATE  student set Room_id= '$room_id' , Hostel_id='$hostel' where Student_id='$student_id'";

// Execute the query
if (mysqli_query($conn, $sql)) {
    // Return a success message
    echo json_encode(array("success" => true));
    header("Location: students.php");
} else {
    // Return an error message
    echo json_encode(array("success" => false));
}

// Close the database connection
mysqli_close($conn);

?>
