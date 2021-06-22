<?php 
// სტუდენტის ფუნქციები

function getStudents($conn){
  $sql = "SELECT student_id, first_name, last_name, student_show_id, city_id, status_id, datatime
          FROM students";
          $result = mysqli_query($conn, $sql);
          return $result;
}
function getStudentsProfile($conn, $student_id){
  $sql = "SELECT student_id, first_name, last_name, student_show_id, city_id, number, mail, addres, status_id
          FROM students
          WHERE student_id = $student_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['first_name'=>$row['first_name'], 'last_name'=>$row['last_name'], 'student_show_id'=>$row['student_show_id'],'city_id'=>$row['city_id'], 'number'=>$row['number'], 'mail'=>$row['mail'], 'addres'=>$row['addres'],
          'status_id'=>$row['status_id']];
}
function getStudentsGroup($conn, $student_id){
  $sql = "SELECT groups.group_id AS group_id, groups.number AS group_number
          FROM group_student_rel, groups
          WHERE student_id = $student_id
          AND groups.group_id = group_student_rel.group_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['group_id'=>$row['group_id'], 'group_number'=>$row['group_number']];

}
function editStudentsData($conn, $student_id){
  $sql = "SELECT first_name, last_name, student_show_id
          FROM students
          WHERE student_id= $student_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['first_name'=>$row['first_name'], 'last_name'=>$row['last_name'], 'student_show_id'=>$row['student_show_id']];
}
function editStudentsUser($conn, $student_id){
  $sql = "SELECT username, password
          FROM users_student
          WHERE student_id = $student_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['username'=>$row['username'], 'password'=>$row['password']];
}
function getSelectStudentGroup($conn, $student_id){
  $sql = "SELECT groups.group_id AS group_id, groups.number AS groupNumber
          FROM group_student_rel, groups
          WHERE student_id = $student_id
          AND groups.group_id = group_student_rel.group_id";
          $result = mysqli_query($conn, $sql);
          return $result;
}

//მასწავლებლის ფუნქციები

function getTeachers($conn){
  $sql = "SELECT teacher_id, first_name, last_name, teacher_show_id, city_id, number, mail, addres, status_id, datatime
          FROM teachers";
          $result = mysqli_query($conn, $sql);
          return $result;
}
function getTeachersProfile($conn, $teacher_id){
  $sql = "SELECT teacher_id, first_name, last_name, teacher_show_id, city_id, number, mail, addres, status_id
          FROM teachers
          WHERE teacher_id = $teacher_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['first_name'=>$row['first_name'], 'last_name'=>$row['last_name'], 'teacher_show_id'=>$row['teacher_show_id'],'city_id'=>$row['city_id'], 'number'=>$row['number'], 'mail'=>$row['mail'], 'addres'=>$row['addres'],
          'status_id'=>$row['status_id']];
}
function getTeachersGroup($conn, $teacher_id){
  $sql = "SELECT groups.group_id AS group_id, groups.number AS group_number
          FROM group_teacher_rel, groups
          WHERE teacher_id = $teacher_id
          AND groups.group_id = group_teacher_rel.group_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['group_id'=>$row['group_id'], 'group_number'=>$row['group_number']];
}
function editTeachersData($conn, $teacher_id){
  $sql = "SELECT first_name, last_name, teacher_show_id
          FROM teachers
          WHERE teacher_id= $teacher_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['first_name'=>$row['first_name'], 'last_name'=>$row['last_name'], 'teacher_show_id'=>$row['teacher_show_id']];
}
function editteachersUser($conn, $teacher_id){
  $sql = "SELECT username, password
          FROM users_teacher
          WHERE teacher_id = $teacher_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['username'=>$row['username'], 'password'=>$row['password']];
}
function hasTeacherGroup($conn, $group_id, $teacher_id){
  $sql = "SELECT group_id
          FROM group_teacher_rel
          WHERE teacher_id = $teacher_id
          AND group_id = $group_id";
          $result = mysqli_query($conn, $sql);
          return mysqli_num_rows($result);
}
function getGroupIdsByTeacherId($conn, $teacher_id){
  $sql = "SELECT group_id
          FROM group_teacher_rel
          WHERE teacher_id = $teacher_id";
          $result = mysqli_query($conn, $sql);
          return $result;
}

// ჯგუფის ფუნქციები

function getGroups($conn){
  $sql = "SELECT group_id, number
          FROM groups";
          $result = mysqli_query($conn, $sql);
          return $result;
}
function getCourseTitleByGroupId($conn, $group_id){
  $sql = "SELECT courses.course_id AS course_id, courses.title AS title
          FROM course_group_rel, courses
          WHERE group_id = $group_id
          AND courses.course_id = course_group_rel.course_id";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            return ['course_id'=>$row['course_id'],'title' => $row['title']];
          } else {
            return '';
          }
          
}

//კურსის ფუნქციები


function getCourses ($conn){
  $sql = "SELECT course_id, title
          FROM courses";
          $result = mysqli_query($conn, $sql);
          return $result;
}
function getCourseByGroupId($conn, $group_id){
  $sql ="SELECT course_id
        FROM course_group_rel
        WHERE group_id = $group_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return ['course_id'=>$row['course_id']];
}
function getCourseTitleBuCourseId($conn, $course_id){
  $sql = "SELECT title
          FROM courses
          WHERE course_id = $course_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['title'=>$row['title']];
}


// საგნის ფუნქციები

function getSubjects ($conn){
  $sql = "SELECT subject_id, title
          FROM subjects";
          $result = mysqli_query($conn, $sql);
          return $result;
}
function getTitleByCourseId($conn, $subject_id){
  $sql = "SELECT courses.course_id AS course_id, courses.title AS title
          FROM course_subject_rel, courses
          WHERE subject_id = $subject_id
          AND courses.course_id = course_subject_rel.course_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['course_id'=>$row['course_id'],'title' => $row['title']];
}

//მასწავლებლის/სტუდენტის გასაუქმებელი ფუნქციები

function studentSuspended ($conn, $student_id){
  $sql = "SELECT student_id
          FROM results
          WHERE student_id = $student_id";
          $result = mysqli_query($conn,$sql);
          return $result;
}
function teacherSuspended ($conn, $teacher_id){
  $sql = "SELECT teacher_id
          FROM tests
          WHERE teacher_id = $teacher_id";
          $result = mysqli_query($conn,$sql);
          return $result;
}

// ქალაქის ფუნქციები 
function getCity ($conn){
  $sql = "SELECT city_id, title
          FROM city";
          $result = mysqli_query($conn, $sql);
          return $result;
}
function getCityTitleFromStudents ($conn, $student_id){
  $sql = "SELECT city.city_id AS city_id, city.title AS city_title
          FROM city, students
          WHERE student_id = $student_id
          AND city.city_id = students.city_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['city_id'=>$row['city_id'], 'city_title'=>$row['city_title']];
        }
function getCityTitleFromTeachers ($conn, $teacher_id){
  $sql = "SELECT city.city_id AS city_id, city.title AS city_title
          FROM city, teachers
          WHERE teacher_id = $teacher_id
          AND city.city_id = teachers.city_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['city_id'=>$row['city_id'], 'city_title'=>$row['city_title']];
        }
//სტატუსის ფუნქციები

function getStatusByStudentId ($conn, $student_id){
  $sql = "SELECT status.status_id AS status_id, status.title AS status_title
          FROM status, students
          WHERE student_id = $student_id
          AND status.status_id = students.status_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['status_id'=>$row['status_id'], 'status_title'=>$row['status_title']];
        }
function getStatusByTeacherId ($conn, $teacher_id){
  $sql = "SELECT status.status_id AS status_id, status.title AS status_title
          FROM status, teachers
          WHERE teacher_id = $teacher_id
          AND status.status_id = teachers.status_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['status_id'=>$row['status_id'], 'status_title'=>$row['status_title']];
  }

// USERNAME | PASSWORD

function getTeacherUser($conn, $teacher_id){
  $sql = "SELECT username, password
          FROM users_teacher
          WHERE teacher_id = $teacher_id";
          $result = mysqli_query($conn, $sql);
          return $result;
          }
function getStudentUser($conn, $student_id){
  $sql = "SELECT username, password
          FROM users_student
          WHERE student_id = $student_id";
          $result = mysqli_query($conn, $sql);
          return $result;
          }


?>
