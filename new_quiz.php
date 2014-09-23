
<?php

include "cxn.php";
error_reporting(0);
session_start();
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];

$cid=$_GET['c'];
$query6="SELECT * FROM quiz WHERE cid='$cid'";
$result6=mysql_query($query6);
$num_q=mysql_num_rows($result6);

$quiz_num=$num_q+1;
$qid=$cid.'Quiz'.$quiz_num;
$query7="SELECT * FROM problem WHERE qid='$qid'";
$result7=mysql_query($query7);
$num_p=mysql_num_rows($result7);
if($num_p==0)
{$p_num=0; }
else {$p_num=$num_p+1; }
$p=$num_p+1;
$pid=$qid.'Q'.$p;



$rand=rand(11,500000);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Doorado</title> 
   <meta name="description" content= ""  />
        <meta name="keywords" content="" />      
        <script src="jquery.js"></script>   
      <!-- Google Webfonts and our stylesheet -->
        <link rel="stylesheet" type="text/css" href="style.css"> 
         <link rel="stylesheet" type="text/css" href="main.css"> 
<link rel="stylesheet" type="text/css" href="js/wizmodal.css"> 
         <script src="js/wizmodal.js" type="text/javascript"></script>
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
  <h3>Create Quiz for <?php echo $cid?></h3>
 
  

</div>

 <form action="" method="post" style="position:relative; padding:20px;  ">
    
    <fieldset id="inputs">
    <h2>Quiz <?php echo $quiz_num; ?></h2>
    <a href="#" style="margin-right:10px;" onclick="create_modal('quiz_modal'); return false;">+ Add Question</a>

    <input type="hidden" name="q_id" value="<?php echo $qid; ?>">
                <input type="hidden" name="c_id" value="<?php echo $cid; ?>">

    
  
            </fieldset>
            <button type="submit"  onclick="create_modal('quiz_save_modal'); return false;" class="btn btn-danger">Submit Quiz</button>
                     <div id=err style=" width: 300px; height: 10px; align : left; color: #C00; font-weight:normal;  line-height: 1; font: 14px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif;  ">
            
      
      

            </div>
 
            <fieldset id="actions">
               <!-- <input  type="submit" id="submit"  class="btn btn-danger" value="Sign in"> -->
                      
             
                  </fieldset>
               </form>
    </div>

 
    </div>
 
      </div>
     

     <?php
  $i=0;
while ($i<$num_p)
{
  $j=$i+1;
$ques=mysql_result($result7,$i,"ques");
$ans=mysql_result($result7,$i,"ans");
$c2=mysql_result($result7, $i,"option2");
$c3=mysql_result($result7, $i,"option3");
$c4=mysql_result($result7, $i,"option4");
$q='Q.'.$j.'  '.$ques;
$a='Ans.  '.$ans;
?>
<div id="main" class="card" style="width:90%;" >

 <p><?php echo $q; ?></p><br>
  <p><?php echo $a; ?></p>
  <p>Other Options:</p>
  <p><?php echo $c2; ?></p>
  <p><?php echo $c3; ?></p>
  <p><?php echo $c4; ?></p>
 </div> 

 <center>
  <div style="margin-top:20px;">
  <br>
  
    </div>

    </center>  

 <?php 
 $i++;
}
?>
<div class="overlay_modal" id="quiz_modal" >
  <div class="overlay_modal_body">
 

  <form action="add_question.php" method="post" style="position:absolute; left:15%; width:30% ; top:5px" >
   <h2>New Question</h2>
    <fieldset id="inputs">
                <input id="question" name="question" type="text" class="form-control" placeholder="Problem" autofocus required><br>   
                <input id="option1" name="solution" type="text"  class="form-control" placeholder="Enter Correct Answer" required><br>
               <input id="option2" name="option2" type="text"  class="form-control" placeholder="Enter Option 2" required><br>
                <input id="option3" name="option3" type="text"  class="form-control" placeholder="Enter Option 3" required><br>
                <input id="option4" name="option4" type="text"  class="form-control" placeholder="Enter Option 4" required><br>
                <input id="score" name="score" type="text"  class="form-control" placeholder="Score" required><br> 
                <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                <input type="hidden" name="qid" value="<?php echo $qid; ?>">
                <input type="hidden" name="cid" value="<?php echo $cid; ?>">

            </fieldset>
                     <div id=err style=" width: 300px; height: 10px; align : left; color: #C00; font-weight:normal;  line-height: 1; font: 14px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif;  ">
            
      
      <?php 
        ?>    

            </div>
 
            <fieldset id="actions">
                <input  type="submit" id="submit"  class="btn btn-danger" value="Save">
                      
             
                  </fieldset>
               </form>
             </div>
           </div>
  <div class="overlay_modal" id="quiz_save_modal" >
  <div class="overlay_modal_body">
 <h3>Add Deadline for the Quiz</h3>

  <form action="save_quiz.php" method="post" style="position:absolute; left:15%; width:30% ; top:150px" >
   
    <fieldset id="inputs">
                 Quiz deadline: <input type="datetime-local" name="bdaytime">
                 <input type="hidden" name="cid" value="<?php echo $cid; ?>">
                 <input type="hidden" name="qid" value="<?php echo $qid; ?>">
            </fieldset>
                     <div id=err style=" width: 300px; height: 10px; align : left; color: #C00; font-weight:normal;  line-height: 1; font: 14px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif;  ">
            
      
      <?php 
        ?>    

            </div>
 
            <fieldset id="actions">
                <input  type="submit" id="submit"  class="btn btn-danger" value="Save">
                      
             
                  </fieldset>
               </form>
             </div>
           </div>               

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