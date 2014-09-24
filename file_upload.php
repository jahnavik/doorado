<?php
include "cxn.php";
error_reporting(0);
session_start();
$email = $_SESSION['email_ses'];
$rid=$_POST['rid']; 
$cid=$_POST['cid'];
$rname=$_POST['res_name'];
$uploaddir='C:\xampp\htdocs\ip\uploads';
$url=$uploaddir.basename($_FILES[$file][$rname]);
echo $rid;
echo $cid;
echo $rname;
echo $url;
$sql5="INSERT INTO resources(cid, rid,rname, url) VALUES ('$cid','$rid','$rname','$url') ";
$result5=mysql_query($sql5);
if((move_uploaded_file($_FILES[$rid][$rname], $url))&&(result5) )
    echo "Success";
     
else  
 	echo "Fail";

?>