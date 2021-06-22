<?php
require_once(FUNCTION_DIR . 'administrator_function.php'); 
?>
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>მასწავლებლის ცხრილი</h3></div>
                <div class="card-body">
                    <table id="data_table" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                    <th class="nosort">ფოტო</th>
                                    <th>სახელი | გვარი</th>
                                    <th>ჯგუფი</th>
                                    <th>კურსი</th>
                                    <th>რიგიონი</th>
                                    <th>სტატუსი</th>
                                    <th>ჩასწორება</th>
                                    <th>რეგისტრაციის თარიღი</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $getTeachers = getTeachers($conn);
                             $x=1;
                            if (mysqli_num_rows($getTeachers) > 0) :
                            while($row = mysqli_fetch_assoc($getTeachers)) :
                                    $teacher_id = $row['teacher_id'];
                                    $first_name = $row['first_name'];
                                    $last_name = $row['last_name'];
                                    $teacher_show_id = $row['teacher_show_id'];
                                    $city_id = $row['city_id'];
                                    $status_title = $row['status_id'];
                                    $datatime = $row['datatime'];
                                
                                $getTeachersGroup = getTeachersGroup($conn, $teacher_id);
                                $group_id = $getTeachersGroup['group_id'];
                                $group_number = $getTeachersGroup['group_number'];

                                $getCourseTitleByGroupId = getCourseTitleByGroupId($conn, $group_id);
                                $course_title = $getCourseTitleByGroupId['title'];

                                $getCityTitleFromTeachers = getCityTitleFromTeachers($conn, $teacher_id);
                                $city_title = $getCityTitleFromTeachers['city_title'];

                                $getStatusByTeacherId = getStatusByTeacherId($conn, $teacher_id);
                                $status_title = $getStatusByTeacherId['status_title'];

                        ?>
                            <tr>
                                <td><?php echo $x?></td>
                                    <td><img src="img/users/user.jpg" class="table-user-thumb" alt=""></td>
                                    <td><a href="<?php  urlGenerator( 
                          [
                            'mode' => 'view', 
                            'page' => 'teacher_profile', 
                            'teacher' => $teacher_id 
                          ]
                        );?>"><?php echo $first_name . ' ' . $last_name ?></td></a>
                                    <td><?php echo $group_number ?></td>
                                    <td><?php echo $course_title ?></td>
                                    <td><?php echo $city_title?></td>
                                    <td><?php echo $status_title ?></td>
                                    <td><a href="<?php  urlGenerator( 
                          [
                            'mode' => 'view', 
                            'page' => 'teacher_profile_preview', 
                            'teacher' => $teacher_id 
                          ]
                        );?>"><i class="ik ik-settings"></i></a></td>
                                    <td><?php echo $datatime?></td>
                                </td>
                            </tr>
                 <?php  $x++;  endwhile; endif;?> 
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>