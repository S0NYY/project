<?php
$teacher_id = isset($_GET['teacher']) ? $_GET['teacher'] : '';
$group_id = isset($_POST['group']) ? $_POST['group'] : '';
$subject_id = isset($_POST['subject']) ? $_POST['subject'] : '';
?>


<?php
$sql = "INSERT INTO tests (teacher_id, group_id, subject_id)
VALUES ('$teacher_id', '$group_id', '$subject_id')";

if (mysqli_query($conn, $sql)){ $testId = mysqli_insert_id($conn);

}
else{ echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
mysqli_close($conn);




header('location:' . BASE_URL . '?mode=view&page=test_list&teacher=' . $teacher_id);
?>

