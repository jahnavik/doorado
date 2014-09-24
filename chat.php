<?php
session_start();
error_reporting(0);
include "cxn.php";
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];


if(!isset($_SESSION['email_ses']))
{
 
     header("LOCATION:index.php");
}

$user1=$_GET['user1'];
$user2=$_GET['user2'];
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
<script type="text/javascript">

var timerId = setInterval(function(){
$.get('makeconnection.php?a='+encodeURIComponent(<?php echo $user1 ?>)+'&b='+encodeURIComponent(<?php echo $user2 ?>), function(data) {
  $('#chat_area').append(data);
  if (data!=''){
     $("#chat_area").animate({scrollTop: $("#chat_area").attr('scrollHeight')
    }, 500);
        $('#chat_area_wait').hide();
        $("#chat_text").show();
   }
  
 
  });
},300);
</script>
</head>
  <body>
    <?php include "headbar.php"; ?>

<div style="position:relative; top:70px;height:100%; ">
<div style="position:relative; bottom:100px;height:100%; top:10px; " id="chat_area">
</div>
<input type="text" style="position:fixed; float:left; bottom:0px; height:50px; width:80%; background:#FFF; padding:5px;" id="chat_text">
<button style="position:fixed; bottom:0px; float:right; height:50px; width:20%; right:0px;  padding:5px;" class="btn btn-danger" id="chat_send" onclick="">Send</button>
</div>





      </body>
  </html>