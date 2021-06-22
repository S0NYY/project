<?php 
$course_id = isset($_GET['course']) ? $_GET['course'] : '';

$sql = "DELETE FROM course_group_rel WHERE course_id = $course_id";
if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }
  $sql = "DELETE FROM course_subject_rel WHERE course_id = $course_id";
if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }
$sql = "DELETE FROM courses WHERE course_id = $course_id";
if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }

  header('location:' . BASE_URL . '?mode=view&page=courses');

?>