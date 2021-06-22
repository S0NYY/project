<?php 
require_once(FUNCTION_DIR . 'administrator_function.php');

$student_id = isset ($_GET['student']) ? $_GET['student'] :'';

$studentSuspended = studentSuspended($conn, $student_id);
if (mysqli_num_rows($studentSuspended) > 0){

    $sql = "UPDATE users_student SET suspended = '1' WHERE student_id = $student_id";
     if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }

  }else{

  $sql = "DELETE FROM group_student_rel WHERE student_id = $student_id";
    
   if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }

  $sql = "DELETE FROM users_student WHERE student_id = $student_id";
    
   if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }


  $sql = "DELETE FROM students WHERE student_id = $student_id";
    
   if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }
}

//header('location: ../administrator_page/student_form.php');
mysqli_close($conn);

?>