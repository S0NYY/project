<?php 
require_once(FUNCTION_DIR . 'preview_function.php');

$question_id =isset($_GET['question']) ? $_GET['question']: '';
$answer_id =isset($_GET['answer']) ? $_GET['answer']: '';

if ($answer_id) {
	echo $answer_id;

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
			$sql = "DELETE FROM photos_test WHERE item_id=$answer_id";
			if (!mysqli_query($conn, $sql)) {
				echo "Error updating record: " . mysqli_error($conn);
			}
		
}

else{

$getQuestionPhotoId = getQuestionPhotoId($conn, $question_id);
$questionFileName = $getQuestionPhotoId['file_name'];
$target_dir = TEST_PHOTO_DIR . $questionFileName;
if( $questionFileName && is_dir ( $target_dir ) ) {
	if (!unlink($target_dir)) {
		echo 'ფოტო( ID -'. $question_id .') არ არის';

	}else{
		echo 'წაიშალა';
	}
}
$sql = "DELETE FROM photos_test WHERE item_id=$question_id";

if (!mysqli_query($conn, $sql)) {
	echo "Error updating record: " . mysqli_error($conn);
}
echo $questionFileName;

}
?>