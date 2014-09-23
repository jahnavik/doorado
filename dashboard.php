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

#hor-zebra
{
  font: 14px Verdana, Geneva, Arial, Helvetica, sans-serif;

  width: 1330px;
  text-align: left;
  border-collapse: collapse;
  background: url('table-images/pattern.png');
  line-height: 2em;
}
#hor-zebra th
{
    font-size: 14px;
  font-weight: bold;
  padding: 8px;
  border-bottom: 1px solid #fff;
  color:  #3a87ad;
  text-shadow: 0 1px 0 rgba(255,255,255,.5); 
    border-bottom: 1px solid #ccc;
    background-color: #d9edf7;
  
}
#hor-zebra td
{
  padding: 8px;
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
    <a id="dash-item" href="#deadline">
        <img src="icon/deadline.png" width="40">
  </a><br><br><br>
    <a id="dash-item" href="#bulletin">
        <img src="icon/bulletin.png" width="40">
  </a><br><br><br>
    <a id="dash-item" href="#grade">
        <img src="icon/grade.png" width="40">
  </a><br><br><br>
</div>
<?php 
$sql1="SELECT * FROM users WHERE email='$email' ";
$result1=mysql_query($sql1);

      $row=mysql_fetch_assoc($result1);
      $sid=$row['id'];
      $s_name=$row['name'];
$sql2="SELECT * FROM student natural join(courses) WHERE sid='$sid' ";


$result2=mysql_query($sql2);
$num_courses=mysql_num_rows($result2);
?>
<div id="right-dash">
  <a name="profile"></a>
   <div id="main" class="card" style="margin-top:50px;">
<h2>Profile</h2>
<hr>
<strong>Name: </strong><?php echo $s_name;?> <br>
<strong>Email ID: </strong><?php echo $email;?> <br>
<strong>Phone: </strong><br>
<strong>Total Courses: </strong><?php echo $num_courses; ?>
   </div>
    <a name="course"></a>
    <div id="main" class="card" style="margin-top:20px;">
<h2>Courses</h2>
<hr>
<?php

$i=0;
while ($i<$num_courses ) {
  
$cid=mysql_result($result2,$i,"cid");

$c_name=mysql_result($result2,$i,"name");
$c_detail=mysql_result($result2,$i,"details");
?>
 <a href="course.php?c=<?php echo $cid;?>"><?php echo $c_name; ?></a> <br>
<?php
$i++;
}
?> 
   </div>
    <a name="deadline"></a>
    <div id="main" class="card" style="margin-top:20px;">
<h2>Deadlines</h2>
<hr>
<div class="card" style="position:relative; margin:10px; width:40%;">
  <h3>Assignment</h3>
  1. Activity 1
  <br>
  2. Assignment 0
</div>
<div id="calendar" style="width: 30%;
position: relative;
float: right;
right: 20px;"></div>
   </div>
    <a name="bulletin"></a>
    <div id="main" class="card" style="margin-top:20px;">
<h2>Bulletin</h2>
<table id="hor-zebra" summary="Datapass">
<tr>
<th>#</th>
<th>Message </th>
<th>Replies</th>
<th>Posted By</th>
</tr>
<td>1</td>
<td><a href="#">Hello World! This is a test Entry! </a></td>
<td><a href="#">2</a></td>
<td>Aditi</td>
<tr>
</tr>
</table>
<hr>
   </div>
    <a name="grade"></a>
    <div id="main" class="card" style="margin-top:20px;">
<h2>Grades</h2>
Select your course :
<select>
  <option value="a">Critical Thinking</option>
  <option value="b">Introduction to Economics</option>
</select>

<img src="images/grades.jpg" alt="Not Available" />

<hr>
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