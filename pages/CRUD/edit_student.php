<?php 
require_once("../../data_management/connect/connect.php");


$student_id = isset($_GET['student']) ? $_GET['student'] : '';
$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
$student_show_id = isset($_POST['student_show_id']) ? $_POST['student_show_id'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$group_id = isset($_POST['group']) ? $_POST['group'] : '';

$sql = "UPDATE group_student_rel SET group_id='$group_id' WHERE student_id=$student_id";

  if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }
 
  $sql = "UPDATE users_student SET username='$username', password='$password' WHERE student_id=$student_id";

  if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }
  $sql = "UPDATE students SET first_name='$first_name', last_name='$last_name', student_show_id = '$ID' WHERE student_id=$student_id";

  if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }
 header('location:../administrator_page/student_form.php');
  mysqli_close($conn);
?>