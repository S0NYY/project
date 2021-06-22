<?php 
require_once(FUNCTION_DIR . '/teacher_result_function.php');

$test_id = isset($_GET['test']) ? $_GET['test'] : '';

?>
  <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><h3>სტუდენტის შედეგები</h3></div>
                                    <div class="card-body">
                                        <table id="data_table" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th class="nosort">ფოტო</th>
                                                    <th>სახელი | გვარი</th>
                                                    <th>ტესტის ნახვა</th>
                                                    <th class="nosort">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
 $x=1;
 $getStudentsList = getStudentsList($conn, $test_id);
 while ($row = mysqli_fetch_assoc($getStudentsList)) :
$student_id = $row['student_id'];
$getStudentsData = getStudentsData($conn, $student_id);
$first_name = $getStudentsData['first_name'];
$last_name = $getStudentsData['last_name'];

 
?>
                                                <tr>
                                                    <td><?php echo $x?></td>
                                                    <td><img src="img/users/1.jpg" class="table-user-thumb" alt=""></td>
                                                    <td><?php echo $first_name . ' ' . $last_name?></td>
                                                    <td> <a href="<?php echo BASE_URL; ?>?page=result&student=<?php echo $student_id?>&test=<?php echo $test_id?>">ტესტი</a></td>
                                                    <td>
                                                        
                                                    </td>
                                                </tr>
<?php $x++ ;endwhile ; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

