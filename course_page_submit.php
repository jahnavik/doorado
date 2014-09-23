<?php

include "cxn.php";

session_start();
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];
if(isset($_SESSION['email_ses']))
{
  if($_SESSION['role_ses']=="student")
      {
$course_no=$_POST['course_id'];
$course_name=$_POST['course_name'];
$details = $_POST['details'];
$credits = $_POST['credits'];
$fee = $_POST['fee'];
$work = $_POST['work'];
$evaluation = $_POST['evaluation'];
$syllabus = $_POST['syllabus'];
$language = $_POST['language'];
$sql2="SELECT * FROM users WHERE email='$email' ";
$result2=mysql_query($sql2);

      $row2=mysql_fetch_assoc($result2);
      $inst_id=$row2['id'];
     
$query="INSERT INTO courses(cid, name,details, credits, fee, hours, language,evaluation,syllabus) VALUES ('$course_no','$course_name','$details','$credits','$fee','$work','$language','$evaluation','$syllabus')";
$result=mysql_query($query);
$query1="INSERT INTO teacher(tid,cid) VALUES ('$inst_id','$course_no')";
$result=mysql_query($query1); 
if($result)
{
header("location:instructor_course.php?c=$course_no");
}
else 
{echo mysql_error();}
}
}
else {}
?>