<?php 
function getStudentId($conn, $student_id){
  $sql = "SELECT firstName 
          FROM students 
  		    WHERE students.student_id = $student_id";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_assoc($result);
          return ['firstName' =>$row['firstName']];
}

function getGroupData($conn, $student_id){
	$sql = "SELECT groups.group_id AS gId
    			FROM groups,group_student_rel
    			WHERE group_student_rel.group_id =$student_id
    			AND group_student_rel.group_id=groups.group_id";
    			$result = mysqli_query($conn, $sql);
    			$row = mysqli_fetch_assoc($result);
    			return ['gId' => $row['gId']];
	}
/*function getSubjects($conn, $sId){
    $sql = "SELECT subjects.subjectId as sId
    FROM subjects,group_subject_rel
    WHERE group_subject_rel.group_id = $sId 
    AND group_subject_rel.subjectId = subjects.subjectId";
   

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
      return $result;
    }
    else{
      return false;
    }
  }*/
  	/*function getQuestionData($conn, $gId, $subjectId){
  		$sql = "SELECT question_id, head_line 
  				FROM questions
  				WHERE group_id = $gId
          AND subjectId = $subjectId";

  				$result = mysqli_query($conn, $sql);
  				
  				return $result;

  	}*/
function getQuestionData($conn, $test_id){
  $sql = "SELECT question_id, head_line 
          FROM questions
          WHERE test_id = $test_id";
          $result = mysqli_query($conn, $sql);
          return $result;
  }

function getAnswersData($conn, $qId){
  $sql = "SELECT body_text, answer_id 
          FROM answers
          WHERE question_id = $qId";
          $result = mysqli_query($conn, $sql);
          return $result;
  }
//chasworeba
function insertResults($conn, $question_id, $answer_id, $student_id, $test_id) {
  $sql = "INSERT INTO results (question_id, answer_id, student_id, test_id)
  VALUES ('$question_id', '$answer_id', '$student_id', '$test_id')";

    if (!mysqli_query($conn, $sql)) {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

function returnResult($conn, $student_id){
  $sql = "SELECT question_id, answer_id
          FROM results
          WHERE student_id = $student_id";
          $result = mysqli_query($conn, $sql);
          return $result;
 }
function getQHeadlineById($conn, $qId){
  $sql = "SELECT head_line
          FROM questions
          WHERE question_id = $qId";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return $row['head_line'];
 }
 function getABodytextById ($conn, $aId){
  $sql ="SELECT body_text
          FROM answers
          WHERE answer_id = $aId";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return $row['body_text'];
 }
function isCorrect ($conn, $qId){
  $sql ="SELECT is_correct
         FROM answers
         WHERE question_id = $qId";
         $result = mysqli_query ($conn, $sql);
         $row = mysqli_fetch_assoc($result);
         return $row['is_correct'];
  }
function correctAnswers ($conn, $student_id, $test_id) {
  $sql = "SELECT COUNT(results.answer_id) AS correctAnswers 
          FROM answers, results
          WHERE results.answer_id = answers.answer_id
          AND answers.is_correct = 1
          AND results.student_id = $student_id
          AND results.test_id = $test_id";
          $result = mysqli_query ($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return $row['correctAnswers'];
  }
 function sum($correctAnswers){
          $totalQuestion =30; //kitxvebis raodenoba
          $passLimit = 50;
          $result = $correctAnswers ? ($totalQuestion / $correctAnswers) * 100 : 0;
            if ($result >=  $passLimit){
              echo $correctAnswers;
            }
            else{
              echo $correctAnswers;
            }
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
function result($conn, $student_id){
    $sql = "SELECT test_id
            FROM results
            WHERE student_id = $studnetId";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0){
            return $result;
            }
            else{
              return false;
            }
  }
function getTestData($conn, $test_id){
  $sql = "SELECT subject_id, group_id
          FROM tests
          WHERE test_id = $test_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return $row;
  }
function getSubjectTitle($conn, $subject_id){
  $sql = "SELECT title 
          FROM subjects
          WHERE subject_id = $subject_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return $row['title'];
  }
function getGroupNumber($conn, $group_id){
  $sql = "SELECT number 
          FROM groups
          WHERE group_id = $group_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return $row['number'];
}
function getAnswerMode($conn, $question_id){
  $sql = "SELECT answer_mode
          FROM questions
          WHERE question_id = $question_id";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['answer_mode'=>$row['answer_mode']];
}
function getQuestionIdBytestId($conn, $test_id){
  $sql = "SELECT question_id
          FROM questions
          WHERE test_id = $test_id
          AND answer_mode = 3";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          return ['question_id'=>$row['question_id']];
  }
function getAnswerIdByQuestionId($conn, $question_id){
  $sql = "SELECT answer_id
          FROM answers
          WHERE question_id = $question_id";
          $result = mysqli_query($conn, $sql);
          return $result;
  }
?>