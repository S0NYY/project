<?php 

$subject_id = isset($_POST['subject_id']) ? $_POST['subject_id'] : '';
$course_id = isset($_POST['course_id']) ? $_POST['course_id'] : '';


$sql = "INSERT INTO subjects(title) VALUES ('$subject_id')";

if (mysqli_query($conn, $sql)) {
  echo  "<h1>" . 'მონაცემი წარმატებით შეინახა' . "</h2>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$lastSubjectId = mysqli_insert_Id($conn);

for($i=0; $i < count($course_id); $i++){
$sql = "INSERT INTO course_subject_rel(course_id, subject_id) VALUES ('$course_id[$i]', '$lastSubjectId')";

  if (mysqli_query($conn, $sql)) {
    echo  "<h1>" . 'მონაცემი წარმატებით შეინახა' . "</h2>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
//header('location:../administrator_page/subject_form.php');
mysqli_close($conn);

?>