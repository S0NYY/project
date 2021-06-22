<?php 
require_once('../../connect/connect.php');
require_once('../../function/teacher_result_function.php');
require_once('../questions/presets.php');
$student_id = isset($_GET['student']) ? $_GET['student'] : '';
$test_id =  isset($_GET['test']) ? $_GET['test'] : '';

$questions = getQuestionsByTestId($conn, $test_id);

    while($row = mysqli_fetch_assoc($questions)) : 
    $question_id = $row['question_id'];
    ?>
  
      <h2 ><?php echo $row['head_line']; ?></h2>

    <?php 

      $answersByQId = getAnswersData($conn, $question_id);
      while($row = mysqli_fetch_assoc($answersByQId)) :
        $body_text = $row['body_text'];
        $is_correct = $row['is_correct'];
        $isCorrectText = $is_correct ? ' (' . array_search($is_correct, $aPreferences) . ')' : '';
        ?>
    
      <ul>
        <li><?php echo $body_text . $isCorrectText;?></li>
      </ul>

    <?php
      
      endwhile; 
        $getStudentAnswer = getStudentAnswer ($conn, $question_id);
        $answer_id = $getStudentAnswer['answer_id'];
        echo $answerId;

       /* $answerBodyText =answerBodyText($conn, $answerId);
        $aBodyText = $answerBodyText['bodyText'];
        echo $aBodyText;*/
    endwhile; 
    mysqli_close($conn);
    ?>