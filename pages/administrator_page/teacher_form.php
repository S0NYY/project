<?php 
require_once(FUNCTION_DIR . 'administrator_function.php'); ; 
?>
</head>
<div class="row">
    <div class="col-md-6">
        <div class="card" style="min-height: 484px;">
            <div class="card-header"><h3>მასწავლებელი</h3></div>
            <div class="card-body">
                <form class="forms-sample" action="index.php?page=insert_teacher" method="post">
                   <input type="hidden" name="status_id" value="1">
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">სახელი</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputUsername2" placeholder="სახელი" name="first_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">გვარი</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="გვარი" name="last_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">ნომერი</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="ნომერი" name="number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">მეილი</label>
                        <div class="col-sm-9">
                            <input type="mail" class="form-control" id="exampleInputEmail2" placeholder="მეილი" name="mail">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputMobile" placeholder="ID number" name="teacher_show_id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Username"  name="username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">მისამართი</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputConfirmPassword2" placeholder="მისამართი" name="addres">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">ქალაქი</label>

                        <?php 
                            $getCity = getCity($conn);
                            while ($row = mysqli_fetch_assoc($getCity)) :
                                $city_id = $row['city_id'];
                                $city_title = $row['title'];
                        ?>

                        <div class="radio radio-inline">
                                <input type="radio" name="city_id" value="<?php echo $city_id ;?>">
                            <label>
                                <?php echo $city_title ?>
                           </label>                            
                        </div>

                    <?php endwhile; ?>

                    </div>
                    <div class="form-group">
                        <label>ფოტოს ატვირთვა</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">რეგისტრაცია</button>
            </div>
        </div>
    </div>

        <div class="col-md-6">  
            <div class="card">
                <div class="card-header"><h3>აირჩიე ჯგუფი</h3></div>
                    <div class="card-body">
                        <?php 
                            $getGroups = getGroups($conn);
                           
                            while ($row = mysqli_fetch_assoc($getGroups)) :
                                $group_id = $row['group_id'];

                                $getCourseByGroupId = getCourseByGroupId($conn, $group_id);
                                $course_id = $getCourseByGroupId['course_id'];

                                $getCourseTitleBuCourseId = getCourseTitleBuCourseId ($conn, $course_id);
                                $course_title = $getCourseTitleBuCourseId['title'];
                                ?>
                            <div class="forms-sample" >
                                <input type="checkbox" name="group_id[]" value="<?php echo $group_id?>">
                                <label for="group"><?php echo $row['number']. ' - ' . $course_title  ?></label>
                            </div>
                       <?php endwhile;?>
                </div>
            </div>
        </div>
</form>                        

</div>

  
</div>

   

</div>

</body>
</html>
