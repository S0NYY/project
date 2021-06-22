<?php
$teacher_id = isset($_GET['teacher']) ? $_GET['teacher'] : '';
$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$number = isset($_POST['number']) ? $_POST['number'] : '';
$addres = isset($_POST['addres']) ? $_POST['addres'] : '';


$sql="UPDATE teachers SET first_name='$first_name', last_name='$last_name', mail='$mail', number='$number', addres='$addres'
      WHERE teacher_id = $teacher_id";
      if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
header('location:' . BASE_URL . '?mode=view&page=teacher_profile_preview&teacher=' . $teacher_id);
mysqli_close($conn);
?>
