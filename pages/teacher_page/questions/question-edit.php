<?php
require_once(FUNCTION_DIR . 'preview_function.php');

$question_file = isset($_FILES['question_file']) ? $_FILES['question_file'] : '';
$answer_file = isset($_FILES['answer_file']) ? $_FILES['answer_file'] : '';


$question = isset($_POST['question']) ? $_POST['question'] : '';
$question_id = isset($_POST['question_id']) ? $_POST['question_id'] : 0; // array

$answer = isset($_POST['answer']) ? $_POST['answer'] : '';
$answer_id = isset($_POST['answer_id']) ? $_POST['answer_id'] : '';
$answer_id_for_file = isset($_POST['answer_id_for_file']) ? $_POST['answer_id_for_file'] : 0; // array

$is_correct = isset($_POST['is_correct']) ? $_POST['is_correct'] : '';

// კითხვა

if($question_file) { 
  fileUploadOnEdit (
    $conn, 
    $file_refs = $question_file, 
    $item_ids = $question_id,
    $item_type_id = 1
  );
}
// პასუხი 

//var_dump($answer_id_for_file);
//echo count($answer_file['name']) . '<br>';
//echo count($answer_file['name']) . '<br>';

//foreach ($answer_file['name'] as $key => $value) {
/* foreach ($answer_id_for_file as $key => $value) {
  echo 'key: ' . $key . ' - Value: ' . $value . '<br>';
} */

if($answer_file) { 
  fileUploadOnEdit (
    $conn, 
    $file_refs = $answer_file, 
    $item_ids = $answer_id_for_file,
    $item_type_id = 2
  );
}


for ($i=0; $i < count($question); $i++) { 
  $question_val = $question[$i];
  $question_id_val = $question_id[$i];
  $sql = "UPDATE questions SET head_line='$question_val' WHERE question_id=$question_id_val";
  if (!mysqli_query($conn, $sql)) { echo "Error updating record: " . mysqli_error($conn); }
  
  for ($j=0; $j < count($answer); $j++) { 
    $answer_val = $answer[$j];
    $answer_id_val = $answer_id[$j];
    $is_correct_val = $is_correct[$j];
    //var_dump($is_correct);
    echo $is_correct_val;

    $sql = "UPDATE answers SET body_text='$answer_val', is_correct='$is_correct_val' WHERE answer_id=$answer_id_val";
    if (!mysqli_query($conn, $sql)) { echo "Error updating record: " . mysqli_error($conn); }
  }
}





//while($row = mysqli_fetch_assoc($questions)) : // ტესტი
  

/*     $sql = "UPDATE questions SET head_line='$qHeadline' WHERE question_id=$qId";

    if (!mysqli_query($conn, $sql)) {
      echo "Error updating record: " . mysqli_error($conn);
    } */
    /*if ($questionFile) {
    $sql = "INSERT INTO photos_test (file_name, item_id, item_type_id)
         VALUES ('$questionFile', '$question_id', '1')";
         if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }*/

  /* 
  ); */

  //echo $fileRef;
  // დასრულდა კითხვა
/* 
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
     if ($answerFileName) {
    $sql = "INSERT INTO photos_test (file_name, item_id, item_type_id)
         VALUES ('$answerFileName', '$answer_id', '2')";
         if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  endwhile; // დასრულდა პასუხი
 */
    

//endwhile; // დასრულდა ტესტი

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
//header('location:' . BASE_URL . '?mode=view&page=question_preview_insert&test=' . $test_id . "&teacher=" . $teacher_id);
mysqli_close($conn);

?>