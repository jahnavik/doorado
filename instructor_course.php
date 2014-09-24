<?php

include "cxn.php";
//error_reporting(0);
session_start();
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];

$cid=$_GET['c'];
$sql1="SELECT * FROM teacher WHERE cid='$cid' ";
$result1=mysql_query($sql1);

      $row=mysql_fetch_assoc($result1);
      $instructor_id=$row['tid'];

$sql3="SELECT * FROM courses WHERE cid='$cid' ";
$result3=mysql_query($sql3);

      $row3=mysql_fetch_assoc($result3);
      $c_name=$row3['name'];
$c_detail=$row3['details'];
$credits=$row3['credits'];
$c_fee=$row3['fee'];
$fee=$c_fee.'INR';
$language=$row3['language'];
$hours=$row3['hours'];
$office=$row3['office'];
$evaluation=$row3['evaluation'];
$syllabus=$row3['syllabus'];
$sql2="SELECT * FROM users WHERE id='$instructor_id' ";
$result2=mysql_query($sql2);

      $row2=mysql_fetch_assoc($result2);
      $t_name='Dr. '.$row2['name'];

$query6="SELECT * FROM quiz WHERE cid='$cid'";
$result6=mysql_query($query6);
$num_q=mysql_num_rows($result6);
$query8="SELECT * FROM resources WHERE cid='$cid'";
$result8=mysql_query($query8);
$num8=mysql_num_rows($result8);
$r=$num8+1;
$rid=$cid.'Res'.$r;
$file=$rid.'x';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Doorado</title> 
   <meta name="description" content= ""  />
        <meta name="keywords" content="" />         
      <!-- Google Webfonts and our stylesheet -->
       <script src="jquery.js"></script>

    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" type="text/css" href="style.css"> 
         <link rel="stylesheet" type="text/css" href="main.css"> 
         <link rel="stylesheet" type="text/css" href="js/wizmodal.css"> 
         <script src="js/wizmodal.js" type="text/javascript"></script>

           <style type="text/css">
      body {
     background-color:#e4e4e4;
       
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
  <h3><?php echo $credits.' Credits';?></h3>
  <div style="position:absolute; width:60%;top:120px; right:-20px; font-size:20px; float:right;"> <!--if user has already joined -->
<a href="instructor_course.php?c=<?php echo $cid;?>" style="text-decoration:none; color:#FFF;margin-right:10px;<?php if(!isset($_GET['discussion']) && !isset($_GET['live']) && !isset($_GET['resources']) && !isset($_GET['grades']) )
{
  echo "border-bottom: 3px solid red";
} ?>">About</a>

<a href="instructor_course.php?c=<?php echo $cid;?>&discussion" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['discussion']))
{
  echo "border-bottom: 3px solid red";
} ?>">Discussion</a>

<a href="live.php?c=<?php echo $cid;?>&live" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['live']))
{
  echo "border-bottom: 3px solid red";
} ?>">Live Class</a>

<a href="instructor_course.php?c=<?php echo $cid;?>&resources" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['resources']))
{
  echo "border-bottom: 3px solid red";
} ?>">Resources</a>

<a href="instructor_course.php?c=<?php echo $cid;?>&assignments" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['assignments']))
{
  echo "border-bottom: 3px solid red";
} ?>">Assignments</a>

<a href="instructor_course.php?c=<?php echo $cid;?>&quizzes" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['quizzes']))
{
  echo "border-bottom: 3px solid red";
} ?>">Quizzes</a>

<a href="instructor_course.php?c=<?php echo $cid;?>&grades" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['grades']))
{
  echo "border-bottom: 3px solid red";
} ?>">Grades</a>

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
<?php if(!isset($_GET['discussion']) && !isset($_GET['live'])  && !isset($_GET['resources']) && !isset($_GET['assignments']) && !isset($_GET['quizzes']) && !isset($_GET['grades'])) { ?> 
   
 <center>
  <div style="margin-top:20px;">
  <br>
  <button class="btn btn-primary" style="width:20%" onclick="create_modal('edit_modal'); return false;"> Edit Course</button>
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
  <div id="main" class="card live_hack" style="margin-top:20px;">

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
else if(isset($_GET['assignments'])){ ?>
  <div id="main" class="card" style="margin-top:20px;" >
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
<?php echo $f2;?> <a href='<?php echo $f1;?>'><input type="button" value="Download" class="btn btn-default" /></a><br><br>
<?php
$i++;
}
?>
<br>
<center>
</div>
<div id="main" class="card" style="margin-top:20px;">
<center>
 <h3>Add Assignment</h3>
<form action="upload_assignment.php" method="post" enctype="multipart/form-data"> 
<input required type="file" name="file"/><br>
<input type="hidden" name="cid" value="<?php echo $cid;?> ">
Enter Name <input required type="text" name="fname"/><br><br><span class="add-on">
Set Deadline <input required type="text" name="date" data-date-format="dd M yy HH:ii p" readonly class="form_datetime"><br><br>

<button type="submit" name="upload" class="btn btn-danger">Upload New Assignment</button>
</form>
</center>
</div>

<div id="main" class="card" style="margin-top:20px;">
<center>
 <h3>Submissions</h3>
 <table id="hor-zebra">
 <tr>
 <th>#</th>
 <th>Name of Student</th>
 <th>Assignment #</th>
 <th>Download Link</th>
 </tr>
 <?php
  $sub=mysql_query("SELECT * FROM solutions WHERE cid='$cid'");
  $num=mysql_num_rows($sub);
 // echo $num;
  $p=0;
  while($p<$num)
  {
	$filename=mysql_result($sub,$p,"name");
	$loc=mysql_result($sub,$p,"location");
	$split=explode(" ",$filename);
 ?>
<tr>
<td><?php echo $p+1; ?></td>
<td><?php echo $split[3]; ?></td>
<td><?php echo $split[1]; echo $split[2]; ?></td>
<td><a href='<?php echo $loc;?>'><?php echo $filename;?></a></td>
</tr>
<?php
$p++;
}
?>
</table>
</center>
</div>

<?php }
else if(isset($_GET['grades'])){ ?>
  <div id="main" class="card " style="margin-top:20px;">
  <center><h3> Assign Grades </h3></center>
<table id="hor-zebra" summary="Datapass" style="width:100%">
<tr>
<th>#</th>
<th>Name</th>
<th>Grade</th>
</tr>
<?php
$gr=mysql_query("SELECT * FROM student WHERE cid='$cid'");
$n=mysql_num_rows($gr);
$p=0;
while($p<$n)
{
$gra=mysql_result($gr,$p,"grade");
$sid=mysql_result($gr,$p,"sid");
$nm=mysql_query("SELECT name FROM users WHERE id='$sid'");
$sname=mysql_result($nm,0,"name");
?>
<tr>
<td><?php echo $p+1; ?></td>
<td><?php echo $sname; ?></td>
<td><?php
if ($gra=="")
{
?>
<form action="grade.php" method="post" >
<select name="grade">
<option value="A"><?php echo "A"; ?></option>
<option value="B"><?php echo "B"; ?></option>
<option value="C"><?php echo "C"; ?></option>
<option value="D"><?php echo "D"; ?></option>
<option value="E"><?php echo "F"; ?></option>
</select>
<input type="hidden" value="<?php echo $cid; ?>" name="cid" >
<input type="hidden" value="<?php echo $sid; ?>" name="sid" >
<button type="submit" name="send">Update</button>
</form>
<?php
}
else
	echo $gra;
?>
</td>
</tr>
<?php
$p++;
}
?>
</table>
  </div>

<?php }
else if(isset($_GET['quizzes'])){ ?>
  <div id="main" class="card " style="margin-top:20px;">
  
<center> 
<h3> Previous Quizzes
</h3> <?php $i=0;
    while($i<$num_q)
{
  $q_id=mysql_result($result6,$i,"qid");
?>
<a href="view_quiz.php?c=<?php echo $q_id;?>" ><input type="button" class="btn btn-danger" value="<?php echo $q_id;?>"></a><br><br>
<?php
$i++;
}?>

<h3> Create New Quiz
</h3>
<a href="new_quiz.php?c=<?php echo  $cid;?>"><input type="button" class="btn btn-default" value="Create Quiz"></a>
</center></div>

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
<?php echo $f2;?> <a href='<?php echo $f1;?>'> <input type="button" value="Download" class="btn btn-default" /></a><br><br>
<?php
$i++;
}
?>
</center>
</div>
<div id="main" class="card" style="margin-top:20px;">
<center>
 <h3>Add Resources</h3>
<form action="upload_file.php" method="post" enctype="multipart/form-data"> 
<input required type="file" name="file"/><br>
<input type="hidden" name="cid" value="<?php echo $cid;?> ">
Name of Resource <input required type="text" name="fname"/><br><br>
<button type="submit" name="upload" class="btn btn-danger">Upload New Resource</button>
</form>
</center>
</div>

<?php } ?>
    
<div class="overlay_modal" id="edit_modal" >
  <div class="overlay_modal_body">
 <h2>Edit Course</h2>

  <form action="edit_course.php" method="post" style="position:relative; padding:20px; margin-top:20px;  ">
    
    <fieldset id="inputs">
    Course ID <input id="Course_id"  name="course_id" type="text" class="form-control" value="<?php echo $cid;?>" autofocus required> <br>
    Course Name <input id="Course_name"  name="course_name" type="text"  class="form-control" value="<?php echo $c_name;?>" required><br>
    Hours <input id="Work" name="work" type="text"  class="form-control" value="<?php echo $hours;?>" required><br>
    Office Hours <input id="office" name="office" type="text"  class="form-control" value="<?php echo $office;?>" required><br>
	Language <input id="Language"  name="language" type="text"  class="form-control" value="<?php echo $language;?>" required><br>
    Fee <input id="fee"  name="fee" type="text"  class="form-control" value="<?php echo $c_fee;?>" required><br>
    Credits <input id="credits"  name="credits" type="text"  class="form-control" value="<?php echo $credits;?>" required><br>
    Details <textarea rows="3" name="details" style="width:100%; height:300px;" class="form-control" value="<?php echo $c_detail;?>"></textarea><br>
    Evaluation <textarea rows="3" name="evaluation" style="width:100%; height:300px;" class="form-control" value="<?php echo $evaluation;?>"></textarea><br>
    Syllabus <textarea rows="3" name="syllabus" style="width:100%; height:300px;" class="form-control" value="<?php echo $syllabus;?>"></textarea><br>
    
    
    
  
            </fieldset>
            <button type="submit" class="btn btn-danger">Save</button>
                     <div id=err style=" width: 300px; height: 10px; align : left; color: #C00; font-weight:normal;  line-height: 1; font: 14px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif;  ">
            
      
      

            </div>
 
            <fieldset id="actions">
               <!-- <input  type="submit" id="submit"  class="btn btn-danger" value="Sign in"> -->
                      
             
                  </fieldset>
               </form>
    </div>

 
    
 
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
<button name="add" type="submit"> Add Comment </button> 
</center>
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
	
<script type="text/javascript" src="jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>	
    <script type="text/javascript">
$( ".live_hack" ).load( "https://appear.in/2387" );

    </script>
      </body>
  </html>