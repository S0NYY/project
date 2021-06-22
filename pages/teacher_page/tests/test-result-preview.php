<?php 
require_once('../../connect/connect.php');
require_once('../../function/teacher_result_function.php');
$teacher_id = isset($_GET['teacher']) ? $_GET['teacher'] : '';
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
 $tests = getTests ($conn, $teacher_id); 
  while($row = mysqli_fetch_assoc($tests)) : 
    $test_id = $row['test_id'];
    
    $group_id = $row['group_id'];
    $groupNum = getGroupNumById($conn, $group_id);

    $subject_id = $row['subject_id'];
    $subject_title = getSubjectTitleById($conn, $subject_id);
    ?>
    <h2><a href="test-result.php?test=<?php echo $test_id; ?>"><?php echo $subject_title; ?></a> (ჯგუფი #<?php echo 
      $groupNum; ?>)
    <?php
  endwhile;
mysqli_close($conn);

?>