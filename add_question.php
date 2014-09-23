<?php
include "cxn.php";
error_reporting(0);
session_start();
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];
$qid=$_POST['qid']; 
$pid=$_POST['pid']; 
$ques=$_POST['question']; 
$ans=$_POST['solution']; 
$cid=$_POST['cid']; 
$sql5="INSERT INTO problem(qid, pid,ques, ans) VALUES ('$qid','$pid','$ques','$ans') ";
$result5=mysql_query($sql5);

 header('Location: new_quiz.php?c=$cid');     

      
?>