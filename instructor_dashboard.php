
<?php

include "cxn.php";

session_start();
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];
$tbl_name="courses";



      


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
     <!-- Important Owl stylesheet -->
<link rel="stylesheet" href="owl-carousel/owl.carousel.css">
 
<!-- Default Theme -->
<link rel="stylesheet" href="owl-carousel/owl.theme.css">
 
<!--  jQuery 1.7+  -->
<script src="jquery.js"></script>

<script src="owl-carousel/owl.carousel.js"></script>
<link rel='stylesheet' type='text/css' href='fullcalendar/fullcalendar/fullcalendar.css' />
<script type='text/javascript' src='fullcalendar/fullcalendar/fullcalendar.js'></script>

<link rel="shortcut icon" type="/image/x-icon" href="favicon.png" />
</head>
  <body>
    <?php include "headbar.php"; ?>
<div id="left-dash">
  <a id="dash-item" href="#profile">
    <img src="icon/profile.png" width="40">
  </a> <br><br><br>
    <a id="dash-item" href="#course">
        <img src="icon/course.png" width="40">
  </a><br><br><br>
    
    <a id="dash-item" href="#bulletin">
        <img src="icon/bulletin.png" width="40">
  </a><br><br><br>
    
</div>
<div id="right-dash">
  <a name="profile"></a>
   <div id="main" class="card" style="margin-top:50px;">
<h2>Profile</h2>
<hr>
<strong>Name:</strong> <br>
<strong>Email ID:</strong> <br>
<strong>Phone:</strong><br>
<strong>Total Courses:</strong>
   </div>
    <a name="course"></a>
    <div id="main" class="card" style="margin-top:20px;">
<h2>Courses</h2>
<hr>
<?php
$sql1="SELECT * FROM users WHERE email='$email' ";
$result1=mysql_query($sql1);

      $row=mysql_fetch_assoc($result1);
      $tid=$row['id'];
$sql2="SELECT * FROM teacher natural join(courses) WHERE tid='$tid' ";


$result2=mysql_query($sql2);
$num_courses=mysql_num_rows($result2);
$i=0;
while ($i<$num_courses ) {
  
$cid=mysql_result($result2,$i,"cid");

$c_name=mysql_result($result2,$i,"name");
$c_detail=mysql_result($result2,$i,"details");
?>
 <a href="instructor_course.php?c=<?php echo $cid;?>"><?php echo $c_name; ?></a> <br>
<?php
$i++;
}
?> 
 <a href="#">+ Add New Course</a> <br>
   </div>
    <a name="deadline"></a>
    <div id="main" class="card" style="margin-top:20px;">
<h2>Bulletin</h2>

   </div>
  </div>



    <script type="text/javascript">
$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        // put your options and callbacks here
    })

});
</script>

      </body>
  </html>