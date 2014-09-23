<?php

include "cxn.php";
error_reporting(0);
session_start();
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];

$cid=$_GET['c'];
$sql1="SELECT * FROM teacher WHERE cid='$cid' ";
$result1=mysql_query($sql1);

      $row=mysql_fetch_assoc($result1);
      $instructor_id=$row['tid'];

$sql3="SELECT * FROM courses WHERE cid='$cid' ";
$result3=mysql_query($sql3);

      $row3=mysql_fetch_assoc($result3);
      $c_name=$row3['name'];
$c_detail=$row3['details'];
$credits=$row3[credits];
$c_fee=$row3['fee'];
$fee=$c_fee.'INR';
$language=$row3['language'];
$hours=$row3['hours'];
$evaluation=$row3['evaluation'];
$syllabus=$row3['syllabus'];
$sql2="SELECT * FROM users WHERE id='$instructor_id' ";
$result2=mysql_query($sql2);

      $row2=mysql_fetch_assoc($result2);
      $t_name='Dr. '.$row2['name'];

$query6="SELECT * FROM quiz WHERE cid='$cid'";
$result6=mysql_query($query6);
$num_q=mysql_num_rows($result6);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Doorado</title> 
   <meta name="description" content= ""  />
        <meta name="keywords" content="" />         
      <!-- Google Webfonts and our stylesheet -->
        <link rel="stylesheet" type="text/css" href="style.css"> 
         <link rel="stylesheet" type="text/css" href="main.css"> 
           <style type="text/css">
      body {
     background-color:#e4e4e4;
       
      }
    </style>

<!--  jQuery 1.7+  -->
<script src="jquery.js"></script>
<link rel="shortcut icon" type="/image/x-icon" href="favicon.png" />
</head>
  <body>
    <?php include "headbar.php"; ?>
    <div id="main" class="card" >


      <div id="feature-image" >
<img src="iiit.jpg" id="fi"/>
</div>
<div id="info-area">
  <img src="logo.png" width="100"/><br>
  <h3><?php echo $cid;?></h3>
  <h3><?php echo $credits.' Credits';?></h3>
  <div style="position:absolute; width:60%;top:120px; right:-20px; font-size:20px; float:right;"> <!--if user has already joined -->
<a href="instructor_course.php?c=<?php echo $cid;?>" style="text-decoration:none; color:#FFF;margin-right:10px;<?php if(!isset($_GET['discussion']) && !isset($_GET['live']) && !isset($_GET['resources']) && !isset($_GET['grades']) )
{
  echo "border-bottom: 3px solid red";
} ?>">About</a>

<a href="instructor_course.php?c=<?php echo $cid;?>&discussion" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['discussion']))
{
  echo "border-bottom: 3px solid red";
} ?>">Discussion</a>

<a href="instructor_course.php?c=<?php echo $cid;?>&live" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['live']))
{
  echo "border-bottom: 3px solid red";
} ?>">Live Class</a>

<a href="instructor_course.php?c=<?php echo $cid;?>&resources" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['resources']))
{
  echo "border-bottom: 3px solid red";
} ?>">Resources</a>
<a href="instructor_course.php?c=<?php echo $cid;?>&assignments" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['assignments']))
{
  echo "border-bottom: 3px solid red";
} ?>">Assignments</a>
<a href="instructor_course.php?c=<?php echo $cid;?>&quizzes" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['quizzes']))
{
  echo "border-bottom: 3px solid red";
} ?>">Quizzes</a>
<a href="instructor_course.php?c=<?php echo $cid;?>&grades" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['grades']))
{
  echo "border-bottom: 3px solid red";
} ?>">Grades</a>

    </div>


</div>
<div class="half" style="margin-right:28px; position:relative;">
 <h2><?php echo $c_name;?></h2>
 <p>
<?php echo $c_detail;?>
 </p>
 </div> 
 <div class="half" style="margin-right:28px; position:relative;">
<h2>Course at a glance</h2>
<img src="icon/cal.png" width="15"/> <?php echo $fee;?>  <br>
<img src="icon/clock.png" width="15"/> <?php echo $hours;?>  <br>
<img src="icon/globe.png" width="15"/> <?php echo $language;?> 

 </div>  
    </div>
<?php if(!isset($_GET['discussion']) && !isset($_GET['live'])  && !isset($_GET['resources']) && !isset($_GET['assignments']) && !isset($_GET['quizzes']) && !isset($_GET['grades'])) { ?> 
   
 <center>
  <div style="margin-top:20px;">
  <br>
  <button class="btn btn-primary" style="width:20%"> Edit Course</button>
    </div>

    </center>  
    
    
    <div id="main" class="card" style="margin-top:20px;">

<div class="half" style="margin-right:28px; position:relative;">


<h2>Evaluation</h2>
<?php echo $evaluation; ?>
<hr>
 

</div> 
 <div class="half" style="margin-right:28px; position:relative;">
<h2>Instructor </h2>
<a href="#"><?php echo $t_name;?> </a>
<br>
<h2>Texts </h2>

 </div>  
    </div>
      <div id="main" class="card " style="margin-top:20px;">

        <center><h2>Course Syllabus</h2></center>
<?php echo $syllabus; ?>
        
      </div>
      <?php }

else if(isset($_GET['live'])){ ?>
  <div id="main" class="card live_hack" style="margin-top:20px;">

</div>
<?php } 
else if(isset($_GET['discussion'])){ ?>
  <div id="main" class="card " style="margin-top:20px;">

</div>
<?php }
else if(isset($_GET['assignments'])){ ?>
  <div id="main" class="card " style="margin-top:20px;">
<a href="">+ Add Assignment</a>
</div>

<?php }
else if(isset($_GET['quizzes'])){ ?>
  <div id="main" class="card " style="margin-top:20px;">
    <?php $i=0;
    while($i<$num_q)
{
  $q_id=mysql_result($result6,$i,"qid");
?>
<a href="" style="margin-right:10px;" ><?php echo $q_id;?></a><br>
<?php
$i++;
}?>
<a href="new_quiz.php?c=<?php echo  $cid;?>" style="margin-right:10px;" >+ Create Quiz</a>
</div>

<?php }
else if(isset($_GET['resources'])){ ?>
  <div id="main" class="card " style="margin-top:20px;">
    <h4>Add Resources</h4>
<input type="file" name="file" /><br>
<button class="btn btn-danger">Upload File</button>
</div>
<?php } ?>
    

    <footer>
<center><br><span style="font-size: 30px;
font-weight: 700; ">Doorado</span><br> Doorado is an educational software, developed at IIIT-Delhi
</center>
    </footer>
    <script type="text/javascript">
$( ".live_hack" ).load( "https://appear.in/2387" );

    </script>
      </body>
  </html>