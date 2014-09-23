<?php
include "cxn.php";
error_reporting(0);
session_start();
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];
$qid=$_POST['q_id']; 
$cid=$_POST['cid'];
$sql1="SELECT * FROM users WHERE email='$email'";
    $result1=mysql_query($sql1);
    
    
    
      $row=mysql_fetch_assoc($result1);
      $sid=$row['id'];

$query7="SELECT * FROM problem WHERE qid='$qid'";
$result7=mysql_query($query7);
$num_p=mysql_num_rows($result7);
$max_score=0;
$score=0;
$i=0;
while($i<$num_p)
{
$j=$i+1;

     $i++;
 }

      echo $score;

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
  <h3><?php echo $qid; ?></h3><br>
  <h3> Results</h3>
 
  

</div>

 
    </div>

 
    </div>
 
      </div>
     

     
<div id="main" class="card" style="height:100%" >
<div style="margin-right:28px; position:relative;">
 <form action="quiz_check.php" method="post" style="position:relative; left:0%; width:100% ; padding:20px;">
    
  <table id="hor-zebra" summary="Datapass" style="width:100%">
<th>#</th>
<th>Question</th>
<th>Correct Answer</th>
<th>Your Answer</th>
<th>Maximum Score</th>
<th>Your score</th>
</tr> 
      <?php
  $i=0;
while ($i<$num_p)
{
  $j=$i+1;
$ques=mysql_result($result7,$i,"ques");
$pid=mysql_result($result7,$i,"pid");

$q='Q.'.$j.'  '.$ques;
$pid=$qid.'Q'.$j;
$ans=$_POST[$pid];
$entered='Your Answer: '.$ans;
$sql5="SELECT * FROM problem WHERE pid='$pid' ";
$result5=mysql_query($sql5);

      $row5=mysql_fetch_assoc($result5);
      $ans_x=$row5['ans'];
      $answer='Correct Answer: '.$ans_x;
  $score_t=mysql_result($result7,$i,"score");
  $max_score=$max_score+$score_t;
      if($ans==$ans_x)
{
	
  $score_x=mysql_result($result7,$i,"score");
  $score=$score+$score_x;
	
}
else {
$score_x=0;



}
?>
<tr>
<td><?php echo $j; ?></td>
<td><?php echo $ques; ?></td>
<td><?php echo $ans_x;?></td>
<td><?php echo $ans;?></td>
<td><?php echo $score_t;?></td>
<td><?php echo $score_x;?></td>
</tr>
      <?php 
 $i++;
}
$total_score='Total Score= '.$score;
$query1="INSERT INTO scores(sid,cid,qid,score) VALUES ('$sid','$cid','$qid','$score')";
$result=mysql_query($query1); 
mysql_error();
?>
     
    </table>       
    
   <h4><?php echo $total_score;?>/<?php echo $max_score;?> </h4>

             <a href="course.php?c=<?php echo $cid;?>&quizzes"> Go Back to Quizzes</a>

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