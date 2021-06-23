<?php 
//tsotne test new
require_once('conf.php'); 
require_once(BASE_DIR . '/data_management/connect/connect.php'); 
require_once(REFS_DIR . 'presets.php');

$mode = isset($_GET['mode']) ? $_GET['mode'] : '';

if( $mode == 'view' ) {
  require_once(REFS_DIR . 'header.php'); // references
}


$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
  //სტუდენტი
  case'student_form':
    require_once(ADMINISTRATOR_DIR . 'student_form.php');
  break;

  case'insert_student':
    require_once(CRUD_DIR . 'insert_student.php');
  break;

  case'students':
    require_once(ADMINISTRATOR_DIR . 'students.php');
  break;

  case 'students_preview':
    require_once(TEACHER_DIR . 'results/students_preview.php');
  break;
  //მასწავლებელი
  case 'teacher_form':
    require_once(ADMINISTRATOR_DIR . 'teacher_form.php');
  break;
  case'insert_teacher':
    require_once(CRUD_DIR . 'insert_teacher.php');
  break;

  case 'teachers':
    require_once(ADMINISTRATOR_DIR . 'teachers.php');
  break;

  //საგნები

  case 'subject_form':
    require_once(ADMINISTRATOR_DIR . 'subject_form.php');
  break;

  case 'subjects':
    require_once(ADMINISTRATOR_DIR . 'subjects.php');
  break;
  
  case 'insert_subject':
    require_once(CRUD_DIR . 'insert_subject.php');
  break;

  case 'delete_subject':
    require_once(CRUD_DIR . 'delete_subject.php');
  break;

   //ჯგუფები

  case 'group_form':
    require_once(ADMINISTRATOR_DIR . 'group_form.php');
  break;

  case 'groups':
    require_once(ADMINISTRATOR_DIR . 'groups.php');
  break;

  case 'insert_group':
    require_once(CRUD_DIR . 'insert_group.php');
  break;

  case 'delete_group':
    require_once(CRUD_DIR . 'delete_group.php');
  break;

  //კურსები

  case 'course_form':
    require_once(ADMINISTRATOR_DIR . 'course_form.php');
  break;

  case 'courses':
    require_once(ADMINISTRATOR_DIR . 'courses.php');
  break;

  case 'insert_course':
    require_once(CRUD_DIR . 'insert_course.php');
  break;

  case 'delete_course':
    require_once(CRUD_DIR . 'delete_course.php');
  break;

  //ტესტები _ კითხვა-პასუხი && ფოტოების დამატება
  // > folder_tests

  case 'test_list':
    require_once(TEACHER_DIR . 'tests/test-list.php');
  break;

  case 'test_insert':
    require_once(TEACHER_DIR . 'tests/test-insert.php');
  break;

  case 'test_delete':
    require_once(TEACHER_DIR . 'tests/test-delete.php');
  break;

  // > folder_questions

  case 'question_insert':
    require_once(TEACHER_DIR . 'questions/question-insert.php');
  break;

  case 'question_edit':
    require_once(TEACHER_DIR . 'questions/question-edit.php');
  break;

  case 'question_delete':
    require_once(TEACHER_DIR . 'questions/question-delete.php');
  break;

  case 'question_preview_insert':
    require_once(TEACHER_DIR . 'questions/question-preview-insert.php');
  break;

  case 'question_preview_edit':
    require_once(TEACHER_DIR . 'questions/question-preview-edit.php');
  break;

  case 'question_photo_delete':
    require_once(TEACHER_DIR . 'questions/question_photo_delete.php');
  break;

  //შედეგები

  case 'test_preview':
    require_once(TEACHER_DIR . 'results/test_preview.php');
  break;

  case 'result':
    require_once(TEACHER_DIR . 'results/results.php');
  break;

 //პროფილი
  
 // > სტუდენტი

  case 'student_profile':
    require_once(STUDENT_PROFILE_DIR . 'student_profile.php');
  break;

  case 'edit_student_profile':
    require_once(STUDENT_PROFILE_DIR . 'edit_student_profile.php');
  break;

  case 'edit_student_status':
    require_once(STUDENT_PROFILE_DIR . 'edit_student_status.php');
  break;

  case 'student_profile_preview':
    require_once(STUDENT_PROFILE_DIR . 'student_profile_preview.php');
  break;

  case 'delete_student':
    require_once(STUDENT_PROFILE_DIR . 'delete_student.php');
  break;

// > მასწავლებელი

  case 'teacher_profile':
    require_once(TEACHER_PROFILE_DIR . 'teacher_profile.php');
  break;

  case 'edit_teacher_profile':
    require_once(TEACHER_PROFILE_DIR . 'edit_teacher_profile.php');
  break;

  case 'edit_teacher_status':
    require_once(TEACHER_PROFILE_DIR . 'edit_teacher_status.php');
  break;

  case 'teacher_profile_preview':
    require_once(TEACHER_PROFILE_DIR . 'teacher_profile_preview.php');
  break;

  case 'delete_teacher':
    require_once(TEACHER_PROFILE_DIR . 'delete_teacher.php');
  break;

  default:
    require_once(BASE_DIR . 'home-page.php');
  break;
  
}


require_once(REFS_DIR . 'footer.php'); // references


?>

