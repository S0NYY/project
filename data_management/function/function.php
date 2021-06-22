
<?php

function getGroupData($conn, $student_id) {
  $sql = "SELECT groups.group_id as gId, groups.number as gNumber
  FROM groups, group_student_rel 
  WHERE group_student_rel.student_id = $student_id
  AND group_student_rel.group_id = groups.group_id
  ";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) > 0) { 
   return [ $row['gId'], $row['gNumber'] ];
  } else {
    return false;
  }
}

function getCourseData($conn, $gId) {
  $sql = "SELECT 
    courses.course_id as cId, 
    courses.title as cTitle 
  FROM courses, course_group_rel 
  WHERE course_group_rel.group_id=$gId
  AND course_group_rel.course_id=courses.course_id";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);
  return [ $row['cId'], $row['cTitle'] ];
}

function getSubjectsData($conn, $cId) {

  $sql= "SELECT subjects.subject_id AS subject_id, subjects.title AS title
  FROM course_subject_rel,subjects
  WHERE course_id = $cId
  AND subjects.subject_id = course_subject_rel.subject_id
  ";
    
  $result = mysqli_query($conn, $sql);
  return $result;
}

function getSubjectTitle($conn, $sId) {
  $sql= "SELECT title 
  FROM subjects 
  WHERE subject_id = $sId
  ";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);
  return $row['title'];
}

function formatStudentsList($sList){
  $listData = "<ul>";
  for ($s=0; $s < count($sList); $s++) { 
    $listData .= "<li>" . $sList[$s] . "</li>";
  }
  $listData .= "</ul>";

  return $listData;
}

function getStudentList($conn, $student_id){
  $sql = "SELECT first_name, last_name, student_show_id,photo
        FROM students
        WHERE students.student_id = $student_id";

        $result = mysqli_query($conn,$sql);

        $row = mysqli_fetch_assoc($result);
        return ['student_show_id' => $row['student_show_id'], 'first_name' =>$row['first_name'],
         'last_name' =>$row['last_name'],'photo'=>$row['photo']];//photo chavamate aq 


}
/// student table end here
///teacher table start


function getTestIdBySubjectId ($conn, $subject_id, $group_id){
  $sql = "SELECT test_id
          FROM tests
          WHERE subject_id = $subject_id
          AND group_id=$group_id ";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) { 
              $row = mysqli_fetch_assoc($result);
              return $row['test_id'];
          } else {
              return false;
          }

}

  function returnResult($conn, $student_id, $test_id){
    $sql = "SELECT test_id
            FROM results
            WHERE student_id = $student_id
            AND test_id = $test_id";

            $result = mysqli_query($conn, $sql);
            
             if (mysqli_num_rows($result) > 0){
              return $result;
            }
            else{
              return false;
            }

  }

?>
