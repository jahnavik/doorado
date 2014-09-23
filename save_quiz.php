<?php
include "cxn.php";
error_reporting(0);
session_start();
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];
$qid=$_POST['qid']; 

$cid=$_POST['cid']; 
$sql5="INSERT INTO quiz(cid,qid ) VALUES ('$cid','$qid') ";
$result5=mysql_query($sql5);
$link=$cid.'&quizzes';
 header("Location: instructor_course.php?c=$link");     


      
?>