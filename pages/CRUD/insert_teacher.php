<?php
$teacher_id = isset ($_POST['teacher']) ? $_POST['teacher'] :'';
$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
$teacher_show_id = isset($_POST['teacher_show_id']) ? $_POST['teacher_show_id'] : '';
$photo = isset($_POST['photo']) ? $_POST['photo'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$group_id = isset($_POST['group_id']) ? $_POST['group_id'] : '';
$city_id = isset($_POST['city_id']) ? $_POST['city_id'] : '';
$number = isset($_POST['number']) ? $_POST['number'] : '';
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$addres = isset($_POST['addres']) ? $_POST['addres'] : '';
$status_id = isset($_POST['status_id']) ? $_POST['status_id'] : '';


$sql = "INSERT INTO teachers (first_name, last_name, teacher_show_id, city_id, number, mail, addres, status_id, photo)
        VALUES ('$first_name', '$last_name', '$teacher_show_id', '$city_id', '$number', '$mail', '$addres', '$status_id', '$photo')";

        if (mysqli_query($conn, $sql)) {
          echo "მონაცემი წარმატებით შეინახა". "<br>";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        $teacher_id = mysqli_insert_id($conn);


  for ($i=0; $i < count($group_id); $i++) { 
    $sql = "INSERT INTO group_teacher_rel(group_id, teacher_id) VALUES ('$group_id[$i]', 
    '$teacher_id')";

      if (mysqli_query($conn, $sql)) {
      echo "მონაცემი წარმატებით შეინახა". "<br>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

$sql = "INSERT INTO users_teacher(username, password, teacher_id) 
        VALUES ('$username', '$password', $teacher_id)";

        if (mysqli_query($conn, $sql)) {
          echo "მონაცემი წარმატებით შეინახა";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

mysqli_close($conn);

//header('location: ../administrator_page/teacher_form.php');

?>