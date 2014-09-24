<?php

include "cxn.php";

session_start();
$email= $_SESSION['email_ses'];
$role= $_SESSION['role_ses'];

$post = $_POST['announce'];
$cid = $_POST['cid'];
$tid = $_POST['tid'];

if(!isset($_POST['add']))
{
	//echo "Please enter comment";
	header("Location: instructor_dashboard.php");	
}
else
{
		mysql_query("INSERT INTO bulletin (cid,post,tid) VALUES ('$cid','$post','$tid')");
		//echo "HERE";
	
	header("Location: instructor_dashboard.php");	
}
?>