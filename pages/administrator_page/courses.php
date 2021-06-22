<?php
require_once(FUNCTION_DIR . 'administrator_function.php'); 
?>
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Data Table</h3></div>
                <div class="card-body">
                    <table id="data_table" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>კურსი</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $getCourses = getCourses($conn);
                                $x=1;
                              
                              while($row = mysqli_fetch_assoc($getCourses)) :
                                $course_id = $row['course_id'];
                                $course_title = $row['title'];
                         ?>

                            <tr>
                                <td><?php echo $x; ?></td>
                                <td><?php echo $course_title ?></td>
                                <td>
                                    <div class="table-actions">
                                        <a href="<?php  urlGenerator( 
                          [
                            'mode' => 'model', 
                            'page' => 'delete_course', 
                            'course' => $course_id 
                          ]
                        ); ?>"><i class="ik ik-trash-2"></i></a>
                                    </div>
                                </td>
                                <?php  $x++;  endwhile; ?> 
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>