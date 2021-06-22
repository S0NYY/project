<?php
require_once(FUNCTION_DIR . 'preview_function.php');

$test_id = isset($_GET['test']) ? $_GET['test'] : 0;
$teacher_id = isset($_POST['teacher']) ? $_POST['teacher'] : '';
$question_id = isset($_GET['question']) ? $_GET['question'] : 0;
$answer_id = isset($_GET['answer']) ? $_GET['answer'] : '';
$questionFileName = isset($_POST['questionfile']) ? $_POST['questionfile'] : '';
$answerFileName = isset($_POST['answerfile']) ? $_POST['answerfile'] : '';

if(!$test_id && $question_id) {
  $questions = getQuestionById($conn, $question_id); // კითხვების მონაცემების წამოღება
  $test_id = getTestIdByQuestionId($conn, $question_id);
} else {
  $questions = getQuestionsByTestId($conn, $test_id); // კითხვების მონაცემების წამოღება
}

while($row = mysqli_fetch_assoc($questions)) : // ტესტი
  
  // კითხვა

  $qId = $row['question_id'];
  $qHeadline = isset($_POST['q_' . $qId]) ? $_POST['q_' . $qId] : '';
    $sql = "UPDATE questions SET head_line='$qHeadline' WHERE question_id=$qId";

    if (!mysqli_query($conn, $sql)) {
      echo "Error updating record: " . mysqli_error($conn);
    }
    $question_last_id = mysqli_insert_id($conn);
    /*if ($questionFileName) {
    $sql = "INSERT INTO photos_test (file_name, item_id, item_type_id)
         VALUES ('$questionFileName', '$question_id', '1')";
         if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }*/

  /*$questionfile = fileUpload (
    $conn, 
    $fileRef = $_FILES["questionfile"], 
    $field_index = $question_id, 
    $item_last_id = $question_last_id, 
    $item_type_id = 1
  );
  echo $fileRef;*/
  // დასრულდა კითხვა

  // პასუხი 

  $answersByQId = getAnswersData($conn, $qId);
  while($aData = mysqli_fetch_assoc($answersByQId)) :
    $aId = $aData['answer_id'];
    $aBodyText = isset($_POST['a_' . $aId]) ? $_POST['a_' . $aId] : ''; // პასუხები მასივის სახით
    $is_correct = isset($_POST['c_' . $aId]) ? $_POST['c_' . $aId] : ''; // მართებულობა მასივის სახით
  
    $sql = "UPDATE answers SET body_text='$aBodyText', is_correct='$is_correct' WHERE answer_id=$aId";

    if (!mysqli_query($conn, $sql)) {
      echo "Error updating record: " . mysqli_error($conn);
    }
     /*if ($answerFileName) {
    $sql = "INSERT INTO photos_test (file_name, item_id, item_type_id)
         VALUES ('$answerFileName', '$answer_id', '2')";
         if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }*/
    endwhile; // დასრულდა პასუხი

    

endwhile; // დასრულდა ტესტი

//კითხვის ფოტოს დამატება ჩასწორების დროს 

/*for ($i=0; $i < $question_id; $i++) { 
  $sql = "INSERT INTO photos_test(file_name, item_id, item_type_id)
  VALUES ('$questionfile[$i]', '$question_id', '$item_type_id')";

  if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);

  $questionfile = fileUpload (
    $conn, 
    $fileRef = $_FILES["questionfile"], 
    $field_index = $i, 
    $item_last_id = $question_id, 
    $item_type_id = 1
  );
}*/
header('location:' . BASE_URL . '?mode=view&page=question_preview_insert&test=' . $test_id . "&teacher=" . $teacher_id);
mysqli_close($conn);

?>