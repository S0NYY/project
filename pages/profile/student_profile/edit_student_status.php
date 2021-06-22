<?php
require_once(FUNCTION_DIR . 'administrator_function.php');
$student_id = isset($_GET['student']) ? $_GET['student'] : '';
$status_id = isset($_POST['status']) ? $_POST['status'] : '';

$sql="UPDATE students SET status_id='$status_id' 
      WHERE student_id = $student_id";
      if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
header('location:' . BASE_URL . '?mode=view&page=student_profile_preview&student=' . $student_id);
mysqli_close($conn);
?>
