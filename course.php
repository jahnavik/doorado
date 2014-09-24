<?php

include "cxn.php";
error_reporting(0);
session_start();
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];

$cid=$_GET['c'];
if($role=='teacher')
{
  header("LOCATION:instructor_course.php?c=$cid");
}
$sql1="SELECT * FROM teacher WHERE cid='$cid' ";
$result1=mysql_query($sql1);

      $row=mysql_fetch_assoc($result1);
      $instructor_id=$row['tid'];

$sql3="SELECT * FROM courses WHERE cid='$cid' ";
$result3=mysql_query($sql3);

      $row3=mysql_fetch_assoc($result3);
      $c_name=$row3['name'];
$c_detail=$row3['details'];
$c_fee=$row3['fee'];
$credits_h=$row3[credits];
$credits=$credits_h.' Credits';
$fee=$c_fee.'INR';
$language=$row3['language'];
$hours=$row3['hours'];
$evaluation=$row3['evaluation'];
$office=$row3['office'];
$syllabus=$row3['syllabus'];
$sql2="SELECT * FROM users WHERE id='$instructor_id' ";
$result2=mysql_query($sql2);

      $row2=mysql_fetch_assoc($result2);
      $t_name='Dr. '.$row2['name'];
      $sql5="SELECT * FROM users WHERE email='$email' ";
$result5=mysql_query($sql5);

      $row5=mysql_fetch_assoc($result5);
      $s_id=$row5['id'];
      $query4="SELECT * FROM student WHERE sid='$s_id' AND cid='$cid'";
$result4=mysql_query($query4);
$num=mysql_num_rows($result4);

if($num==1) {$status='Leave Course';} else {$status='Join Course';}
$query6="SELECT * FROM quiz WHERE cid='$cid'";
$result6=mysql_query($query6);
$num_q=mysql_num_rows($result6);

$query7="SELECT * FROM scores WHERE sid='$s_id' and cid='$cid'";
$result7=mysql_query($query7);
$num_p=mysql_num_rows($result7);


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

#hor-zebra
{
  font: 14px Verdana, Geneva, Arial, Helvetica, sans-serif;

  width: 1195px;
  text-align: left;
  border-collapse: collapse;
  line-height: 2em;
}
#hor-zebra th
{
    font-size: 14px;
  font-weight: bold;
  padding: 8px;
  border-bottom: 1px solid #fff;
  color:  #3a87ad;
  text-shadow: 0 1px 0 rgba(255,255,255,.5); 
    border-bottom: 1px solid #ccc;
    background-color: #d9edf7;
  
}
#hor-zebra td
{
  padding: 8px;
}

    </style>

<!--  jQuery 1.7+  -->
<script src="jquery.js"></script>
<link rel="shortcut icon" type="/image/x-icon" href="favicon.png" />
<script type="text/javascript" src="https://api.bistri.com/bistri.conference.min.js"></script>
 <link rel="stylesheet" type="text/css" href="js/wizmodal.css"> 
         <script src="js/wizmodal.js" type="text/javascript"></script>

</head>
  <body>
   
    <?php include "headbar.php"; ?>
    <div id="main" class="card" >


      <div id="feature-image" >
<img src="iiit.jpg" id="fi"/>
</div>
<div id="info-area">
  <img src="logo.png" width="100"/><br>
 <h3><?php echo $cid;?></h3>
  <h3><?php echo $credits;?></h3>
  <div style="position:absolute; width:60%;top:120px; right:20px; font-size:20px; float:right;"> <!--if user has already joined -->
<a href="course.php?c=<?php echo $cid;?>" style="text-decoration:none; color:#FFF;margin-right:10px;<?php if(!isset($_GET['discussion']) && !isset($_GET['live']) && !isset($_GET['resources']) && !isset($_GET['grades']) )
{
  echo "border-bottom: 3px solid red";
} ?>">About</a>

<a href="course.php?c=<?php echo $cid;?>&discussion" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['discussion']))
{
  echo "border-bottom: 3px solid red";
} ?>">Discussion</a>

<a href="live.php?c=<?php echo $cid;?>&live" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['live']))
{
  echo "border-bottom: 3px solid red";
} ?>">Live Class</a>

<a href="course.php?c=<?php echo $cid;?>&resources" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['resources']))
{
  echo "border-bottom: 3px solid red";
} ?>">Resources</a>

<a href="course.php?c=<?php echo $cid;?>&assignments" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['assignments']))
{
  echo "border-bottom: 3px solid red";
} ?>">Assignments</a>

<a href="course.php?c=<?php echo $cid;?>&quizzes" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['quizzes']))
{
  echo "border-bottom: 3px solid red";
} ?>">Quizzes</a>
<a href="course.php?c=<?php echo $cid;?>&grades" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['grades']))
{
  echo "border-bottom: 3px solid red";
} ?>">Scores</a>

    </div>


</div>
<div class="half" style="margin-right:28px; position:relative;">
 <h2><?php echo $c_name;?></h2>
 <p>
<?php echo $c_detail;?>
 </p>
 </div> 
 <div class="half" style="margin-right:28px; position:relative;">
<h2>Course at a glance</h2>
<img src="icon/cal.png" width="15"/> <?php echo $fee;?>  <br>
<img src="icon/clock.png" width="15"/> <?php echo $hours;?>  <br>
<img src="icon/globe.png" width="15"/> <?php echo $language;?> 

 </div>  

 </div>  
    </div>
 
    <?php if(!isset($_GET['discussion']) && !isset($_GET['live'])  && !isset($_GET['resources']) && !isset($_GET['assignments']) && !isset($_GET['quizzes'])&& !isset($_GET['grades'])) { ?> 

  
 <center>
  <div style="margin-top:20px;">
  <br>
  
<a href="course_join.php?c=<?php echo $c_id;?>&d=<?php echo $status;?>" class="btn btn-primary" ><?php echo $status;?> </a>

    </div>

    </center>  
         <div id="main" class="card" style="margin-top:20px;">

<div class="half" style="margin-right:28px; position:relative;">


<h2>Evaluation</h2>
<?php echo $evaluation; ?>
 
 <h2>Office Hours</h2>
 <?php echo $office; ?>
 
</div> 
 <div class="half" style="margin-right:28px; position:relative;">
<h2>Instructor </h2>
<a href="#"><?php echo $t_name;?> </a>
<br>
<h2>Texts </h2>
Ruggiero, Vincent Ryan : The Art of Thinking<br>
Basham et al: Critical Thinking for Students<br>
Edward de Bono : Po-Beyond Yes and No.<br>
Popper, Karl : Conjunctures and Refutations<br>
Hayakawa, S.I : Language in Thought and Action<br>
Gladwell, Malcolm : Blink<br>
The Matrix (DVD)<br>
Watzlazwick, Paul : How Real is Real?<br>

Plus articles, video clips, PPT slides and other online and hard copy resources.

 </div>  
    </div>
      <div id="main" class="card " style="margin-top:20px;">

        <center><h2>Course Outline</h2></center>
<?php echo $syllabus; ?>
        
      </div>
      <?php }

else if(isset($_GET['live'])){ ?>
  <div id="main" class="card " style="margin-top:20px;">
<div>
  <center>  
<h2> Class is Live </h2>
    <input type="button" value="Join Live Class" "create_modal('live_modal'); return false;"  class="join btn btn-default" \>
    <input type="button" value="Join Live Class" onclick="joinRoom();" class="join btn btn-default" \>
    <input type="button" value="Quit Live Class" onclick="quitRoom();" class="quit btn btn-danger" \> </center>
</div>
<div class="video-container"></div>
</div>

<?php }
else if(isset($_GET['resources'])){ ?>

  <div id="main" class="card" style="margin-top:20px;">
  <center>
<h3>Download Resources</h3>
 <?php
$reso = mysql_query("SELECT * FROM resources WHERE cid='$cid'");
$numreso = mysql_numrows($reso);
$i=0;
while ($i < $numreso)
{
$f1=mysql_result($reso,$i,"location");
$f2=mysql_result($reso,$i,"name");
?>
<?php echo $f2;?> <a href='<?php echo $f1;?>'> <input type="button" value="Download" class="btn btn-default" /></a> <br><br>
<?php
$i++;
}
?>
<br>
</center>
</div>

<?php }
else if(isset($_GET['assignments'])){ ?>
  <div id="main" class="card " style="margin-top:20px;">
  <center>
<h3>Download Assignment</h3>
 <?php
$res = mysql_query("SELECT * FROM assignments WHERE cid='$cid'");
$numres = mysql_numrows($res);
$i=0;
while ($i < $numres)
{
$f1=mysql_result($res,$i,"location");
$f2=mysql_result($res,$i,"name");
?>
<?php echo $f2;?> <a href='<?php echo $f1;?>'><input type="button" value="Download" class="btn btn-default" /></a>
<?php
	$timezone = date_default_timezone_set('Asia/Kolkata'); 
	$now=date('d M y H:i');
//	echo $now;
	$pieces=explode(" ", $now);
//		echo $pieces[0];
	$year_n = (int)$pieces[2];
	$day_n = (int)$pieces[0];
//		echo $year_n;
	$month_n = 1;
	if($pieces[1]=="Feb")
		$month_n = 2;
	else if($pieces[1]=="Mar")
		$month_n = 3;
	else if($pieces[1]=="Apr")
		$month_n = 4;
	else if($pieces[1]=="May")
		$month_n = 5;
	else if($pieces[1]=="Jun")
		$month_n = 6;
	else if($pieces[1]=="Jul")
		$month_n = 7;		
	else if($pieces[1]=="Aug")
		$month_n = 8;
	else if($pieces[1]=="Dec")
		$month_n = 12;
	else if($pieces[1]=="Oct")
		$month_n = 10;
	else if($pieces[1]=="Nov")
		$month_n = 11;
	else
		$month_n = 9;
//	echo $month_n;
	$time=explode(":",$pieces[3]);
//		echo $time[0];
//		echo $time[1];
	$hour_n=(int)$time[0];
	$min_n=(int)$time[1];
	$deadline=mysql_result($res,$i,"deadline");
//	echo $deadline;
	$dates=explode(" ", $deadline);
	$times=explode(":", $dates[3]);
//		echo $dates[0];
//		echo $times[0];
	$hour_d=(int)$times[0];
	$min_d=(int)$times[1];
	if($dates[4]=="pm")
		$hour_d=$hour_d+12;
	$year_d = (int)$dates[2];
	$day_d = (int)$dates[0];
	$month_d = 1;
		if($dates[1]=="Feb")
		$month_d = 2;
	else if($dates[1]=="Mar")
		$month_d = 3;
	else if($dates[1]=="Apr")
		$month_d = 4;
	else if($dates[1]=="May")
		$month_d = 5;
	else if($dates[1]=="Jun")
		$month_d = 6;
	else if($dates[1]=="Jul")
		$month_d = 7;		
	else if($dates[1]=="Aug")
		$month_d = 8;
	else if($dates[1]=="Dec")
		$month_d = 12;
	else if($dates[1]=="Oct")
		$month_d = 10;
	else if($dates[1]=="Nov")
		$month_d = 11;
	else
		$month_d = 9;
//		echo $month_d;
	if($year_n <= $year_d)
	{
		if($month_n <= $month_d)
		{
			if($day_n <= $day_d)
			{
				if($hour_n <= $hour_d)
				{
					if($min_n <= $min_d)
					{
						//echo "Wow";
?>
<form action="upload_sol.php" method="post" enctype="multipart/form-data">
<br><input required type="file" name="file"/>
<input type="hidden" name="cid" value="<?php echo $cid;?> ">
<input type="hidden" name="aid" value="<?php echo $f2;?> ">
<br>
<button type="submit" name="upload" class="btn btn-danger" >Upload </button>
</form>
<?php						
					}
				}
			}
		}
	}

?>

<br><br>
<?php
$i++;
}
?>
</center>
  </div>

<?php } 
else if(isset($_GET['discussion'])){ ?>
 <div id="main" class="card " style="margin-top:20px;">


<table id="hor-zebra" summary="Datapass">
<tr>
<th>#</th>
<th>Topic </th>
<th>Replies</th>
<th>Posted By</th>
</tr>
<?php
  $res1=mysql_query("SELECT DISTINCT did FROM discussion WHERE cid='$cid'");
  $num1=mysql_numrows($res1);
  $i=0;
  while ($i<$num1)
  {
    $modal="modal";
    $did=mysql_result($res1,$i,"did");
    $modal=$modal.$did;
    $res2=mysql_query("SELECT * FROM discussion WHERE cid='$cid' AND did='$did'");
    $post=mysql_result($res2,0,"comm");
    $user=mysql_result($res2,0,"user");
    $num2=mysql_numrows($res2);
    $replies=$num2;
    $replies=$replies-1;
?>
<tr>
<td><?php echo $i+1; ?></td>
<td><a href="#" onclick="create_modal('<?php echo $modal; ?>'); return false;"><?php echo $post; ?></a></td>
<td><?php echo $replies; ?></td>
<td><?php echo $user; ?></td>
</tr>
<?php
  $i++;
  }
?>
</table>
<br>
 <div class="overlay_modal" id="add_post">
 <div class="overlay_modal_body">
 <form action="add_post.php" method="post" enctype="multipart/form-data">
<center>
<input name="newpost" id="newpost" class="form-control" placeholder="Add New Post">
<input type="hidden" name="cid" value="<?php echo $cid;?>">
<input type="hidden" name="did" value="<?php echo $num1+1;?>">
<br>
<button name="add" type="submit"> Add Post </button>
</center>
 </form>
 </div>
</div>

<center>  <input type="button" onclick="create_modal('add_post'); return false;" value="Add New Post" class="btn btn-default" \></center>

</div>


<?php }

else if(isset($_GET['quizzes'])){ ?>
  <div id="main" class="card " style="margin-top:20px;">
    <?php
if($num_q==0)
{
  echo"No quizzes for this course yet! Enjoy!";
}
     $i=0;
    while($i<$num_q)
{
  $q_id=mysql_result($result6,$i,"qid");
?>
<center>
<h3>Take a Quiz </h3>
<a href="attempt_quiz.php?c=<?php echo $q_id;?>&d=<?php echo $cid;?> "><input type="button" class="btn btn-danger" value="<?php echo $q_id;?>"></a><br>
<?php
$i++;
}
?>
</center>
</div>

<?php }

else if(isset($_GET['grades'])){ ?>
  <div id="main" class="card " style="margin-top:20px;">
<table id="hor-zebra" summary="Datapass" style="width:100%">
<tr>
<th>#</th>
<th>Quiz</th>

<th>Your Score</th>


</tr> 
<?php
if($num_p==0)
{
  echo"Results for this Course not available yet!";
}
   $j=0;
    while($j<$num_p)
{
   $k=$j+1;
$qid=mysql_result($result7,$j,"qid");
$score=mysql_result($result7,$j,"score");
?>
<tr>
<td><?php echo $k; ?></td>
<td><?php echo $qid; ?></td>
<td><?php echo $score;?></td>
</tr>
<?php $j++;
}?>
</td>
</table>
<?php }
?>
</div>

  <?php
  $res1=mysql_query("SELECT DISTINCT did FROM discussion WHERE cid='$cid'");
  $num1=mysql_numrows($res1);
  $j=0;
  while ($j<$num1)
  {
    $modal="modal";
    $did=mysql_result($res1,$j,"did");
    $modal=$modal.$did;   
 ?>
 <div class="overlay_modal" id="<?php echo $modal; ?>">
 <div class="overlay_modal_body">
 <form action="add_comment.php" method="post" enctype="multipart/form-data">
<?php
  $res2=mysql_query("SELECT comm,user FROM discussion WHERE did='$did' AND cid='$cid'");
  $num2=mysql_numrows($res2);
  $k=0;
  $comm=mysql_result($res2,$k,"comm");
  $user=mysql_result($res2,$k,"user");
?>  
<center><?php echo $comm; ?></center>
<center> - by <?php echo $user; ?></center>
<br>
<br>
<?php 
  $k++;
  while ($k<$num2)
  {
    $comm=mysql_result($res2,$k,"comm");
    $user=mysql_result($res2,$k,"user");
    echo $user." ";
    echo ":";
    echo " ".$comm;
?>
<br>    
<?php   
    $k++;
  }
?>
<br>
<input name="comment" id="comment" class="form-control" placeholder="Add New Comment">
<input type="hidden" name="cid" value="<?php echo $cid;?>">
<input type="hidden" name="did"value="<?php echo $did;?>">
<br>
<center>
<button name="add" type="submit"> Add Comment </button> </center>
<br>
</form>
 </div>
 </div>
<?php
  $j++;
  }
?>





    <footer>
<center><br><span style="font-size: 30px;
font-weight: 700; ">Doorado</span><br> Doorado is an educational software, developed at IIIT-Delhi
</center>
    </footer>
    <script type="text/javascript">
$( ".live_hack" ).load( "https://appear.in/2387" );

    </script>
      </body>
  </html>
