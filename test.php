<?php

include "cxn.php";

$cid="CSE101";

	$res1=mysql_query("SELECT DISTINCT did FROM discussion WHERE cid='$cid'");
	$num1=mysql_numrows($res1);
//	echo $num1;
	$j=0;
	while ($j<$num1)
	{
		$did=mysql_result($res1,$j,"did");
		
		$res2=mysql_query("SELECT * FROM discussion WHERE cid='$cid' AND did='$did'");
		//$modal="modal";
		//$modal=$modal.$did;
		$post=mysql_result($res2,0,"comm");
		$user=mysql_result($res2,0,"user");
	//	echo $did;
	//	echo $post;
	//	echo $user;
		$num2=mysql_numrows($res2);
		$j++;
	}
	$timezone = date_default_timezone_set('Asia/Kolkata'); 
	$now=date('d M y H:i'); 
	echo $now;
	$res3=mysql_query("SELECT * FROM assignments");
	$num3=mysql_numrows($res3);
	$k=0;
	while ($k<$num3)
	{
		$date=mysql_result($res3,$k,"deadline");
		$pieces=explode(" ", $date);
		echo $pieces[0];
		echo $pieces[1];
		echo $pieces[2];
//		echo $pieces[3];
		$time=explode(":",$pieces[3]);
		echo $time[0];
		echo $time[1];
		echo $pieces[4];
		echo "***";
		$k++;
	}
?>