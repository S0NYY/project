<?php
require_once(FUNCTION_DIR . 'administrator_function.php');   ?>

<div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>სტუდენტების ცხრილი</h3></div>
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
                                $getStudents = getStudents($conn);
                                 $x=1;
                                if (mysqli_num_rows($getStudents) > 0) :
                                while($row = mysqli_fetch_assoc($getStudents)) :
                                    $student_id = $row['student_id'];
                                    $first_name = $row['first_name'];
                                    $last_name = $row['last_name'];
                                    $student_show_id = $row['student_show_id'];
                                    $city_id = $row['city_id'];
                                    $status_title = $row['status_id'];
                                    $datatime = $row['datatime'];
                                    
                                    $getStudentsGroup = getStudentsGroup($conn, $student_id);
                                    $group_id = $getStudentsGroup['group_id'];
                                    $group_number = $getStudentsGroup['group_number'];

                                    $getCourseTitleByGroupId = getCourseTitleByGroupId($conn, $group_id);
                                    if ($getCourseTitleByGroupId) :
                                    
                                        $course_title = $getCourseTitleByGroupId['title'];

                                        $getCityTitleFromStudents = getCityTitleFromStudents($conn, $student_id);
                                        $city_title = $getCityTitleFromStudents['city_title'];

                                        $getStatusByStudentId = getStatusByStudentId($conn, $student_id);
                                        $status_title = $getStatusByStudentId['status_title'];

                                    ?>
                                <tr>
                                    <td><?php echo $x?></td>
                                    <td><img src="img/users/user.jpg" class="table-user-thumb" alt=""></td>
                                    <td><a href="<?php echo BASE_URL; ?>?page=student_profile&student=<?php echo $student_id?>"><?php echo $first_name . ' ' . $last_name ?></td></a>
                                    <td><?php echo $group_number ?></td>
                                    <td><?php echo $course_title ?></td>
                                    <td><?php echo $city_title?></td>
                                    <td><?php echo $status_title ?></td>
                                    <td><a href="<?php echo BASE_URL; ?>?page=student_profile_preview&student=<?php echo $student_id?>"><i class="ik ik-settings"></i></a></td>
                                    <td><?php echo $datatime?></td>
                                    
                                </tr>
                     <?php  endif; $x++;  endwhile; endif;?> 
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>