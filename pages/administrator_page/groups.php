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
                                <th>ჯგუფი</th>
                                <th>კურსი</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $getGroup = getGroups($conn);
                                $x=1;
                              if (mysqli_num_rows($getGroup) > 0) :
                              while($row = mysqli_fetch_assoc($getGroup)) :
                              $group_id = $row['group_id'];

                              $getCourseTitleByGroupId = getCourseTitleByGroupId($conn, $group_id);
                              $course_title = $getCourseTitleByGroupId['title'];
                        ?>

                            <tr>
                                <td><?php echo $x; ?></td>
                                <td><?php echo $row['number']?></td>
                                <td><?php echo $course_title ?></td>
                                <td>
                                    <div class="table-actions">
                                        <a href="<?php echo BASE_URL; ?>?page=delete_group&group=<?php echo $group_id ?>"><i class="ik ik-trash-2"></i></a>
                                    </div>
                                </td>
                                <?php  $x++;  endwhile; endif; ?> 
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>