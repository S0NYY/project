<?php

require_once(FUNCTION_DIR . 'preview_function.php');


$test_id = isset($_GET['test']) ? $_GET['test'] : '';
$teacher_id = isset($_GET['teacher']) ? $_GET['teacher'] : '';
$question_id = isset($_GET['question']) ? $_GET['question'] : '';

$getQuestionPhotoId = getQuestionPhotoId($conn, $question_id);
$questionFileName = $getQuestionPhotoId['file_name'];
$target_dir = TEST_PHOTO_DIR . $questionFileName;

//if( $questionFileName && is_dir ( $target_dir ) ) {
	if (!unlink($target_dir)) {
		echo 'ფოტო( ID -'. $question_id .') არ არის';

	}else{
		echo 'წაიშალა';
	}
//}

$getAnswerId = getAnswerId($conn, $question_id);
	while($row = mysqli_fetch_assoc($getAnswerId)){
	$answer_id = $row['answer_id'];

	$getAnswerPhotoId = getAnswerPhotoId($conn, $answer_id);
	$answerFileName = $getAnswerPhotoId['file_name'];
	$target_dir = TEST_PHOTO_DIR . $answerFileName ;

	//if( $answerFileName && is_dir ( $target_dir ) ){
		if (!unlink( $target_dir )) {
		echo 'ფოტო( ID -'. $answer_id .') არ არის';

		}else{
			echo 'წაიშალა';
		}
	//}
$sql = "DELETE FROM photos_test WHERE item_id = $answer_id";
if (!mysqli_query($conn, $sql)) {
	echo "Error updating record: " . mysqli_error($conn);
}
}


$sql = "DELETE FROM photos_test WHERE item_id = $question_id";

if (!mysqli_query($conn, $sql)) {
	echo "Error updating record: " . mysqli_error($conn);
}

//პასუხების წაშლა

$sql = "DELETE FROM answers WHERE question_id = $question_id";
if (!mysqli_query($conn, $sql)) {
	echo "Error updating record: " . mysqli_error($conn);
}

//კითხვების წაშლა

$sql = "DELETE FROM questions WHERE question_id = $question_id";
if (!mysqli_query($conn, $sql)) {
	echo "Error updating record: " . mysqli_error($conn);
}

header('location:'. BASE_URL . '?mode=view&page=question_preview_insert&test=' . $test_id . "&teacher=" . $teacher_id);
mysqli_close($conn);

?>	