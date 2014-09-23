<?php
include "cxn.php";
error_reporting(0);
session_start();
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];
$qid=$_POST['q_id']; 

$cid=$_POST['c_id']; 
$sql5="INSERT INTO quiz(cid,qid ) VALUES ('$cid','$qid') ";
$result5=mysql_query($sql5);

     

      
?>