<?php 
require_once('../../../data_management/connect/connect.php');
require_once('../../../data_management/function/function.php');
$teacher_id = isset($_GET['student']) ? $_GET['student'] : '';
$sData = getStudentList($conn,$teacher_id); //მასივი სტუდენტის მონაცემები (studentShow)
$student_show_id = $sData['student_show_id'];
$first_name = $sData['first_name'];
$last_name = $sData['last_name'];
$photo = $sData['photo'];



$gData = getGroupData($conn, $teacher_id); // მასივი ჯგუფის მონაცემებით (id, number)
$gId = $gData[0];
$gNumber = $gData[1];
$cData = getCourseData($conn, $gId); // მასივი კურსის მონაცემებით (id, title)
$cId = $cData[0];
$cTitle = $cData[1];
$sList = getSubjectsData($conn, $cId);


?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
      <title>Document</title>
   </head>
   <body class="backgroundcolor">
      <main>
         <article class="student-infotengo">
            <div class="flextengo">
               <div class="lefttengo">
                  <div class="leftwraptengo">

                  
                  <div class="privateinfotengo">
                     <!-- <div class="imgwrap"> -->
                        <img src="../img/person.jpg" alt="person" class="persontengo">
                     <!-- </div> -->
                     <!-- end of imgwrap -->
                     <div class="anonymoustengo">
                        <div class="infowraptengo">
                        <a href="#">
                           <p class="group2tengo">ჯგუფი: <?php echo $gNumber?></p>
                           <p class="id2tengo">ID: <?php echo $student_show_id?></p>
                        </a>
                        </div>
                        <!-- end of infowrap -->
                     </div>
                     <!-- end of anonymous -->
                  </div>
                  <!-- end of privateinfo -->
                  <div class="infotengo">
                  <a href="#">
                     <p class="firstnametengo"><?php echo $first_name?></p>
                     <p class="surnametengo"> <?php echo $last_name?></p>
                     <p class="proffesiontengo"><?php echo $cTitle?></p>
                  </a>
                  </div>
                  <!-- end of info -->
                  </div>
                  <!-- end of leftwrap -->
               </div>
               <!-- end of left -->
               <div class="righttengo">
                  <div class="rightwraptengo">
                         <?php 
               while($row = mysqli_fetch_assoc($sList)):
                   $subject_id = $row['subject_id'];
                   $subject_title = $row['title'];
                  if ($test_id = getTestIdBySubjectId ($conn, $subject_id, $gId)) :
                      

                  ?>
                     <?php if($result = returnResult ($conn, $teacher_id, $test_id)) {?>

                  <div class="text-png">
                    <a href="<?php echo BASE_URL; ?>test/result.php?test=<?php echo $test_id; ?>&student=<?php echo $teacher_id ?>" class="javascripttengo" ><?php echo $subject_title; ?></a>
                     
                  </div>

               <?php } else {?>
                  <div class="text-png">
                    <a href="<?php echo BASE_URL; ?>test/index.php?test=<?php echo $test_id; ?>&student=<?php echo $teacher_id?>" class="javascripttengo"><?php echo $subject_title; ?></a>
                     
                  </div>
               <?php }?>

                  <?php 
                  endif;
               endwhile; ?>
                     
                    
                  </div>
                  <!-- end of rightwrap -->
               </div>
               <!-- end of right -->
            </div>
            <!-- end of flex -->
            
               <a href="#" class="leavetengo">
                  გასვლა
               </a>
            
            <!-- leftbtn -->
         </article>
         <!-- end of article -->
      </main>
   </body>
</html>