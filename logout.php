
<?php

session_start();
$member_email=$_SESSION['email_ses'];
include "connect.php" ;

unset($_SESSION['email_ses']);
unset($_SESSION['roll_ses']);
header("LOCATION:index.php");
?>

