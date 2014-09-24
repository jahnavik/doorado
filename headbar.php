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
<a href="#" onclick="create_modal('signup_modal'); return false;">SignUp</a>

<?php }
else { 
$sql1="SELECT * FROM users WHERE email='$email' ";
$result1=mysql_query($sql1);

			$row=mysql_fetch_assoc($result1);
			$name=$row['name'];
			$role=$row['role']

	?>
<a href="all_courses.php" style="margin-right:10px;"  >Courses</a>
<a href="<?php if($role=='teacher') echo "instructor_dashboard.php"; else echo "dashboard.php"; ?>" style="margin-right:10px;" ><?php echo $name; ?></a>
<a href="logout.php" style="margin-right:10px;"  >Logout</a>

<?php } ?>
</span>

<center><a href="index.php">Doorado</a></center>

</div>

<div class="overlay_modal" id="login_modal">
  <div class="overlay_modal_body">
 <center>Login to your Doorado Account</center>

  <form action="login.php" method="post" style="position:absolute; left:15%; width:30% ; top:150px">
    Student Login
    <fieldset id="inputs">
                <input id="username" name="email" type="text" class="form-control" placeholder="Email" autofocus required>   
                <input id="password" name="password" type="password"  class="form-control" placeholder="Password" required>
            </fieldset>
                    
 
            <fieldset id="actions">
                <input  type="submit" id="submit"  class="btn btn-danger" value="Sign in">
                      
             
                  </fieldset>
               </form>
                 
  <form style="position:absolute; left:55%; width:30%; top:150px" action="login.php" method="post">
    Instructor Login
    <fieldset id="inputs">
                <input id="username" name="email" type="text" class="form-control" placeholder="Email" autofocus required>   
                <input id="password" name="password" type="password"  class="form-control" placeholder="Password" required>
            </fieldset>
                   
 
            <fieldset id="actions">
                <input  type="submit" id="submit" class="btn btn-danger" value="Sign in">
                      
             
                  </fieldset>
  </form>




  </div>


</div>