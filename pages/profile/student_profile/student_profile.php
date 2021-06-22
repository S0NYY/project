<?php
require_once(FUNCTION_DIR . 'administrator_function.php');
$student_id = isset($_GET['student']) ? $_GET['student'] : '';
?>
<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
            <?php 
                $getStudentsProfile = getStudentsProfile($conn, $student_id);
                $first_name = $getStudentsProfile['first_name'];
                $last_name = $getStudentsProfile['last_name'];
                $student_show_id = $getStudentsProfile['student_show_id'];
                $city_id = $getStudentsProfile['city_id'];
                $number = $getStudentsProfile['number'];
                $mail = $getStudentsProfile['mail'];
                $addres = $getStudentsProfile['addres'];
                $status_id = $getStudentsProfile['status_id'];

                $getStudentsGroup = getStudentsGroup($conn, $student_id);
                $group_id = $getStudentsGroup['group_id'];
                $group_number = $getStudentsGroup['group_number'];

                $getCourseTitleByGroupId = getCourseTitleByGroupId($conn, $group_id);
                $course_title = $getCourseTitleByGroupId['title'];

                $getCityTitleFromStudents = getCityTitleFromStudents($conn, $student_id);
                $city_title = $getCityTitleFromStudents['city_title'];

                $getStatusByStudentId = getStatusByStudentId($conn, $student_id);
                $status_title = $getStatusByStudentId['status_title'];

            ?>
                    <img src="img/user.jpg" class="rounded-circle" width="150" />
                    <h4 class="card-title mt-10"><?php echo $first_name . ' ' .$last_name?></h4>
                    <p class="card-subtitle"><?php echo $course_title?></p>
                    <p class="card-subtitle">#<?php echo $group_number?></p>
                </div>
            </div>
            <hr class="mb-0"> 
            <div class="card-body"> 
                <small class="text-muted d-block">@მეილი</small>
                <h6><?php echo $mail?></h6> 
                <small class="text-muted d-block pt-10">მობილური</small>
                <h6><?php echo $number?></h6> 
                <small class="text-muted d-block pt-10">მისამართი</small>
                <h6><?php echo $city_title . ' ' . $addres?></h6>
                <small class="text-muted d-block pt-10">სტატუსი</small>
                <h6><?php echo $status_title?></h6>
                
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">პროფილი</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                    <div class="card-body">
                        <div class=" mt-0">
                          <div class="dt-responsive">
                    <table id="order-table"
                           class="table  table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>ორშაბათი</th>
                            <th>სამშაბათი</th>
                            <th>ოთხშაბათი</th>
                            <th>ხუთშაბათი</th>
                            <th>პარასკევი</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>ვებ-ტექნოლოგიები <br> 13:00-14:00 </td>
                            <td>Adobe-illustrator <br> 14:05-15:00 </td>
                            <td>შრომის უსაფრთხოება <br> 15:00-16:00</td>
                            <td>ინგლისური <br> 13:00-14:00</td>
                            <td>გარემოს დაცვა <br> 14:00-15:00</td>
                        </tr>
                        <tr>
                            <td>Adobe-illustrator <br> 14:05-15:00 </td>
                            <td>Excel <br> 16:00-17:00</td>
                            <td>Adobe-photoshop <br> 17:00-18:00</td>
                            <td>შრომის უსაფრთხოება <br> 18:00 - 19:00</td>
                            <td>Word <br> 16:00-17:00</td>
                        </tr>
                       
                        
                    </tbody>
                       
                    </table>
                </div>
                           
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                    <div class="card-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="example-name">სახელი</label>
                                <input type="text" placeholder="ჩასწორება" class="form-control" name="example-name" id="example-name">
                            </div>
                            <div class="form-group">
                                <label for="example-name">გვარი</label>
                                <input type="text" placeholder="ჩასწორება" class="form-control" name="example-name" id="example-name">
                            </div>
                            <div class="form-group">
                                <label for="example-email">@მეილი</label>
                                <input type="email" placeholder="ჩასწორება" class="form-control" name="example-email" id="example-email">
                            </div>
                            <div class="form-group">
                                <label for="example-password">Password</label>
                                <input type="text" placeholder="ჩასწორება" class="form-control" name="example-password" id="example-password">
                            </div>
                            <div class="form-group">
                                <label for="example-phone">მობილური</label>
                                <input type="text" placeholder="5XX-XXX-XXX" id="example-phone" name="example-phone" class="form-control">
                            </div>
                            <button class="btn btn-success" type="submit">ჩასწორება</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>