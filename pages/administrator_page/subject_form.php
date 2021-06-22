<?php 
require_once(FUNCTION_DIR . 'administrator_function.php'); ; 
?>

<div class="row">
    <div class="col-md-5">
            <div class="card" style="min-height: 270px;">
                <div class="card-header"><h3>საგანი</h3></div>
                <div class="card-body">
                    <form class="forms-sample" action="index.php?page=insert_subject" method="post">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="exampleInputUsername2" placeholder="დაამატე საგანი" name="subject_id">
                            </div>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary mr-2">საგნის დამატება</button>
                  
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h3>აირჩიე კურსი</h3></div>
                <div class="card-body">
                <?php
                 $getCourses = getCourses($conn);
                 while ($row = mysqli_fetch_assoc($getCourses)) :
                  $course_id = $row['course_id'];
                  $course_title = $row['title'];

                 ?>
        <div class="forms-sample">
            <input type="checkbox" name="course_id[]" value="<?php echo $course_id?>">
            <label><?php echo $course_title ;?></label>
        </div>
        <?php endwhile;?>
                </div>
            </div>
        </div>
    </form>


                            
    </div>

    
