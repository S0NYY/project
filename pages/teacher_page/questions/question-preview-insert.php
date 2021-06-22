<?php
require_once(FUNCTION_DIR . 'preview_function.php');

$test_id = isset($_GET['test']) ? $_GET['test'] : '';
$question_id = isset($_GET['question']) ? $_GET['question'] : '';
$teacher_id = isset($_GET['teacher']) ? $_GET['teacher'] : '';

$questions = getQuestionsByTestId($conn, $test_id);
$teacherData = getTeacher($conn, $teacher_id);
$first_name = $teacherData['first_name'];
$last_name = $teacherData['last_name'];
$teacher_show_id = $teacherData['teacher_show_id'];
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header"><h3>კითხვის დამატება</h3></div>
        <div class="card-body">
            <form class="forms-sample" action="index.php?page=question_insert&test=<?php echo $test_id ?>&teacher=<?php echo $teacher_id ?>  "method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail3" placeholder="კითხვა" name="question[]">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select class="form-control" id="exampleSelectGender" name="answer_mode">
                                <option value="1">ერთ პასუხიანი</option>
                                <option value="2">მრავალ პასუხიანი</option>
                                <option value="3">ღია კითხვა</option>
                            </select>
                        </div>
                    </div>
                    <input type="file" name="questionfile[]" name="questionfilename">
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail3" placeholder="პასუხი" name="answer[]">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select class="form-control" id="exampleSelectGender" name="answer-is-correct[]">
                                <option value="">-----------------</option>
                                <option value="1">მართებულია</option>
                                <option value="0">მცდარია</option>
                            </select>
                        </div>
                    </div>
                    <input type="file" name="answerfile[]">
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail3" placeholder="პასუხი" name="answer[]">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select class="form-control" id="exampleSelectGender" name="answer-is-correct[]">
                                <option value="">-----------------</option>
                                <option value="1">მართებულია</option>
                                <option value="0">მცდარია</option>
                            </select>
                        </div>
                    </div>
                    <input type="file" name="answerfile[]">
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail3" placeholder="პასუხი" name="answer[]">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select class="form-control" id="exampleSelectGender" name="answer-is-correct[]">
                                <option value="">-----------------</option>
                                <option value="1">მართებულია</option>
                                <option value="0">მცდარია</option>
                            </select>
                        </div>
                    </div>
                    <input type="file" name="answerfile[]">
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail3" placeholder="პასუხი" name="answer[]">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select class="form-control" id="exampleSelectGender" name="answer-is-correct[]">
                                <option value="">-----------------</option>
                                <option value="1">მართებულია</option>
                                <option value="0">მცდარია</option>
                            </select>
                        </div>
                    </div>
                    <input type="file" name="answerfile[]">
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
<div class="col-md-12">
<div class="card">
<div class="card-block">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>ტესტი</th>
                    <th>#</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
<?php
$x=1;
while($row = mysqli_fetch_assoc($questions)) : // ტესტი
$qId = $row['question_id'];

?>
                <tr>

                    <td>
                        <div class="d-inline-block align-middle">
                            <div class="d-inline-block">


                                <h6><?php echo $row['head_line'];?></h6>
                                <?php 
                                    $getQuestionItemId = getQuestionItemId($conn, $qId);
                                    $question_item = $getQuestionItemId['item_id'];
                                    if ($question_item) {
                                        $getQuestionPhotos = getQuestionPhotos($conn, $question_item);
                                        if($getQuestionPhotos['file_name']) {
                                            $questionImage = $getQuestionPhotos['file_name'];
                                            if ($question_item == $qId) : ?>
                                                <img src="img/photos_test/<?php echo $questionImage?>"  width="50">
                                    <?php 
                                            endif;
                                        } 
                                    }
                                ?>
                                <?php 
//პასუხი
                                $answersByQId = getAnswersData($conn, $qId);
                                while($row = mysqli_fetch_assoc($answersByQId)) :
                                $answer_id = $row['answer_id'];
                                $is_correct = $row['is_correct'];
                                $isCorrectText = $is_correct ? ' (' . array_search($is_correct, $aPreferences) . ')' : ''; 
                                ?>
                                <p class="text-muted mb-0"><?php echo $row['body_text'] . $isCorrectText;?></p>
                                <?php   

                                    $getAnswerItemId = getAnswerItemId($conn, $answer_id);
                                    $answer_item = $getAnswerItemId['item_id'];
                                    if ($answer_item) {
                                        $getAnswersPhotos = getAnswersPhotos($conn, $answer_item);
                                        if($getAnswersPhotos['file_name']) {
                                            $answerImage = $getAnswersPhotos['file_name'];
                                            if ($answer_item == $answer_id) : ?>
                                                <img src="img/photos_test/<?php echo $answerImage?>"  width="50">
                                    <?php 
                                            endif;
                                        } 
                                    }
                                    
                                ?>
                            </div>
                        </div>
                        <?php 
                    endwhile;
                    
                    ?>
                    </td>
                    <td><?php echo $x; $x++?></td>
                    <td><a href="<?php 

                        urlGenerator( 
                          [
                            'mode' => 'view', 
                            'page' => 'question_preview_edit', 
                            'question' => $qId, 
                            'teacher' => $teacher_id 
                          ]
                        );

                      ?>"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                        <a href="<?php echo BASE_URL; ?>?mode=model&page=question_delete&question=<?php echo $qId;?>&test=<?php echo $test_id;?>&teacher=<?php echo $teacher_id;?>"><i class="ik ik-trash-2 f-16 text-red"></i></a></td>
                    </tr>
<?php endwhile;?>
            </tbody>
        </table>
    </div>
</div>
<?php
mysqli_close($conn);
?>
