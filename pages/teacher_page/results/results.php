<?php 
require_once(FUNCTION_DIR . '/teacher_result_function.php');
require_once(REFS_DIR . 'presets.php');
$student_id = isset($_GET['student']) ? $_GET['student'] : '';
$test_id = isset($_GET['test']) ? $_GET['test'] : '';
?>
<div class="col-md-12">
     <div class="card">
      <div class="card-block">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>ტესტი</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
<?php 
                          $x=1;
$getTestDataBytestId = getTestDataBytestId($conn, $test_id, $student_id);
while ($row = mysqli_fetch_assoc($getTestDataBytestId)):
  $question_id = $row['question_id'];
  $resultsAnswerId = $row['answer_id'];


  $getQestionHeadline = getQestionHeadline($conn, $question_id);
  $head_line = $getQestionHeadline['head_line'];

?>
<tr>
<td>
    <div class="d-inline-block align-middle">
        <div class="d-inline-block">
            <h6><?php echo $head_line;  ?></h6>
                

                  <?php 
                        $getAnswerBodyText = getAnswerBodyText($conn, $question_id);
                        while($row = mysqli_fetch_assoc($getAnswerBodyText)) :
                        $is_correct = $row['is_correct'];
                        $testsAnswerId = $row['answer_id'];
                        $isCorrectText = $is_correct ? ' (' . array_search($is_correct, $aPreferences) . ')' : ''; 
                  ?> 
                    
                 <?php if ($resultsAnswerId == $testsAnswerId):?>

                 <p class="text mb-0" style="background-color: green;"><?php echo $row['body_text'] . $isCorrectText ;?></p>
                 <?php else:?>
                 <p class="text mb-0" style="color:red;"><?php echo $row['body_text'] . $isCorrectText ;?></p>
                 <?php endif?>
          </div>
      </div>
      <?php 
  endwhile;
  
  ?>
  </td>
  <td><?php echo $x; $x++?></td>
</tr>

<?php endwhile// კითხვა?>