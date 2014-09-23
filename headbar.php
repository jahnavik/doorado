<?php
$login=0;
if(isset($_SESSION['email_ses']))
{
	$login=1;
}
?>
<div id="header">
<span style="position:relative; left:5%; float:left;"><a href="index.php"><img src="images/home.png" height="30"/></a></span>
<span style="position:relative; right:5%; width:350px; float:right; top:10px;font-size:15px;">

<?php if($login==0) { ?>
<a href="all_courses.php" style="margin-right:10px;"  >Courses</a>
<a href="#" style="margin-right:10px;" onclick="create_modal('login_modal'); return false;">Login</a>

<a href="login.php">Signup</a>

<?php }
else { 
$sql1="SELECT * FROM users WHERE email='$email' ";
$result1=mysql_query($sql1);

			$row=mysql_fetch_assoc($result1);
			$name=$row['name'];

	?>
<a href="all_courses.php" style="margin-right:10px;"  >Courses</a>
<a href="dashboard.php" style="margin-right:10px;" ><?php echo $name; ?></a>
<a href="logout.php" style="margin-right:10px;"  >Logout</a>

<?php } ?>
</span>

<center><a href="index.php">Doorado</a></center>

</div>
