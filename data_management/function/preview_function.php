<?php
/*function getGroups($conn, $teacher_id) {
  $sql = "SELECT group_id, number
          FROM groups
          WHERE groups.group_id = $teacher_id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  return ['group_id' => $row['group_id'], 'number' => $row['number']];
}
*/
function getCouseName($conn, $gId) {
  $sql = "SELECT 
    courses.title as cTitle
  FROM courses, course_group_rel 
  WHERE course_group_rel.group_id=$gId
  AND course_group_rel.course_id=courses.course_id";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);
  return $row['cTitle'];
}

function getTeacher($conn, $teacher_id){
  $sql = "SELECT first_name, last_name, teacher_show_id, photo
          FROM teachers
          WHERE teachers.teacher_id = $teacher_id";

          $result = mysqli_query($conn,$sql);

          $row = mysqli_fetch_assoc($result);
          return ['teacher_show_id' => $row['teacher_show_id'], 'first_name' =>$row['first_name'], 
          'last_name' =>$row['last_name'], 'photo' => $row['photo']];
} 
  function getGroupData($conn, $teacher_id) {
    $sql = "SELECT groups.group_id as gId, groups.number as gNumber
    FROM groups, group_teacher_rel  
    WHERE group_teacher_rel.teacher_id = $teacher_id
    AND group_teacher_rel.group_id = groups.group_id
    ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

      
    return $result; 
    
    } else {
      return false;
    }
  }
  function getGroupDataa($conn, $teacher_id) {
    $sql = "SELECT groups.group_id as gId, groups.number as gNumber
    FROM groups, group_teacher_rel  
    WHERE group_teacher_rel.teacher_id = $teacher_id
    AND group_teacher_rel.group_id = groups.group_id
    ";
    $result = mysqli_query($conn, $sql);
    
      $row = mysqli_fetch_assoc($result);
    return $row['gNumber']; 
    
    }
    //gadaketda raxan waishala group_subject_rel-table
    //getSubjects erqva da gadaketda getSubjectsBygroup_id raxan xels ushlidan administrator_function-s
    function getSubjectsByGroupId($conn, $gId){
      $sql = "SELECT subjects.subject_id as sId, subjects.title as sTitle
      FROM subjects,course_subject_rel, course_group_rel
      WHERE course_group_rel.group_id = $gId 
      AND course_group_rel.course_id = course_subject_rel.course_id
      AND course_subject_rel.subject_id = subjects.subject_id";
     

      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0){
        return $result;
      }
      else{
        return false;
      }
      
  }
  
function getTestData($conn, $test_id) {
 $sql = "SELECT 
          teacher_id,
          group_id,
          subject_id
         FROM tests
         WHERE test_id = $test_id";
         $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($result);
         return $row;
}

function getQuestionsByTestId($conn, $test_id) {
 $sql = "SELECT 
          question_id,
          head_line
         FROM questions
         WHERE test_id = $test_id";
         $result = mysqli_query($conn, $sql);
         return $result;
}

function getQDataById($conn, $qId){
 $sql = "SELECT 
          head_line,
          teacher_id,
          group_id,
          subject_id
         FROM questions
         WHERE question_id = $qId";
         $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($result);
         return $row;
}

function getQHeadlineById($conn, $qId){
 $sql = "SELECT head_line
         FROM questions
         WHERE question_id = $qId";
         $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($result);
         return $row['head_line'];
}

function getAnswersData($conn, $qId){
  $sql = "SELECT answer_id, body_text, is_correct 
          FROM answers
          WHERE question_id = $qId";
          $result = mysqli_query($conn, $sql);
          return $result;
}
function getIscorrect ($conn, $questions){
  $sql = "SELECT is_correct
          FROM answers
          WHERE question_id = $questions";
          $result =mysqli_query($conn, $sql);
          return $result;
}

function getQuestionIdsBytestId($conn, $test_id) {
  $sql = "SELECT question_id
          FROM questions
          WHERE test_id=$test_id";

  $result = mysqli_query($conn, $sql);
  return $result;
}

function getTestIdByQuestionId($conn, $question_id) {
  $sql = "SELECT test_id 
          FROM questions
          WHERE question_id=$question_id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  return $row['test_id'];
}

function getQuestionById($conn, $question_id) {
  $sql = "SELECT question_id, head_line
          FROM questions
          WHERE question_id = $question_id";
  $result = mysqli_query($conn, $sql);
  return $result;
}

//მასწავლებლის ტესტის ფოტოები

function getQuestionItemId($conn, $question_id){
  $sql = "SELECT item_id
          FROM photos_test
          WHERE item_id = $question_id";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0) { 
            $row = mysqli_fetch_assoc($result); 
            $item_id = $row['item_id'];
          }
          else {
            $item_id = '';
          }
          return ['item_id' => $item_id];
}
function getQuestionPhotos($conn, $question_item){
  $sql = "SELECT file_name
          FROM photos_test
          WHERE item_id = $question_item
          AND item_type_id = 1";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0) { 
            $row = mysqli_fetch_assoc($result); 
            $file_name = $row['file_name'];
          }
          else {
            $file_name = '';
          }
          return ['file_name' => $file_name];
}
function getAnswerItemId ($conn, $answer_id){
  $sql = "SELECT item_id
          FROM photos_test
          WHERE item_id = $answer_id";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0) { 
            $row = mysqli_fetch_assoc($result); 
            $item_id = $row['item_id'];
          }
          else {
            $item_id = '';
          }
          return ['item_id' => $item_id];
}
function getAnswersPhotos($conn, $answer_item){
  $sql = "SELECT file_name
          FROM photos_test
          WHERE item_id = $answer_item
          AND item_type_id = 2";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0) { 
            $row = mysqli_fetch_assoc($result); 
            $file_name = $row['file_name'];
          }
          else {
            $file_name = '';
          }
          return ['file_name' => $file_name];
}
function getAnswerIdByLastQuestionId($conn, $questionlastId){
  $sql = "SELECT answer_id
          FROM answers
          WHERE question_id = $questionlastId";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_assoc($result);
          return ['answer_id'=>$row['answer_id']];
}

// ფოტოების წაშლა 

function getAnswerId($conn, $question_id){
  $sql = "SELECT answer_id
          FROM answers
          WHERE question_id = $question_id";
          $result = mysqli_query($conn, $sql);
          return $result;
}

function getQuestionPhotoId($conn, $question_id){
  $sql = "SELECT file_name
          FROM photos_test
          WHERE item_id = $question_id";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0) { 
            $row = mysqli_fetch_assoc($result); 
            $file_name = $row['file_name'];
          }
          else {
            $file_name = '';
          }
          return ['file_name' => $file_name];
}
function getAnswerPhotoId($conn, $answer_id){
  $sql = "SELECT file_name
          FROM photos_test
          WHERE item_id = $answer_id";
          $result = mysqli_query($conn, $sql);
           if(mysqli_num_rows($result) > 0) { 
            $row = mysqli_fetch_assoc($result); 
            $file_name = $row['file_name'];
          }
          else {
            $file_name = '';
          }
          return ['file_name' => $file_name];
}

function fileUpload($conn, $file_ref, $field_index, $item_last_id, $item_type_id) {

  if(!empty($file_ref['name'][$field_index])) {
 
    $target_dir = TEST_PHOTO_DIR ;
    $target_file = $target_dir . basename($file_ref["name"][$field_index]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      $uploadedFileName = $file_ref['tmp_name'][$field_index];
      $fileName = $file_ref['name'][$field_index];
      // ფაილის სახელში "სივრცის" "ტირეთი" ჩანაცვლება
      $imageFileName = strtolower(pathinfo($target_file,PATHINFO_FILENAME));
      $fileNameCustom = str_replace ( ' ' ,'-', $imageFileName );
      // გაფართოების გამოცალკევებისთვის ფაილის სახელის დაყოფა წერტილის ნიშნით. მიღებული მასივის ბოლო ელემენტი იქნება ფაილის გაფართოება
      $finalName = $fileNameCustom . '-' . sprintf ( '%03d', 1 ) . '.' . $imageFileType;

      while ( is_file ( $target_dir . $finalName ) ) :
        // გაფართოების გამოცალკევებისთვის ფაილის სახელის დაყოფა წერტილის ნიშნით. მიღებული მასივის ბოლო ელემენტი იქნება ფაილის გაფართოება
        $fileNameNum = substr ( pathinfo($target_dir . $finalName, PATHINFO_FILENAME), -3, 3 );
        $fileNameNum++;
        $fileNameNum = sprintf ( '%03d', $fileNameNum );
        $fileName = $fileNameCustom . '-' .  $fileNameNum;
        $finalName = $fileName . '.' . $imageFileType;
      endwhile;

      $modified_target_file = $target_dir . $finalName;



    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($file_ref["tmp_name"][$field_index]);
      if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size
    if ($file_ref["size"][$field_index] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($file_ref["tmp_name"][$field_index], $modified_target_file)) {
          echo "<p>The file ". $finalName. " has been uploaded.</p>";

         $sql = "INSERT INTO photos_test (file_name, item_id, item_type_id)
         VALUES ('" . $finalName . "', '$item_last_id', '$item_type_id')";
         if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);

      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  } else {
    //echo  'empty: ' . $field_index . '<br>';
  }
}

function fileUploadOnEdit($conn, $file_refs, $item_ids, $item_type_id) {
  
  for ($i=0; $i < count($file_refs['name']); $i++) :
    if(!empty($file_refs['name'][$i])) {
      $item_id = $item_ids[$i];
      $target_dir = TEST_PHOTO_DIR ;
      $target_file = $target_dir . basename($file_refs["name"][$i]);
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $uploadedFileName = $file_refs['tmp_name'][$i];
        $fileName = $file_refs['name'][$i];
        // ფაილის სახელში "სივრცის" "ტირეთი" ჩანაცვლება
        $imageFileName = strtolower(pathinfo($target_file,PATHINFO_FILENAME));
        $fileNameCustom = str_replace ( ' ' ,'-', $imageFileName );
        // გაფართოების გამოცალკევებისთვის ფაილის სახელის დაყოფა წერტილის ნიშნით. მიღებული მასივის ბოლო ელემენტი იქნება ფაილის გაფართოება
        $finalName = $fileNameCustom . '-' . sprintf ( '%03d', 1 ) . '.' . $imageFileType;

        while ( is_file ( $target_dir . $finalName ) ) :
          // გაფართოების გამოცალკევებისთვის ფაილის სახელის დაყოფა წერტილის ნიშნით. მიღებული მასივის ბოლო ელემენტი იქნება ფაილის გაფართოება
          $fileNameNum = substr ( pathinfo($target_dir . $finalName, PATHINFO_FILENAME), -3, 3 );
          $fileNameNum++;
          $fileNameNum = sprintf ( '%03d', $fileNameNum );
          $fileName = $fileNameCustom . '-' .  $fileNameNum;
          $finalName = $fileName . '.' . $imageFileType;
        endwhile;

        $modified_target_file = $target_dir . $finalName;


      // Check if image file is a actual image or fake image
        $check = getimagesize($file_refs["tmp_name"][$i]);
        if($check !== false) {
          //echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }

      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }

      // Check file size
      if ($file_refs["size"][$i] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($file_refs["tmp_name"][$i], $modified_target_file)) {
            echo "<p>The file ". $finalName. " has been uploaded.</p>";

          $sql = "INSERT INTO photos_test (file_name, item_id, item_type_id)
          VALUES ('" . $finalName . "', '$item_id', '$item_type_id')";
          if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);

        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
    } else {
      //echo  'empty: ' . $field_index . '<br>';
    }
  endfor;
}

?>