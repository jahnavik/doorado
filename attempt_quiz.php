
<?php

include "cxn.php";
error_reporting(0);
session_start();
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];

$qid=$_GET['c'];

$cid=$_GET['d'];
$query7="SELECT * FROM problem WHERE qid='$qid'";
$result7=mysql_query($query7);
$num_p=mysql_num_rows($result7);

$p_num=$num_p+1;

$pid=$qid.'Q'.$p_num;



$rand=rand(11,500000);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Doorado</title> 
   <meta name="description" content= ""  />
        <meta name="keywords" content="" />         
      <!-- Google Webfonts and our stylesheet -->
        <link rel="stylesheet" type="text/css" href="style.css"> 
         <link rel="stylesheet" type="text/css" href="main.css"> 

           <style type="text/css">
      body {
     background-color:#e4e4e4;
       
      }
      .join {
    display: inline;
}
.quit {
    display: none;
}
video {
    float:; left;
    margin: 10px;
    width: 300px;
}
    </style>
  <link rel="stylesheet" type="text/css" href="js/wizmodal.css"> 
         <script src="js/wizmodal.js" type="text/javascript"></script>

</head>
<body>
    <?php include "headbar.php"; ?>
    <div id="main" class="card" >


      <div id="feature-image"  >
<img src="iiit.jpg" id="fi"/>
</div>
<div id="info-area">
  <img src="logo.png" width="100"/><br>
  <h3><?php echo $qid; ?></h3>
 
  

</div>

 
    </div>

 
    </div>
 
      </div>
     

     
<div id="main" class="card" style="height:100%" >
<div  style="margin-right:28px; position:relative;">
 <form action="quiz_check.php" method="post" style="position:relative; left:0%;  padding:20px;">
    
   
      <?php
  $i=0;
while ($i<$num_p)
{
  $j=$i+1;
$ques=mysql_result($result7,$i,"ques");
$pid=mysql_result($result7,$i,"pid");
$c1=mysql_result($result7, $i,"ans");
$c2=mysql_result($result7, $i,"option2");
$c3=mysql_result($result7, $i,"option3");
$c4=mysql_result($result7, $i,"option4");
$q='Q.'.$j.'  '.$ques;


?>
             
                 <p> <?php echo $q;?></p> 
                <input  name=<?php echo $pid;?> type="radio"   value="<?php echo $c1;?>"> <?php echo $c1;?> <br>
                <input  name=<?php echo $pid;?> type="radio" value="<?php echo $c2;?>" ><?php echo $c2;?><br>
                <input  name=<?php echo $pid;?> type="radio" value="<?php echo $c3;?>" ><?php echo $c3;?><br>
                <input name=<?php echo $pid;?> type="radio"  value="<?php echo $c4;?>" ><?php echo $c4;?><br>
                 <input type="hidden" name="cid" value="<?php echo $cid; ?>">
      
            <?php 
 $i++;
}
?>
     
           
 
            <fieldset id="actions">
                
              <input type="hidden" name="q_id" value="<?php echo $qid; ?>">


                <input  type="submit" id="submit"  class="btn btn-danger" value="Submit Quiz">
                      
             
                  </fieldset>
               </form>
 
 </div> 
</div>
 <center>
  <div style="margin-top:20px;">
  <br>
  
    </div>

    </center>  

 


    <footer>
<center><br><span style="font-size: 30px;
font-weight: 700; ">Doorado</span><br> Doorado is an educational software, developed at IIIT-Delhi
</center>
    </footer>
 <script type="text/javascript">
$(document).ready(function() {
 
  $("#main-slider").owlCarousel({items : 1,autoPlay : 5000});
 
});</script>


      </body>
  </html>