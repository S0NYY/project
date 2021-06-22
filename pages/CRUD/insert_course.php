<?php 
$course_title = isset($_POST['course_title']) ? $_POST['course_title'] : '';

$sql = "INSERT INTO courses(title) VALUES ('$course_title')";
if (mysqli_query($conn, $sql)) {
  echo "<h1>" . 'მონაცემი წარმატებით შეინახა' . "</h2>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header('location:' . BASE_URL . '?mode=view&page=course_form');
mysqli_close($conn);
?>