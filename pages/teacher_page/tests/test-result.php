<?php 
require_once('../../connect/connect.php');
require_once('../../function/teacher_result_function.php');
$teacher_id = isset($_GET['teacher']) ? $_GET['teacher'] : '';
$test_id =  isset($_GET['test']) ? $_GET['test'] : '';

?>
<!DOCTYPE html>
<html>
<head>
  <title>შედეგები</title>
</head>
<body>
</body>
</html>

<?php 

$getragaca = getragaca($conn, $test_id);
while ($row = mysqli_fetch_assoc($getragaca)) : 
$group_id = $row['group_id'];
echo $group_id;

$getStudentsByGroupId = getStudentsByGroupId($conn, $group_id);
$student_id = $getStudentsByGroupId['student_id'];

$getStudentData = getStudentData($conn, $student_id);
$first_name = $getStudentData['first_name'];
$last_name = $getStudentData['last_name'];
$student_show_id = $getStudentData['student_show_id'];
 
?>
<a href="student-test-result.php?test=<?php echo $testId?>&student=<?php echo $studentId ?>"> <?php  echo $first_name . ' ' . $last_name . ' ' . $student_show_id . "<br>"?></a>
<?php endwhile?>
 <?php 
mysqli_close($conn);

?>