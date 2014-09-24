<?php

include 'cxn.php';
$cid=$_GET['c'];
$id=$_GET['id'];
if(isset($_GET['on']))
mysql_query("UPDATE courses set live_id='$id' where cid='$cid' ");
else
	if(isset($_GET['off']))
	mysql_query("UPDATE courses set live_id=''where cid='$cid' ");


?>
