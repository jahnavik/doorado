<?php

include "cxn.php";

session_start();
$email= $_SESSION['email_ses'];
$role= $_SESSION['role_ses'];

$comment = $_POST['comment'];
$cid = $_POST['cid'];
$did = $_POST['did'];

	$result=mysql_query("SELECT name FROM users WHERE email='$email'");
	$name=mysql_result($result,0,"name");

if(!isset($_POST['add']))
{
	//echo "Please enter comment";
	
}
else
{
		mysql_query("INSERT INTO discussion (cid,did,comm,user) VALUES ('$cid','$did','$comment','$name')");
		//echo "HERE";
	
	
}
if ($role=='teacher')
		header("Location: instructor_course.php?c=$cid&discussion");	
else
		header("Location: course.php?c=$cid&discussion");
?>