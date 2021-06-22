
<?php
require_once('../../connect/connect.php');
require_once('../../function/preview_function.php');

$teacher_id = isset($_GET['teacher']) ? $_GET['teacher'] : '';

$tData = getTeacher($conn, $teacher_id); //მასივი მასწავლებლოს მონაცემებით (id ,fistName, lastName,teacherShowId)
$first_name = $tData['first_name'];
$last_name = $tData['last_name'];
$teacher_show_id = $tData['teacher_show_id'];
$gData = getGroupData($conn, $teacher_id);


?>
<!DOCTYPE html>
<html>
<head>
  <title>ტესტის შექმნა</title>
  <meta charset="utf-8">
</head>
<body>
<h1>ტესტის შექმნა</h1>
<form action="test-insert.php?teacher=<?php echo $teacher_id?>"  method="post">
  <fieldset>
  <div class="row">
      
      
     <nav>
       <ul>
         <li><a href="test-list.php?teacher=<?php echo $teacher_id ?>">მთავარი</a></li>
       </ul>
     </nav>
        
<p>მასწავლებელი :<?php echo $first_name . " " . $last_name . " " . $teacher_show_id?></p>            
      
    </div>

       <div class="row">
      <label for="group">ჯგუფი</label> 
      <div>
        <select name="group" id="group" onchange="submitForm(this)">
      
          <?php

          $default_gId = isset($_GET['group']) ? $_GET['group'] : 0;
          while($row = mysqli_fetch_assoc($gData)) :
            $gId = $row['gId']; 
            $gNumber = $row['gNumber']; 
            if (!$default_gId) {   
              $default_gId = $gId;
            }
            if($default_gId == $gId) { 
              $selected = 'selected="selected" '; 
            } else {
              $selected = '';
            }
          ?>
            <option <?php echo $selected; ?>value="<?php echo $gId ?>"><?php echo $gNumber ?></option>
            <?php
            endwhile;
            ?>

        
        </select>
      </div>
           
      
    </div>

    <div class="row">
      <label for="subject">საგანი</label> 
      <select name="subject" id="subject">
        <?php
        $subjects = getSubjects($conn, $default_gId);
          
          if ($subjects) :
              while($row = mysqli_fetch_assoc($subjects)) :
            $sId = $row['sId'];
            $sTitle = $row['sTitle'];
            ?>
            <option value="<?php echo $sId ?>"><?php echo $sTitle ?></option>
            <?php
            endwhile;
          endif;
        ?>
      </select>
    </div>
    <br>

    <input type="submit" value="ტესტის შექმნა">
    
  </fieldset>
</form>
<?php mysqli_close($conn); ?>
<script>
  function submitForm(el) {
    const group = el.value;
    const queryString = window.location.search; 
    const urlParams = new URLSearchParams(queryString); 
    const teacher = urlParams.get('teacher'); 
    const url = '?teacher=' + teacher + '&' + 'group=' + group;
    window.location = url; 

  }
</script>
</body>
</html>