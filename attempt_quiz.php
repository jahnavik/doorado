
<?php

include "cxn.php";
error_reporting(0);
session_start();
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];

$qid=$_GET['c'];


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
<div class="half" style="margin-right:28px; position:relative;">
 <form action="quiz_check.php" method="post" style="position:relative; left:0%; width:30% ; padding:20px;">
    
   
      <?php
  $i=0;
while ($i<$num_p)
{
  $j=$i+1;
$ques=mysql_result($result7,$i,"ques");
$pid=mysql_result($result7,$i,"pid");
$q='Q.'.$j.'  '.$ques;

?>
             <fieldset id="inputs">
                 <p> <?php echo $q;?></p> 
                <input id="ans" name=<?php echo $pid;?> type="text"  class="form-control" placeholder="Answer" required>
            </fieldset>
                     <div id=err style=" width: 300px; height: 10px; align : left; color: #C00; font-weight:normal;  line-height: 1; font: 14px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif;  ">
             </div>
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