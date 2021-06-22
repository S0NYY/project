<?php 
require_once(FUNCTION_DIR . 'administrator_function.php'); ; 
?>
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>საგნები</h3></div>
                <div class="card-body">
                <form class="forms-sample" action="../CRUD/delete_subject.php" method="post">
                    <table id="data_table" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>საგანი</th>
                                <th>კურსი</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $getSubjects = getSubjects($conn);

                        $x=1;
                        if (mysqli_num_rows($getSubjects) > 0) :
                          while ($row = mysqli_fetch_assoc($getSubjects)):
                            $subject_id = $row['subject_id'];

                            $getTitleByCourseId = getTitleByCourseId($conn, $subject_id);
                            $course_title = $getTitleByCourseId['title'];
                            ?>

                            <tr>
                                <td><?php echo $x; ?></td>
                                <td><?php echo $row['title']?></td>
                                <td><?php echo $course_title ?></td>
                                <td>
                                    <div class="table-actions">
                                        <a href="<?php urlGenerator( 
                          [
                            'mode' => 'model', 
                            'page' => 'delete_subject', 
                            'subject' => $subject_id 
                          ]
                        );?>"><i class="ik ik-trash-2"></i></a>
                                    </div>
                                </td>
                                <?php  $x++;  endwhile; endif; ?> 
                            </tr>
                            
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>