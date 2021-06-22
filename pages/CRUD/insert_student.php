<?php

$student_id = isset ($_POST['student']) ? $_POST['student'] :'';

$first_name = isset ($_POST['first_name']) ? $_POST['first_name'] :'';
$last_name = isset ($_POST['last_name']) ? $_POST['last_name'] :'';
$student_show_id = isset ($_POST['student_show_id']) ? $_POST['student_show_id'] :'';
$photo = isset($_POST['photo']) ? $_POST['photo'] : '';
$group_id = isset($_POST['group_id']) ? $_POST['group_id'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$city_id = isset($_POST['city_id']) ? $_POST['city_id'] : '';
$number = isset($_POST['number']) ? $_POST['number'] : '';
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$addres = isset($_POST['addres']) ? $_POST['addres'] : '';
$status_id = isset($_POST['status_id']) ? $_POST['status_id'] : '';


$sql = "INSERT INTO students (first_name, last_name, student_show_id, city_id, number, mail, addres, status_id, photo)
VALUES ('$first_name', '$last_name', '$student_show_id', '$city_id', '$number', '$mail', '$addres', '$status_id', '$photo')";

if (mysqli_query($conn, $sql)) {
  echo  "<h1>" . 'მონაცემი წარმატებით შეინახა' . "</h2>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

  $getLastStudentId=(mysqli_insert_id($conn));


for ($i=0; $i < count($group_id); $i++) { 
  $sql = "INSERT INTO group_student_rel(group_id, student_id) VALUES ('$group_id[$i]', '$getLastStudentId')";

    if (mysqli_query($conn, $sql)) {
    echo  "<h1>" . 'მონაცემი წარმატებით შეინახა' . "</h2>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
  

$sql = "INSERT INTO users_student(username, password, student_id) VALUES ('$username', '$password', '$getLastStudentId' )";
if (mysqli_query($conn, $sql)) {
  echo  "<h1>" . 'მონაცემი წარმატებით შეინახა' . "</h2>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header('location:' . BASE_URL . '?mode=view&page=student_form');
mysqli_close($conn);
?>
    
