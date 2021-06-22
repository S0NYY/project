<?php 
require_once(FUNCTION_DIR . '/teacher_result_function.php');
$teacher_id = isset($_GET['teacher']) ? $_GET['teacher']: '';

?>
<div class="card">
    <div class="card-header d-block">
        <h3>შედეგები</h3>
    </div>
    <div class="card-body p-0 table-border-style">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>საგანი</th>
                        <th>კურსი</th>
                        <th>ჯგუფი</th>
                    </tr>
                </thead>
                <tbody>
                                                    <?php
                $x=1;
                $getTestsByTeacherId = getTestsByTeacherId($conn, $teacher_id);
                while ($row = mysqli_fetch_assoc($getTestsByTeacherId)) :
                $test_id = $row['test_id'];
                $group_id = $row['group_id'];
                $subject_id = $row['subject_id'];

                $getSubjectTitleBySubjectId = getSubjectTitleBySubjectId($conn, $subject_id);
                $subject_title = $getSubjectTitleBySubjectId['title'];

                $getGroupNumberByGroupId = getGroupNumberByGroupId($conn, $group_id);
                $group_number = $getGroupNumberByGroupId['number'];

                $getCourseIdByGroupId = getCourseIdByGroupId($conn, $group_id);
                $course_id = $getCourseIdByGroupId['course_id'];

                $getCourseTitleByCourseId = getCourseTitleByCourseId($conn, $course_id);
                $course_title = $getCourseTitleByCourseId['title'];
                ?>
                <tr>
                    <th scope="row"><?php echo $x;?></th>
                    <td ><a href="<?php echo BASE_URL; ?>?page=students_preview&test=<?php echo $test_id?>"><?php echo $subject_title?></td>
                    <td><?php echo $course_title?></td>
                    <td><?php echo $group_number?></td>
                </tr>
                                                    
<?php $x++;endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>