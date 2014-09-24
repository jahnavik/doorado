<?php

include "cxn.php";

session_start();
$email= $_SESSION['email_ses'];
$role= $_SESSION['role_ses'];

$grade = $_POST['grade'];
$cid = $_POST['cid'];
$sid = $_POST['sid'];


if(!isset($_POST['send']))
{
	//echo "Please enter comment";
	
}
else
{
		mysql_query("UPDATE student SET grade='$grade' WHERE sid='$sid' AND cid='$cid'");
		//echo "HERE";
	
	
}
if ($role=='teacher')
		header("Location: instructor_course.php?c=$cid&grades");	
else
		header("Location: course.php?c=$cid&grades");
?>