<?php 
$group_id = isset($_GET['group']) ? $_GET['group'] : '';


  $sql = "DELETE FROM group_teacher_rel WHERE group_id = $group_id";
if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }
  $sql = "DELETE FROM group_student_rel WHERE group_id = $group_id";
if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }
$sql = "DELETE FROM groups WHERE group_id = $group_id";
if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }
  header('location:../administrator_page/group_form.php')
  ?>