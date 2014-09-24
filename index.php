<?php
session_start();
error_reporting(0);
include "cxn.php";
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];

$err=0;
if (isset($_GET['err']))
{
$err=$_GET['err'];  
}
if(isset($_SESSION['email_ses']))
{
  if($_SESSION['role_ses']=="student")
      header("LOCATION:dashboard.php");
  else
     header("LOCATION:instructor_dashboard.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Doorado</title> 
   <meta name="description" content= ""  />
        <meta name="keywords" content="" />         
      <!-- Google Webfonts and our stylesheet -->
      <!--  jQuery 1.7+  -->
<script src="jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css"> 
         <link rel="stylesheet" type="text/css" href="main.css"> 
         <link rel="stylesheet" type="text/css" href="js/wizmodal.css"> 
         <script src="js/wizmodal.js" type="text/javascript"></script>

           <style type="text/css">
      body {
     background-color:#e4e4e4;
       
      }
    </style>
     <!-- Important Owl stylesheet -->
<link rel="stylesheet" href="owl-carousel/owl.carousel.css">
 
<!-- Default Theme -->
<link rel="stylesheet" href="owl-carousel/owl.theme.css">
 


<script src="owl-carousel/owl.carousel.js"></script>


<link rel="shortcut icon" type="/image/x-icon" href="favicon.png" />
</head>
  <body>
    <?php include "headbar.php"; ?>
    <div style="position:relative; top:50px; width:100%; height:500px;" class="" >

         <div id="main-slider" class="owl-carousel">

 <div><img src="images/index.jpg" style="width:100%;" /> </div>
  <div> <img src="images/image5.jpg" style="width:100%;" /> </div>
 
  <div><img src="images/images.jpg" style="width:100%;" /></div>
  
  
  

</div>
      </div>


 <div class="overlay_modal" id="signup_modal">
 <div class="overlay_modal_body">
<center>Sign Up for a new Doorado Account</center>
<form action="signup.php" method="post" style="position:absolute; left:35%; width:30% ; top:150px">
    <fieldset id="inputs">
        <input id="name" name="name" type="text" class="form-control" placeholder="Name" autofocus required>
                <input id="username" name="email" type="text" class="form-control" placeholder="Email" autofocus required>   
                <input id="password" name="password" type="password"  class="form-control" placeholder="Password" required>
        <center> Join As: </center>
<center> <select name="role">
  <option  value="student">Student</option>
  <option  value="teacher">Teacher</option>
</select> </center>
    </fieldset> 
  
 <div id=err style=" width: 300px; height: 10px; align : left; color: #C00; font-weight:normal;  line-height: 1; font: 14px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif;  ">
            
    

   </div>
  
  <fieldset id="actions">
         <center> <input  type="submit" id="submit"  class="btn btn-danger" value="Sign Up"> </center>
    </fieldset>
</form>         
  
 </div>
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
                     <div id=err style=" width: 300px; height: 10px; align : left; color: #C00; font-weight:normal;  line-height: 1; font: 14px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif;  ">
            
      
      <?php if ($err==1)
        {
          echo '<p id="invalid"  summary="datapass">';
          echo "<strong> Invalid username/password. Try Again!</strong> </p>";
        }
        
        
        if ($err==2)
        {
          echo '<p id="invalid"  summary="datapass"></p>';
          echo "Please enter Username or Password.";
        }
        ?>    

            </div>
 
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
                     <div id=err style=" width: 300px; height: 10px; align : left; color: #C00; font-weight:normal;  line-height: 1; font: 14px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif;  ">
            
      
      <?php if ($err==1)
        {
          echo '<p id="invalid"  summary="datapass">';
          echo "<strong> Invalid username/password. Try Again!</strong> </p>";
        }
        
        
        if ($err==2)
        {
          echo '<p id="invalid"  summary="datapass"></p>';
          echo "Please enter Username or Password.";
        }
      ?>    

            </div>
 
            <fieldset id="actions">
                <input  type="submit" id="submit" class="btn btn-danger" value="Sign in">
                      
             
                  </fieldset>
  </form>




  </div>
   </div>

</div>

  </form>


</div>
</div>


    <script type="text/javascript">
$(document).ready(function() {
 
  $("#main-slider").owlCarousel({items : 1,autoPlay : 5000});
 
});</script>

      </body>
  </html>