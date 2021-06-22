<?php

define('TEST_BASE_DIR', '/project/');

define( 'BASE_URL', ( !empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . TEST_BASE_DIR );

define('BASE_DIR', $_SERVER['DOCUMENT_ROOT'] . TEST_BASE_DIR);

define('REFS_DIR', $_SERVER['DOCUMENT_ROOT'] . TEST_BASE_DIR . 'refs/');

define('ADMINISTRATOR_DIR', $_SERVER['DOCUMENT_ROOT'] . TEST_BASE_DIR . 'pages/administrator_page/');

define('TEACHER_DIR', $_SERVER['DOCUMENT_ROOT'] . TEST_BASE_DIR . 'pages/teacher_page/');

define('CRUD_DIR', $_SERVER['DOCUMENT_ROOT'] . TEST_BASE_DIR . 'pages/CRUD/');

define('FUNCTION_DIR', $_SERVER['DOCUMENT_ROOT'] . TEST_BASE_DIR . 'data_management/function/');

define('STUDENT_PROFILE_DIR', $_SERVER['DOCUMENT_ROOT'] . TEST_BASE_DIR . 'pages/profile/student_profile/');

define('TEACHER_PROFILE_DIR', $_SERVER['DOCUMENT_ROOT'] . TEST_BASE_DIR . 'pages/profile/teacher_profile/');

define('CONF_DIR', $_SERVER['DOCUMENT_ROOT'] . TEST_BASE_DIR);

define('TEST_PHOTO_DIR', $_SERVER['DOCUMENT_ROOT'] . TEST_BASE_DIR . 'img/photos_test/');

function urlGenerator( $params ) // associated array
{
  $url = BASE_URL . '?';
  foreach ($params as $key => $value) {
    $url .= $key . '=' . $value . ( ( $key === array_key_last( $params ) ) ? '' : '&' );
  }

  echo $url;
}

?>