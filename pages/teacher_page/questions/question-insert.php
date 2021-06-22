<?php
require_once(FUNCTION_DIR . 'preview_function.php');

$test_id = isset($_GET['test']) ? $_GET['test'] : '';
$teacher_id = isset($_GET['teacher']) ? $_GET['teacher'] : '';
$question_id = isset($_POST['question']) ? $_POST['question'] : '';
$answer_id = isset($_POST['answer']) ? $_POST['answer'] : '';
$group_id = isset($_POST['group']) ? $_POST['group'] : '';
$answer_mode = isset($_POST['answer_mode']) ? $_POST['answer_mode'] : '';
$questionfile = isset($_POST['questionfile']) ? $_POST['questionfile'] : '';
$answerfile = isset($_POST['answerfile']) ? $_POST['answerfile'] : '';
$is_correct = isset($_POST['answer-is-correct']) ? $_POST['answer-is-correct'] : ''; // მართებულობა მასივის სახით

if ($answer_mode == 3) {
  for ($i=0; $i < count($question_id); $i++) {

  $sql = "INSERT INTO questions (head_line, test_id, answer_mode)
  VALUES ('$question_id[$i]', '$test_id', '$answer_mode')";
  if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  $question_last_id = mysqli_insert_id($conn);

  $sql = "INSERT INTO answers (body_text, question_id, is_correct)
  VALUES (' ', '$question_last_id', '2')";
  if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);

  exit(header('location:../../../index.php?page=question-preview-insert&test=' . $test_id . "&teacher=" . $teacher_id));
  }
}

// კითხვის და მისი ფოტოს ჩასმა

for ($i=0; $i < count($question_id); $i++) { 
  $sql = "INSERT INTO questions (head_line, test_id, answer_mode)
  VALUES ('$question_id[$i]', '$test_id', '$answer_mode')";

  if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  $question_last_id = mysqli_insert_id($conn);
  //$question_last_id = '';

  $questionfile = fileUpload (
    $conn, 
    $fileRef = $_FILES["questionfile"], 
    $field_index = $i, 
    $item_last_id = $question_last_id, 
    $item_type_id = 1
  );
}


// პასუხების და მათი ფოტოების ჩასმა

for ($i=0; $i < count($answer_id); $i++) { 
  $sql = "INSERT INTO answers (body_text, question_id, is_correct)
  VALUES ('$answer_id[$i]', '$question_last_id', '$is_correct[$i]')";

  if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  $answer_last_id = mysqli_insert_id($conn);

  //$answer_last_id = '';

  $answerfile = fileUpload (
    $conn, 
    $fileRef = $_FILES["answerfile"], 
    $field_index = $i, 
    $item_last_id = $answer_last_id, 
    $item_type_id = 2
  );
}




header('location:' . BASE_URL . '?mode=view&page=question_preview_insert&test=' . $test_id . "&teacher=" . $teacher_id);
mysqli_close($conn);
?>

