<?php

include "cxn.php";

session_start();
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];

$cid=$_GET['c'];



$sql2="SELECT * FROM users WHERE email='$email' ";
$result2=mysql_query($sql2);

      $row2=mysql_fetch_assoc($result2);
      $id=$row2['id'];
     
$query="INSERT INTO student(sid,cid) VALUES ('$id','$cid')";
$result=mysql_query($query);


header("location:dashboard.php");


?>