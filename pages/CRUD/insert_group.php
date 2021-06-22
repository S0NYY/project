<?php 
$group_number = isset($_POST['group_number']) ? $_POST['group_number'] : '';
$course_title = isset($_POST['course_title']) ? $_POST['course_title'] : '';


$sql = "INSERT INTO groups(number) VALUES ('$group_number')";

if (mysqli_query($conn, $sql)) {
  echo  "<h1>" . 'მონაცემი წარმატებით შეინახა' . "</h2>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

  $lastGroupId = (mysqli_insert_id($conn));




  for ($i=0; $i < count($course_title); $i++){
  $sql = "INSERT INTO course_group_rel(course_id, group_id) VALUES ('$course_title[$i]', '$lastGroupId')";

    if (mysqli_query($conn, $sql)) {
    echo  "<h1>" . 'მონაცემი წარმატებით შეინახა' . "</h2>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}





//header('location:../administrator_page/group_form.php');
mysqli_close($conn);


