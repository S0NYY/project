<?php
require_once(FUNCTION_DIR . 'preview_function.php');

$teacher_id = isset($_GET['teacher']) ? $_GET['teacher'] : '';
$test_id = isset($_GET['test']) ? $_GET['test'] : 0;
$question_id = isset($_GET['question']) ? $_GET['question'] : 0;

if(!$test_id && $question_id) {
  $questions = getQuestionById($conn, $question_id); // კითხვების მონაცემების წამოღება
  $test_id = getTestIdByQuestionId($conn, $question_id);
  $queryString = 'question=' . $question_id; 
} else {
  $questions = getQuestionsByTestId($conn, $test_id); // კითხვების მონაცემების წამოღება
  $queryString = '?test=' . $test_id; 
}
$teacher_id = isset($_GET['teacher']) ? $_GET['teacher'] : '';
$testData = getTestData($conn, $test_id);
$default_gId = $testData['group_id'];
$default_subjectId = $testData['subject_id'];
$teacher_id = $testData['teacher_id'];
$gData = getGroupData($conn, $teacher_id );
?>
<div class="col-md-12">
  <div class="card">
      <div class="card-header"><h3>კითხვის ჩასწორება</h3></div>
      <div class="card-body">
          <form class="forms-sample" action="index.php?page=question_edit&<?php echo $queryString ?>"  method="post" enctype="multipart/form-data">
          <input type="hidden" name="teacher" value="<?php echo $teacher_id ?>">
          <?php
            while($qData = mysqli_fetch_assoc($questions)) : // ტესტი
            $question_id = $qData['question_id'];
          ?>
              <div class="form-group">
                <label for="exampleInputName1">კითხვა</label>
                <textarea type="text" class="form-control" id="exampleInputName1"  name="question[]"><?php echo $qData['head_line']; ?></textarea>
                <input type="hidden" name="question_id[]" value="<?php echo $question_id ?>">
                <?php 
                      $getQuestionItemId =getQuestionItemId($conn, $question_id);
                      $question_item = $getQuestionItemId['item_id'];
                    if ($question_item) :
                      $getQuestionPhotos = getQuestionPhotos($conn, $question_item);
                      $questionImage = $getQuestionPhotos['file_name'];
                ?>
                  <img src="img/photos_test/<?php echo $questionImage?>"  width="50">
                  <a href="<?php urlGenerator(['mode' => 'model', 'page' => 'question_photo_delete', 'question' => $question_id, 'teacher' => $teacher_id])?>" class="ik ik-trash-2 f-16 text-red"></a>
                <?php
                    else:
                ?>
                    <input type="file" name="question_file[]" >
                <?php 
                    endif;
                ?>
              </div>
              <div class="row">
                  <div class="col-md-9">
                  <?php 
                      $answersByQId = getAnswersData($conn, $question_id);
                    while($row = mysqli_fetch_assoc($answersByQId)) :
                      $answer_id = $row['answer_id'];
                      $is_correct = $row['is_correct'];
                  ?>
              <div class="form-group">
              <textarea type="text" class="form-control" id="exampleInputEmail3"  name="answer[]"><?php echo $row['body_text']; ?></textarea>
              <input type="hidden" name="answer_id[]" value="<?php echo $answer_id; ?>">
              <?php   
                      $getAnswerItemId = getAnswerItemId($conn, $answer_id);
                      $answer_item = $getAnswerItemId['item_id'];
                      if ($answer_item) :
                        $getAnswersPhotos = getAnswersPhotos($conn, $answer_item);
                        $answerImage = $getAnswersPhotos['file_name'];
                        ?>
                      <img src="img/photos_test/<?php echo $answerImage?>"  width="50">
                      <a href="<?php urlGenerator(['mode' => 'model', 'page' => 'question_photo_delete', 'question' => $question_id, 'answer' => $answer_id, 'teacher' => $teacher_id])?>" class="ik ik-trash-2 f-16 text-red"></a>
                      <?php 
                      else:
                        ?>
                      <input type="file" name="answer_file[]">
                      <input type="hidden" name="answer_id_for_file[]" value="<?php echo $answer_id; ?>">
                  <?php 
                      endif;
                  ?>
              <div class="form-group">
                    <select class="form-control" id="exampleSelectGender" name="is_correct[]">
                    <option value="">-----------------</option>
                  <?php
                    foreach($aPreferences as $keys => $value) :
                    $selected = $is_correct == $value ? ' selected="selected"' : '';
                  ?>
                    <option value="<?php echo $value; ?>"<?php echo $selected; ?>><?php echo $keys; ?></option>
                  <?php
                    endforeach;
                  ?>
                  </select>
              </div>
              <?php // პასუხის დასრულება
                endwhile; // ტესტის დასრულება
                endwhile;
              ?>
              </div>
          </div>
              <button type="submit" class="btn btn-primary mr-2">ჩასწორება</button>
          </form>
      </div>
  </div>
</div>

   
<?php 
mysqli_close($conn); ?>
