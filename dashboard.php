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

#hor-zebra1
{
  font: 14px Verdana, Geneva, Arial, Helvetica, sans-serif;

  width: 543px;
  text-align: left;
  border-collapse: collapse;
  background: url('table-images/pattern.png');
  line-height: 2em;
}
#hor-zebra1 th
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
#hor-zebra1 td
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
 <link rel="stylesheet" type="text/css" href="js/wizmodal.css"> 
         <script src="js/wizmodal.js" type="text/javascript"></script>

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
  <a id="dash-item" href="#message">
        <img src="icon/message.png" width="40">
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
<div class="card" style="position:relative; margin:10px; width:47%;">
<h3>Assignment</h3>
<table id="hor-zebra1" summary="Datapass">
<tr>
<th>#</th>
<th>Assignment </th>
<th>Course</th>
</tr>
<?php
$q=mysql_query("SELECT cid FROM student WHERE sid='$sid'");
$i=0;
$k=1;
$n=mysql_num_rows($q);
while($i<$n)
{
$r=mysql_result($q,$i,"cid");
$q1=mysql_query("SELECT * FROM assignments WHERE cid='$r'");
$q2=mysql_query("SELECT name FROM courses WHERE cid='$r'");
$cname=mysql_result($q2,0,"name");
$n1=mysql_num_rows($q1);
$j=0;
while ($j<$n1)
{
$name=mysql_result($q1,$j,"name");
$loc=mysql_result($q1,$j,"location");
?>
<tr>
<td><?php echo $k++; ?></td>
<td><a href='course.php?c=<?php echo $r; ?>&assignments'><?php echo $name; ?></a></td>
<td><?php echo $cname; ?></td>
</tr>
<?php
$j++;
}
$i++;
}
?>
</table>
</div>
<div class="card" style="width: 47%; position: relative; margin:10px; float: right; right: 20px;">
<h3>Quizzes</h3>
<table id="hor-zebra1" summary="Datapass">
<tr>
<th>#</th>
<th>Quiz </th>
<th>Course</th>
</tr>
<?php
$q=mysql_query("SELECT cid FROM student WHERE sid='$sid'");
$i=0;
$k=1;
$n=mysql_num_rows($q);
while($i<$n)
{
$r=mysql_result($q,$i,"cid");
$q1=mysql_query("SELECT qid FROM quiz WHERE cid='$r'");
$q2=mysql_query("SELECT name FROM courses WHERE cid='$r'");
$cname=mysql_result($q2,0,"name");
$n1=mysql_num_rows($q1);
$j=0;
while ($j<$n1)
{
$quizid=mysql_result($q1,$j,"qid");
?>
<tr>
<td><?php echo $k++; ?></td>
<td><a href='course.php?c=<?php echo $r; ?>&quizzes'><?php echo $quizid; ?></a></td>
<td><?php echo $cname; ?></td>
</tr>
<?php
$j++;
}
$i++;
}
?>
</table>

</div>

   </div>
    <a name="bulletin"></a>
    <div id="main" class="card" style="margin-top:20px;">
<h2>Bulletin</h2>
<table id="hor-zebra" summary="Datapass">
<tr>
<th>#</th>
<th>Message </th>
<th>Course</th>
<th>Instructor</th>
</tr>
<?php
 $q1=mysql_query("SELECT cid FROM student WHERE sid='$sid'");
 $n1=mysql_numrows($q1);
 $i=0;
 $k=1;
 while ($i<$n1)
 {
  $c=mysql_result($q1,$i,"cid");
  $q2=mysql_query("SELECT * FROM bulletin WHERE cid='$c'");
  $n2=mysql_numrows($q2);
  $j=0;
  while ($j<$n2)
  {
    $p=mysql_result($q2,$j,"post");
    $t=mysql_result($q2,$j,"sid");
    $q3=mysql_query("SELECT name from courses where cid='$c'");
    $cname=mysql_result($q3,0,"name");
    $q4=mysql_query("SELECT name from users where id='$t'");
    $tname=mysql_result($q4,0,"name");
?>
<tr>
<td><?php echo $k++; ?></td>
<td><?php echo $p; ?></td>
<td><?php echo $cname; ?></td>
<td><?php echo $tname; ?></td>
</tr>
<?php
    $j++;
  }
  $i++;
 }
?>
</table>
<hr>
</div>

<a name="grade"></a>
<div id="main" class="card" style="margin-top:20px;">
<h2>Grades</h2>
<table id="hor-zebra" summary="Datapass">
<tr>
<th>#</th>
<th>Course</th>
<th>Final Grade</th>
<th></th>
</tr> 
<?php
$que=mysql_query("SELECT * FROM student WHERE sid='$sid'");
$i=0;
$numrow=mysql_num_rows($que);
while ($i<$numrow)
{
	$grad=mysql_result($que,$i,"grade");
	$courseid=mysql_result($que,$i,"cid");
	$c=mysql_query("SELECT * FROM courses WHERE cid='$courseid'");
	$coursename=mysql_result($c,0,"name");
?>
<tr>
<td><?php echo $i+1; ?></td>
<td><?php echo $coursename; ?></td>
<td><?php echo $grad; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
<hr>
 </div>

 <a name="message"></a>
<div id="main" class="card" style="margin-top:50px;">
<h2>Messages</h2>
<hr>
<table id="hor-zebra" summary="Datapass">
<tr>
<th>#</th>
<th>Message</th>
<th>Name</th>
<th>Date/Time</th>
</tr>
<?php
$que=mysql_query("SELECT DISTINCT mid FROM messages WHERE id='$sid' OR name='$s_name'");
$num=mysql_numrows($que);
$i=0;
while ($i<$num)
{
    $modal="modal";
    $mid=mysql_result($que,$i,"mid");
	$modal=$modal.$mid;
	$que2=mysql_query("SELECT * FROM messages WHERE mid='$mid' AND (id='$sid' OR name='$s_name')");
    $msg=mysql_result($que2,0,"message");
    $rec=mysql_result($que2,0,"name");
	if($rec==$s_name)
	{
		$tempid=mysql_result($que2,0,"id");
		$alt=mysql_query("SELECT name FROM users WHERE id='$tempid'");
		$rec=mysql_result($alt,0,"name");
	}	
	$date=mysql_result($que2,0,"date");
?>
<tr>
<td><?php echo $i+1; ?></td>
<td><a href="#" onclick="create_modal('<?php echo $modal; ?>'); return false;"><?php echo $msg; ?></a></td>
<td><?php echo $rec; ?></td>
<td><?php echo $date; ?></td>
</tr>
<?php
	$i++;
}
?>
</table>
<br>
<center>
<h3> Send New Message </h3>
 <form action="add_message.php" method="post" enctype="multipart/form-data">
<center>
To: <select name="name">
<?php
$sel=mysql_query("SELECT * FROM users WHERE NOT id='$sid'");
$all=mysql_numrows($sel);
$x=0;
  while ($x<$all)
  {
	$ppl=mysql_result($sel,$x,"name");
	$pid=mysql_result($sel,$x,"id");
?>
<option value="<?php echo $ppl; ?>"><?php echo $ppl; ?></option>
<?php
$x++;
}
?>
</select>
<br>
<br>
<textarea required name="newmsg" id="newmsg" class="form-control" placeholder="Type New Message"></textarea>
<input type="hidden" name="id" value="<?php echo $sid;?>">
<?php 
$timezone = date_default_timezone_set('Asia/Kolkata'); 
$nownew=date('d M y H:i');
?>
<input type="hidden" name="date" value="<?php echo $nownew;?>">
<input type="hidden" name="mid" value="<?php echo $num+1;?>">
<br>
<button name="new" type="submit" class="btn btn-danger"> Send Message </button>
 </form>
</center>
</div>
</div>

<?php
$query=mysql_query("SELECT DISTINCT mid FROM messages WHERE id='$sid' OR name = '$s_name'");
$num1=mysql_numrows($query);
$j=0;
while ($j<$num1)
{
    $modal="modal";
    $mid=mysql_result($query,$j,"mid");
	$modal=$modal.$mid;
?>
 <div class="overlay_modal" id="<?php echo $modal; ?>">
 <div class="overlay_modal_body">
 <form action="add_reply.php" method="post" enctype="multipart/form-data">
<?php
  $query2=mysql_query("SELECT * FROM messages WHERE mid='$mid'");
  $num2=mysql_numrows($query2);
  $k=0;
//  $mesg=mysql_result($query2,$k,"message");
//  $date=mysql_result($query2,$k,"date");
  $name=mysql_result($query2,0,"name");
  if($name==$s_name)
	{
		$tempid=mysql_result($query2,0,"id");
		$alt=mysql_query("SELECT name FROM users WHERE id='$tempid'");
		$name=mysql_result($alt,0,"name");
	}
?>
<center>
Chat with <?php echo $name; ?>
</center>
<br>
<br>
<?php
while ($k<$num2)
{
	$mesg=mysql_result($query2,$k,"message");
	$date=mysql_result($query2,$k,"date");
	$name=mysql_result($query2,$k,"name");
	$id=mysql_result($query2,$k,"id");
	$val=mysql_query("SELECT name from users where id='$id'");
	$sname=mysql_result($val,0,"name");
	echo $sname." ";
	echo ":";
	echo " ".$mesg;
?>
<br>
<?php 
	echo "(Sent on - ".$date.")";
?>
<hr>
<br>
<?php
$k++;
}
?>
<br>
<textarea name="reply" id="reply" class="form-control" placeholder="Type your message here"></textarea>
<input type="hidden" name="mid" value="<?php echo $mid;?>">
<input type="hidden" name="id" value="<?php echo $sid;?>">
<input type="hidden" name="name" value="<?php echo $sname;?>">
<?php 
$timezone = date_default_timezone_set('Asia/Kolkata'); 
$now=date('d M y H:i');
?>
<input type="hidden" name="date" value="<?php echo $now;?>">
<br>
<center>
<button name="add" type="submit" class="btn btn-default"> Reply </button> 
</center>
<br>
</form>
</div>
</div>
<?php	
	$j++;
}
?>



  

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