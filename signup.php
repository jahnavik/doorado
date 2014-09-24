<?php
include "cxn.php";
$tbl_name="users"; // Table name 

// username and password sent from form 
$name=$_POST['name'];
$email=$_POST['email']; 
$password=$_POST['password']; 
$role=$_POST['role'];

$sql="INSERT INTO $tbl_name (name,email,password,role) VALUES ('$name','$email','$password','$role')";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
   
        session_start();
			$_SESSION['email_ses']=$email;
			
			//@diti $_SESSION['is_remember_me']=$email;
	
		
		$_SESSION['role_ses']=$role;
        
            /* Set cookie to last 1 year */
            setcookie('email', $_POST['email'], time()+60*60*24*365);
           
        
        
		/*session_start();
			$_SESSION['email']=$_POST['email'];
			session_write_close();*/
    
	if (($role=='student')) {
    	header("location:dashboard.php");
    }
    else
    	if ($role=='teacher') {
        	header("location:instructor_dashboard.php");
        }    
        
	else {
        header('Location: index.php?err=1');

    }
?>