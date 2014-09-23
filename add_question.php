<?php
include "cxn.php";

session_start();
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];
$qid=$_POST['qid']; 
$pid=$_POST['pid']; 
$ques=$_POST['question']; 
$ans=$_POST['solution']; 
$option2=$_POST['option2']; 
$option3=$_POST['option3']; 
$option4=$_POST['option4']; 
$score=$_POST['score']; 
$cid=$_POST['cid']; 
$sql5="INSERT INTO problem(qid, pid,ques, ans,option2,option3,option4, score) VALUES ('$qid','$pid','$ques','$ans', '$option2','$option3','$option4','$score') ";
$result5=mysql_query($sql5);

 header("Location: new_quiz.php?c=$cid");     
//echo mysql_error();
?>