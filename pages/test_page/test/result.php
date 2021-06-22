<?php 
require_once('../../../data_management/connect/connect.php');
require_once('../../../data_management/function/test_function.php');
$question = isset($_POST['question']) ? $_POST['question'] : [] ; //array
$student_id = isset($_GET['student']) ? $_GET['student'] : '';
$subject_id = isset($_GET['subject']) ? $_GET['subject'] : '';
$test_id = isset($_GET['test']) ? $_GET['test'] : '';

$sData = getStudentList($conn,$student_id); //მასივი სტუდენტის მონაცემები (studentShow)
$student_show_id = $sData['student_show_id'];
$first_name = $sData['first_name'];
$last_name = $sData['last_name'];
$photo = $sData['photo'];

	
$correctAnswers = correctAnswers ($conn, $student_id, $test_id); //ჩასწორება 06.05

?>
<!DOCTYPE html>
<html>
<head>
	<title>ბიზნესისა და ტექნოლოგიების აკადემია</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="backgroundcolor">
	<div class="auth-bindermaya2">
	<div class="wrappermaya2">
		<div class="identationmaya2">
			<img src="../img/bta.png" width="80" class="imgmaya2">
			 <div class="academymaya2">
				<h1 class="title2maya2">ბიზნესისა და ტექნოლოგიების აკადემია</h1>
				<?php

$returnResult = returnResult($conn, $student_id);                             
	 while ($row = mysqli_fetch_assoc($returnResult)) :

	  $question_id = $row['question_id'];
	  $answer_id = $row['answer_id'];


	  $qHeadline = getQHeadlineById ($conn, $question_id);
	  $aBodytext = getABodytextById ($conn, $answer_id);
	  $is_correct = isCorrect($conn, $question_id); 
?>


<?php 
  endwhile;
 
?>
        <p class="resultmaya2">შედეგი : <?php sum($correctAnswers); ?></p>
			</div><!-- and of academy -->
		</div><!-- // end of .identation -->
        <div class="authenticationmaya2">
<a href="<?php echo BASE_URL; ?>student_page/index.php?student=<?php echo $student_id?>" class="subbtngio">მთავარი</a>
        </div>
  </div><!-- wrapper -->
</body>
</html>
