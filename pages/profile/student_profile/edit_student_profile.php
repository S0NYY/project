<?php
$student_id = isset($_GET['student']) ? $_GET['student'] : '';
$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$number = isset($_POST['number']) ? $_POST['number'] : '';
$addres = isset($_POST['addres']) ? $_POST['addres'] : '';


$sql="UPDATE students SET first_name='$first_name', last_name='$last_name', mail='$mail', number='$number', addres='$addres'
      WHERE student_id = $student_id";
      if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
header('location:' . BASE_URL . '?mode=view&page=student_profile_preview&student=' . $student_id);
mysqli_close($conn);
?>
