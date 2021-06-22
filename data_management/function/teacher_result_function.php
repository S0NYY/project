<?php

//ტესტების ჩვენება მასწავლებლისთვის

function getTestsByTeacherId($conn, $teacher_id){
$sql = "SELECT test_id, group_id, subject_id
        FROM tests
        WHERE teacher_id = $teacher_id";
        $result = mysqli_query($conn, $sql);
        return $result;
}
function getSubjectTitleBySubjectId($conn, $subject_id){
  $sql = "SELECT title
          FROM subjects
          WHERE subject_id = $subject_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['title'=>$row['title']];
}
function getGroupNumberByGroupId($conn, $group_id){
  $sql = "SELECT number
          FROM groups
          WHERE group_id = $group_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['number'=>$row['number']];
}
function getCourseIdByGroupId($conn, $group_id){
  $sql = "SELECT course_id
          FROM course_group_rel
          WHERE group_id = $group_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['course_id'=>$row['course_id']];
}
function getCourseTitleByCourseId($conn, $course_id){
  $sql = "SELECT title
          FROM courses
          WHERE course_id = $course_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['title'=>$row['title']];
}

// სტუდენტების სია

function getStudentsList($conn, $test_id){
  $sql = "SELECT student_id 
          FROM results
          WHERE test_id = $test_id
          GROUP BY student_id";
          $result = mysqli_query($conn, $sql);
          return $result;
}
function getStudentsData($conn, $student_id){
  $sql = "SELECT first_name, last_name 
          FROM students
          WHERE student_id = $student_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['first_name'=>$row['first_name'],'last_name'=>$row['last_name']];
}


//სტუდენტების რეზულტატი 

function getTestsByGroupId ($conn, $group_id){
  $sql = "SELECT test_id
          FROM tests
          WHERE group_id = $group_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['test_id'=>$row['test_id']];
}

function getTestDataBytestId($conn, $test_id, $student_id){
  $sql = "SELECT question_id, answer_id
          FROM results
          WHERE student_id = $student_id
          AND test_id = $test_id";
          $result = mysqli_query($conn, $sql);
          return $result;
}
function getQestionHeadline($conn, $question_id){
  $sql = "SELECT head_line
          FROM questions
          WHERE question_id = $question_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['head_line'=>$row['head_line']];
}
function getAnswerBodyText($conn, $question_id){
  $sql = "SELECT answer_id, body_text, is_correct
          FROM answers
          WHERE question_id = $question_id";
          $result = mysqli_query($conn, $sql);
          return $result;
}

?>