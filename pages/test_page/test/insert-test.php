<?php 
require_once('../../../data_management/connect/connect.php');
require_once('../../../data_management/function/test_function.php');
$test_id = isset($_GET['test']) ? $_GET['test'] : '' ;
$student_id = isset($_GET['student']) ? $_GET['student'] : '';
$question_id = isset($_POST['question']) ? $_POST['question'] : [] ; //array

for ($i=0; $i < count($question_id); $i++) { 

  $answer_mode = isset($_POST['answer_mode']) ? $_POST['answer_mode'] : [] ; //array

  $qId = $question_id[$i];
  
  $answer_id = isset($_POST['q_' . $i . '_answer']) ? $_POST['q_' . $i . '_answer'] : []; //array
  $answer_ids = isset($_POST['q_' . $i . '_answer_id']) ? $_POST['q_' . $i . '_answer_id'] : []; //array


  echo $answer_ids[0];


  for ($j=0; $j < count($answer_ids); $j++) { 
    $answer_id = $answer_ids[$j];
    $answer_title = isset($answer_id[$j]) ? $answer_id[$j] : '';
    
    if( $answer_title == 'on' || $answer_mode[$i] == 3 ) {
      if( $answer_mode[$i] == 3 ) {
        echo "<p>UPDATE " . 'field: ' . $answer_id . "</p>";
        $sql = "UPDATE answers SET body_text='$answer_title' WHERE answer_id=$answer_id";
        if (!mysqli_query($conn, $sql)) {echo "Error updating record: " . mysqli_error($conn);}

      } else {
        echo "<p>INSERT " . 'field: ' . $answer_id . "</p>";
      }
    insertResults($conn, $qId, $answer_id, $student_id, $test_id);
    }
  }
}
//header('location:result.php?test=' . $test_id . '&student=' . $student_id);

?>