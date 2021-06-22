<?php 

require_once('../../../data_management/connect/connect.php');
require_once('../../../data_management/function/test_function.php');

$test_id = isset($_GET['test']) ? $_GET['test'] : '' ;
$student_id = isset($_GET['student']) ? $_GET['student'] : '';
$studentData = getStudentList($conn,$student_id); //მასივი სტუდენტის მონაცემები (studentShow)
$student_show_id = $studentData['student_show_id'];
$first_name = $studentData['first_name'];
$last_name = $studentData['last_name'];
$photo = $studentData['photo'];

$question_data = getQuestionData($conn, $test_id);

$testData = getTestData($conn, $test_id);
$subject_id = $testData['subject_id'];
$group_id = $testData['group_id'];

$subject_title = getSubjectTitle($conn, $subject_id);
$groupNumber = getGroupNumber($conn, $group_id);
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>style.css">
   </head>
   <body class="backgroundcolor">
      <header class="headergio">
         <div class="headerflexgio">
              <div class="profileflexgio">
                  <div class="profileimgwrapgio">
                      <img src="../img/person.jpg" alt="profile" class="profilegio">
                  </div>
                  <div class="idwrapgio">
                      <p><?php echo $first_name . ' ' . $last_name . ' ' . $student_show_id?></p>
                  </div>
              </div>
              <div class="exitwrapgio">
                  <p>დრო : 60:00</p>
              </div>
         </div>
      </header>
      <main>
         <article>
            <div class="formwrapgio">
               <form class="formgio" action="insert-test.php?test=<?php echo $test_id ."&student=" . $student_id;  ?>" method="post">
                   <?php 
                      $x = 0;
                      while($row = mysqli_fetch_assoc($question_data)) :
                        $head_line = $row['head_line']; 
                        $question_id = $row['question_id'];
                      $getAnswerMode = getAnswerMode($conn, $question_id);
                      $answer_mode = $getAnswerMode['answer_mode'];

        if ($answer_mode == 1) :?>

                     <div class="textwrapgio">
                           <p class="numbergio"><?php echo $x+1 ?></p>
                           <input type="hidden" name="question[]" value="<?php echo $question_id; ?>">
                            <input type="hidden" name="answer_mode[]" value="1">
                           <p class="question"><?php echo $head_line;  ?></p>
                     </div>
                     <div class="answerswrapgio">
                           <?php 
                              $aData = getAnswersData($conn, $question_id);
                             
                              while ($row = mysqli_fetch_assoc($aData)) :

                                $body_text = $row['body_text'];
                                $answer_id = $row['answer_id'];
                                ?>
                        <div class="answergio">
                            <input type="radio" name="q_<?php echo $x; ?>_answer[]">
                            <input type="hidden" name="q_<?php echo $x; ?>_answer_id[]" value="<?php echo $answer_id ?>">
                                    <label><?php echo $body_text; ?></label>
                        </div>
                         <?php endwhile; $x++; ?>
                     </div>

        <?php elseif($answer_mode == 2): ?>

                     <div class="textwrapgio">
                           <p class="numbergio"><?php echo $x+1 ?></p>
                           <input type="hidden" name="question[]" value="<?php echo $question_id; ?>">
                            <input type="hidden" name="answer_mode[]" value="2">
                           <p class="question"><?php echo $head_line;  ?></p>
                     </div>
                     <div class="answerswrapgio">
                           <?php 
                              $aData = getAnswersData($conn, $question_id);
                             
                              while ($row = mysqli_fetch_assoc($aData)) :

                                $body_text = $row['body_text'];
                                $answer_id = $row['answer_id'];
                                ?>
                        <div class="answergio">
                            <input type="checkbox" name="q_<?php echo $x; ?>_answer[]" >
                            <input type="hidden" name="q_<?php echo $x; ?>_answer_id[]" value="<?php echo $answer_id ?>">
                                    <label><?php echo $body_text; ?></label>
                        </div>
                         <?php endwhile; $x++; ?>
                     </div>

            <?php else:?>
                           <div class="textwrapgio">
                           <p class="numbergio"><?php echo $x+1 ?></p>
                           <input type="hidden" name="question[]" value="<?php echo $question_id; ?>">
                            <input type="hidden" name="answer_mode[]" value="3">
                           <p class="question"><?php echo $head_line;  ?></p>
                     </div>
                     <div class="answerswrapgio">
                           <?php 
                              $aData = getAnswersData($conn, $question_id);
                             
                              while ($row = mysqli_fetch_assoc($aData)) :

                                $body_text = $row['body_text'];
                                $answer_id = $row['answer_id'];
                                ?>
                        <div class="answergio">
                            <textarea name="q_<?php echo $x; ?>_answer[]"  ></textarea>
                            <input type="hidden" name="q_<?php echo $x; ?>_answer_id[]" value="<?php echo $answer_id ?>">

                        </div>
                         <?php endwhile; $x++; ?>
                     </div>



                      <?php endif?>
                        <?php endwhile?>

            </div>
             <button type="submit" class="subbtngio">გამოცდის დასრულება</button>
               </form>
         </article>
      </main>
   </body>
</html>