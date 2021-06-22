<?php 
$subject_id = isset($_GET['subject']) ? $_GET['subject'] : '';

$sql = "DELETE FROM course_subject_rel WHERE subject_id = $subject_id";
if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }

$sql = "DELETE FROM subjects WHERE subject_id = $subject_id";
if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }

  header('location:' . BASE_URL . '?mode=view&page=subjects');
 
  ?>