<?php
function getTests ($conn, $teacher_id){
	$sql = "SELECT test_id, group_id, subject_id
		  FROM tests
		  WHERE teacher_id = $teacher_id";
      $result = mysqli_query($conn, $sql);
      return $result;
  }
//chavakomentare 27.05 01:40-ze imitom rom teacher_function-shi xels ushlida igive saxelebi
/*function getTeacher($conn, $teacher){
  $sql = "SELECT firstName, lastName, teacherShowId, photo
          FROM teachers
          WHERE teachers.teacher_id = $teacher";

          $result = mysqli_query($conn,$sql);

          $row = mysqli_fetch_assoc($result);
          return ['firstName' =>$row['firstName'], 'lastName' =>$row['lastName'], 'teacherShowId' => $row['teacherShowId'],
          'photo'=>$row['photo']];
      }
*/
function getSubjectTitleById($conn, $subject_id) {
  $sql = "SELECT title
          FROM subjects
          WHERE subject_id = $subject_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return $row['title'];
  }

function getGroupNumById($conn, $group_id) {
  $sql = "SELECT number
          FROM groups
          WHERE group_id = $group_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return $row['number'];
  }

?>