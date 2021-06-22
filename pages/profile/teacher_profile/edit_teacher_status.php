<?php
require_once(FUNCTION_DIR . 'administrator_function.php'); ;  
$teacher_id = isset($_GET['teacher']) ? $_GET['teacher'] : '';
$status_id = isset($_POST['status']) ? $_POST['status'] : '';


$sql="UPDATE teachers SET status_id='$status_id' 
      WHERE teacher_id = $teacher_id";
      if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
