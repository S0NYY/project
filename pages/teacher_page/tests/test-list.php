<?php
require_once(FUNCTION_DIR . 'administrator_function.php'); 
require_once(FUNCTION_DIR . 'preview_function.php');
require_once(FUNCTION_DIR . 'teacher_function.php');

$teacher_id = isset($_GET['teacher']) ? $_GET['teacher'] : '';
$teacherData = getTeacher($conn, $teacher_id); //მასივი მასწავლებლოს მონაცემებით (id ,fistName, lastName,teacherShowId)
$first_name = $teacherData['first_name'];
$last_name = $teacherData['last_name'];
$teacher_show_id = $teacherData['teacher_show_id'];
$groupData = getGroupData($conn, $teacher_id);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3>ტესტის შექმნა</h3></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form class="sample-form" action="<?php urlGenerator(['mode' => 'model', 'page' => 'test_insert', 'teacher' => $teacher_id]);?>"  method="post">
                            <div class="form-group">
                                <label for="">ჯგუფი </label>
                                <select class="form-control select2" name="group" id="group" onchange="submitForm(this)">
                                    <?php

                                      $default_gId = isset($_GET['group']) ? $_GET['group'] : 0;
                                      while($row = mysqli_fetch_assoc($groupData)) :
                                        $gId = $row['gId']; 
                                        $gNumber = $row['gNumber']; 
                                        if (!$default_gId) {   
                                          $default_gId = $gId;
                                        }
                                        if($default_gId == $gId) { 
                                          $selected = 'selected="selected" '; 
                                        } else {
                                          $selected = '';
                                        }
                                      ?>
                                        <option <?php echo $selected; ?>value="<?php echo $gId ?>"><?php echo $gNumber ?></option>
                                        <?php
                                        endwhile;
                                        ?>

                                </select>
                            </div>
                    </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">საგანი</label>
                                       <select class="form-control select2" name="subject" id="subject">
                                            <?php
                                            $subjects = getSubjectsByGroupId($conn, $default_gId);
                                              
                                              if ($subjects) :
                                                  while($row = mysqli_fetch_assoc($subjects)) :
                                                $sId = $row['sId'];
                                                $sTitle = $row['sTitle'];
                                                ?>
                                                <option value="<?php echo $sId ?>"><?php echo $sTitle ?></option>
                                                <?php
                                                endwhile;
                                              endif;
                                            ?>
                                       </select>
                                </div>
                            </div>
                     </div> 
                </div>
                 <input type="submit" value="ტესტის შექმნა" class="btn btn-primary btn-rounded">
            </form>
        </div>
    </div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header"><h3>ტესტების ცხრილი</h3></div>
        <div class="card-body">
            <table id="data_table" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="nosort">საგანი</th>
                        <th>ჯგუფი</th>
                        <th class="nosort">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $x=1;
                      $tests = getTests ($conn, $teacher_id); // ტესტები წმოღება მასწავლებელზე დაყრდნობით (ფუნქცია გვიბრუნებს ობიექტს მრავალი ჩანაწერით)
                      while($row = mysqli_fetch_assoc($tests)) : // ობიექტის ასოცირებული მასივის სახით დაშლა (ყოველ მიმართვაზე თითო row ჩანაწერად)
                        $test_id = $row['test_id'];
                        
                        $group_id = $row['group_id'];
                        $groupNum = getGroupNumById($conn, $group_id);

                        $subject_id = $row['subject_id'];
                        $subject_title = getSubjectTitleById($conn, $subject_id);
                        ?>
                    <tr>
                        <td><?php echo $x;?></td>
                        <td><a href="<?php urlGenerator(['mode' => 'view', 'page' => 'question_preview_insert', 'test' => $test_id, 'teacher' => $teacher_id]);?>">
                        <?php echo $subject_title; ?></a></td>
                        <td><?php echo $groupNum; ?></td>
                        <td>
                            <div class="table-actions">
                                <a href="<?php urlGenerator(['mode' => 'model', 'page' => 'test_delete', 'test' => $test_id, 'teacher' => $teacher_id])?>"><i class="ik ik-trash-2"></i></a>
                            </div>
                        </td>
                    </tr>
                    
                           
    <?php
  endwhile;
?>
                        </tbody>
                    </table>
                </div>
            </div>
            

</div>
