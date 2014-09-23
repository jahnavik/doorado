<?php

include "cxn.php";

session_start();
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];
$tbl_name="courses";
$query="SELECT * FROM $tbl_name";
$result=mysql_query($query);
$num=mysql_num_rows($result);



$rand=rand(11,500000);
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
   

<?php
  $i=0;
while ($i<$num)
{
$c_id=mysql_result($result,$i,"cid");
$course_name=mysql_result($result,$i,"name");
$course_detail=mysql_result($result,$i,"details");

 ?>
  <div id="main" class="card" >
<div class="half" style="margin-right:28px; position:relative;">
 <h2><a href="course.php?c=<?php echo $c_id;?>"><?php echo $course_name; ?></a> </h2>
 <p> <?php echo $course_detail; ?></p>
 </div> 
 <div class="half" style="margin-right:28px; top:60px; position:relative;">
<button class="btn btn-primary" style=" position:absolute; width:20%; right:3%;" > Join</button>
<img src="icon/cal.png" width="15"/> January – April 2014  <br>
<img src="icon/clock.png" width="15"/> 3-5 hours of work/day <br>
<img src="icon/globe.png" width="15"/> English

 </div>  
    </div>

 <center>
  <div style="margin-top:20px;">
  <br>
  
    </div>

    </center>  
    
 <?php 
 $i++;
 }
 ?>   
 <!--       <div id="main" class="card" style="margin-top:20px;">

<div class="half" style="margin-right:28px; position:relative;">


 <h2>Critical Thinking</h2>
 <p>
This course introduces the learner to the fundamentals of critical thinking and informal logic. We will use a ‘mixed’ instructional methodology that includes lecture, Q&A, learning team activities, discussion of videos, slides, print articles and the text.
 </p>
 </div> 
 <div class="half" style="margin-right:28px; top:60px; position:relative;">
<button class="btn btn-primary" style=" position:absolute; width:20%; right:3%;" > Join</button>
<img src="icon/cal.png" width="15"/> January – April 2014  <br>
<img src="icon/clock.png" width="15"/> 3-5 hours of work/day <br>
<img src="icon/globe.png" width="15"/> English

 </div>  
    </div>
        <div id="main" class="card" style="margin-top:20px;">
 <div class="half" style="margin-right:28px; position:relative;">
 <h2>Critical Thinking</h2>
 <p>
This course introduces the learner to the fundamentals of critical thinking and informal logic. We will use a ‘mixed’ instructional methodology that includes lecture, Q&A, learning team activities, discussion of videos, slides, print articles and the text.
 </p>
 </div> 
 <div class="half" style="margin-right:28px; top:60px; position:relative;">
<button class="btn btn-primary" style=" position:absolute; width:20%; right:3%;" > Join</button>
<img src="icon/cal.png" width="15"/> January – April 2014  <br>
<img src="icon/clock.png" width="15"/> 3-5 hours of work/day <br>
<img src="icon/globe.png" width="15"/> English

 </div>  
    </div>
  
    </div>
<div id="main" class="card" style="margin-top:20px;">

<div class="half" style="margin-right:28px; position:relative;">


 <h2>Critical Thinking</h2>
 <p>
This course introduces the learner to the fundamentals of critical thinking and informal logic. We will use a ‘mixed’ instructional methodology that includes lecture, Q&A, learning team activities, discussion of videos, slides, print articles and the text.
 </p>
 </div> 
 <div class="half" style="margin-right:28px; top:60px; position:relative;">
<button class="btn btn-primary" style=" position:absolute; width:20%; right:3%;" > Join</button>
<img src="icon/cal.png" width="15"/> January – April 2014  <br>
<img src="icon/clock.png" width="15"/> 3-5 hours of work/day <br>
<img src="icon/globe.png" width="15"/> English

 </div>  
   --> </div>
      



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