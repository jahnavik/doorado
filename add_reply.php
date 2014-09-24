<?php

include "cxn.php";

session_start();
$email= $_SESSION['email_ses'];
$role= $_SESSION['role_ses'];

$id = $_POST['id'];
$mid = $_POST['mid'];
$msg = $_POST['reply'];
$date = $_POST['date'];
$name = $_POST['name'];

	$result=mysql_query("SELECT name FROM users WHERE email='$email'");
	$name=mysql_result($result,0,"name");

if(!isset($_POST['add']))
{
	//echo "Please enter comment";
	
}
else
{
	// echo $id;
	// echo $mid;
	// echo $msg;
	// echo $date;
	// echo $name;

	mysql_query("INSERT INTO messages(mid,id,message,name,date) VALUES ('$mid','$id','$msg','$name','$date')");
//	echo "HERE";	
	
}
if ($role=='teacher')
		header("Location: instructor_dashboard.php#message");	
else
		header("Location: dashboard.php#message"); 
?>