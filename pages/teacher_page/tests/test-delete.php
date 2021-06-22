<?php
require_once('../../../data_management/connect/connect.php');
require_once('../../../data_management/function/preview_function.php');


$test_id = isset($_GET['test']) ? $_GET['test'] : '';
$teacher_id = isset($_GET['teacher']) ? $_GET['teacher'] : '';

$questions = getQuestionIdsBytestId ($conn, $test_id);

while ($row = mysqli_fetch_assoc($questions)) {
  $question_id = $row['question_id'];

  $sql = "DELETE FROM answers WHERE question_id=$question_id";
    
   if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }
}
  $sql = "DELETE FROM questions WHERE test_id=$test_id";
    
   if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }


  $sql = "DELETE FROM tests WHERE test_id=$test_id";
    
   if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }


header('location:../../../index.php?page=test-list&teacher=' . $teacher_id);
?>
