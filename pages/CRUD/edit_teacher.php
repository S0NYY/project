<?php 
require_once("../../data_management/connect/connect.php");
require_once('../../data_management/function/administrator_function.php');

$teacherId = isset($_GET['teacher']) ? $_GET['teacher'] : '';
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$ID = isset($_POST['ID']) ? $_POST['ID'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$usrGroups = isset($_POST['group']) ? $_POST['group'] : '';


$dbGroups = getGroupIdsByTeacherId($conn, $teacherId);

// DELETE group id from db

while ($row = mysqli_fetch_assoc($dbGroups)) {
  $dbGroupId = $row['groupId'];
  if (!in_array($dbGroupId, $usrGroups)) {
    $sql = 'DELETE FROM group_teacher_rel WHERE groupId=' . $dbGroupId;
    if (!mysqli_query($conn, $sql)) {
      echo "Error deleting record: " . mysqli_error($conn);
    }
  }
}


// INSERT group id into db

foreach ($usrGroups as $usrValue) {
  $sqlSelect = "SELECT gtrel FROM group_teacher_rel WHERE groupId IN ($usrValue) AND teacherId=$teacherId";
  if (!$resultSelect = mysqli_query($conn, $sqlSelect)) {
    echo "Error SELECTING record: " . mysqli_error($conn);
  }
  if(!mysqli_num_rows($resultSelect)) {
    $sqlInsert = "INSERT INTO group_teacher_rel(groupId, teacherId) VALUES ('$usrValue', 
    '$teacherId')";
    if (!$resultInsert = mysqli_query($conn, $sqlInsert)) {
      echo "Error INSERTING record: " . mysqli_error($conn);
    }
  }
}

/*while ($row = mysqli_fetch_assoc($dbGroups)) {
  $dbGroupId = $row['groupId'];
  if (!in_array($dbGroupId, $usrGroups)) {
    $sql = 'DELETE FROM group_teacher_rel WHERE groupId=' . $dbGroupId;
    if (!mysqli_query($conn, $sql)) {
      echo "Error deleting record: " . mysqli_error($conn);
    }
  }
}*/



/*for($i = 0; $i < count($newGroupData); $i++) {
  echo $newGroupData[$i] . "<br>"; 
}*/

/*$getGroupIdsByTeacherId = getGroupIdsByTeacherId($conn, $teacherId);
while ( $row = mysqli_fetch_assoc($getGroupIdsByTeacherId)) {
      $oldGroupData = $row['groupId'];
      echo $oldGroupData;

}*/

/*if ($oldGroupData!=$newGroupData) {
  $sql = "DELETE FROM group_teacher_rel WHERE groupId = $group";
}*/






/*for ($i=0; $i < count($group); $i++) { 
    $sql = "INSERT INTO group_teacher_rel(groupId, teacherId) VALUES ('$group[$i]', 
    '$teacherId')";

      if (mysqli_query($conn, $sql)) {
      echo  "<h1>" . 'მონაცემი წარმატებით შეინახა' . "</h2>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }


  $sql = "UPDATE users_teacher SET username='$username', password='$password' WHERE teacherId=$teacherId";

  if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }
  $sql = "UPDATE teachers SET firstName='$firstName', lastName='$lastName', teacherShowId = '$ID' WHERE teacherId=$teacherId";

  if (!mysqli_query($conn, $sql)) {
    echo "Error updating record: " . mysqli_error($conn);
  }*/
header('location:../administrator_page/teacher_form.php');
  mysqli_close($conn);
?>