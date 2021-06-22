<?php  
require_once(FUNCTION_DIR . 'administrator_function.php'); ; 

$teacher_id = isset ($_GET['teacher']) ? $_GET['teacher'] :'';

$teacherSuspended = teacherSuspended($conn, $teacher_id);
if (mysqli_num_rows($teacherSuspended) > 0){

    $sql = "UPDATE users_teacher SET suspended = '1' WHERE teacher_id = $teacher_id";
     if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }

  }else{

  $sql = "DELETE FROM group_teacher_rel WHERE teacher_id = $teacher_id";
    
   if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }

  $sql = "DELETE FROM users_teacher WHERE teacher_id = $teacher_id";
    
   if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }


  $sql = "DELETE FROM teachers WHERE teacher_id = $teacher_id";
    
   if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }
}

//header('location: ../administrator_page/teacher_form.php');
mysqli_close($conn);

?>
