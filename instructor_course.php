<?php

include "cxn.php";
error_reporting(0);
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

$sql2="SELECT * FROM users WHERE id='$instructor_id' ";
$result2=mysql_query($sql2);

      $row2=mysql_fetch_assoc($result2);
      $t_name='Dr. '.$row2['name'];




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
    </style>

<!--  jQuery 1.7+  -->
<script src="jquery.js"></script>
<link rel="shortcut icon" type="/image/x-icon" href="favicon.png" />
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
  <h3>4 credits</h3>
  <div style="position:absolute; width:40%;top:120px; right:20px; font-size:20px; float:right;"> <!--if user has already joined -->
<a href="instructor_course.php?c=<?php echo $cid;?>" style="text-decoration:none; color:#FFF;margin-right:10px;<?php if(!isset($_GET['discussion']) && !isset($_GET['live']) && !isset($_GET['resources']) && !isset($_GET['grades']) )
{
  echo "border-bottom: 3px solid red";
} ?>">About</a>

<a href="instructor_course.php?c=<?php echo $cid;?>&discussion" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['discussion']))
{
  echo "border-bottom: 3px solid red";
} ?>">Discussion</a>

<a href="instructor_course.php?c=<?php echo $cid;?>&live" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['live']))
{
  echo "border-bottom: 3px solid red";
} ?>">Live Class</a>

<a href="instructor_course.php?c=<?php echo $cid;?>&resources" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['resources']))
{
  echo "border-bottom: 3px solid red";
} ?>">Resources</a>

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
<img src="icon/cal.png" width="15"/> January – April 2014  <br>
<img src="icon/clock.png" width="15"/> 3-5 hours of work/day <br>
<img src="icon/globe.png" width="15"/> English

 </div>  
    </div>
<?php if(!isset($_GET['discussion']) && !isset($_GET['live'])  && !isset($_GET['resources']) && !isset($_GET['grades'])) { ?> 
   
 <center>
  <div style="margin-top:20px;">
  <br>
  <button class="btn btn-primary" style="width:20%"> Edit Course</button>
    </div>

    </center>  
    
    
    <div id="main" class="card" style="margin-top:20px;">

<div class="half" style="margin-right:28px; position:relative;">


<h2>Evaluation</h2>
<ul>
<li> Learning team projects – 30% </li>
<li> Research paper – 20% </li>
<li> Mid-term – 20% </li>
<li> Final exam – 20%  </li>
<li> Class attendance & participation – 10% </li>
</ul>
Learning teams will be formed at the beginning of the semester.  Each learning team  will elect a co-ordinator, who will rotate presentation responsibilities and allocate them to a different representative for each presentation.

The mid semester and end semester exams will be based on topics and material covered in class.

<hr>
 <h2>Learning Outcomes</h2>
<br>
<ul>
<li> Learning to recognize and question underlying assumptions in all statements, positions and arguments. </li>                                                                 
<li> Learning the distinction between perceptions, opinions, facts, values, knowledge.</li>
<li> Definition and recognition of stereotypes, rationalization, prejudice. The differences and the  overlap between these categories.</li>
<li> Learning the art of active listening in any discussion.</li>
<li> The value of a multi-perspectival approach to ‘loaded’ issues—political, economic, religious, and philosophical. Why a single perspective analysis often lands us in circular arguments, dogma and an inability to register or understand other viewpoints and perspectives.</li>
<li> Semantic maps and territories. </li>
<li> The differences between Critical and Creative Thinking. How and why they supplement each other. </li>
<li> Spotting common fallacies in arguments.</li>
<li> The differences between formal and informal logic. </li>
</ul>

</div> 
 <div class="half" style="margin-right:28px; position:relative;">
<h2>Instructor </h2>
<a href="#"><?php echo $t_name;?> </a>
<br>
<h2>Texts </h2>
Ruggiero, Vincent Ryan : The Art of Thinking <br>

Basham et al: Critical Thinking for Students <br>

Edward de Bono : Po-Beyond Yes and No. <br>

Popper, Karl : Conjunctures and Refutations <br>

Hayakawa, S.I : Language in Thought and Action <br>

Gladwell, Malcolm : Blink <br>

The Matrix (DVD) <br>

Watzlazwick, Paul : How Real is Real? <br>

Plus articles, video clips, PPT slides and other online and hard copy resources. <br>

 </div>  
    </div>
      <div id="main" class="card " style="margin-top:20px;">

        <center><h2>Course Outline</h2></center>

        <table class="table">
<tr>
  <td><strong>WEEK</strong></td>
  <td><strong>TOPICS COVERED</strong></td> 
  <td><strong>METHODOLOGY</strong></td>
  <td><strong>ASSIGNMENTS etc.</strong></td>
</tr>
<tr>
  <td>WEEK 1</td>
  <td>• Introduction to the course <br>
• What is Thinking?  <br>
• Distinction between Critical and Creative Thinking  <br>
• Spot that assumption!  <br>
</td> 
  <td>Lecture, Discussion, Slides, Learning team activity</td>
  <td>• Formation of Learning Teams  <br>
• Learning team activity preparation. (Present a video clip or newsprint article and tract it assumptions next week  <br>
</td>
</tr>
<tr>
  <td>WEEK 2</td>
  <td>•  The art of meaningful discussion <br>
• Active Listening <br>
• Perception exercises, including Gestalt image flips <br>
• Learning team ‘assumptions activity’ <br>

</td> 
  <td>Discussion, Group presentation, Lecture and PPT. Slides</td>
  <td>• Peer  critique of learning team activity <br>
• Reading assignment <br>
</td>
</tr>

<tr>
  <td>WEEK 3</td>
  <td>• Discussion of opinion formation <br>
• Learning team preparation and presentation: Examples of opinion formation <br>
• Karl Popper on scientific theory as an ‘open’ myth. (Conjectures and Reputations) <br>
• Distinction between ‘opinion’ and ‘belief’ <br>
• A large percentage of ‘reality’ and ‘fact’ constructs as opinion or belief <br>
• Clip from ‘The Matrix’ <br>
</td> 
  <td>Lecture, discussion, learning team activity</td>
  <td>• Learning team preparation and activity <br>
• Peer critique of learning team presentations <br>
• Reading assignment <br>

</td>
</tr>

<tr>
  <td>WEEK 4</td>
  <td>• Is there a ‘truth’ or a ‘fact’? <br>
• Samples of media bias in reportage

</td> 
  <td>Lecture, discussion, Learning team activity</td>
  <td>• Researching samples of media bias. <br>
• Learning team presentation.  <br>
• Peer critique and discussion <br>

</td>
</tr>

<tr>
  <td>WEEK 5</td>
  <td>• Stereotypes and over generalizations <br>
• Are limited generalizations okay?  Brief discussion of inductive logic <br>
• Stereotypes and prejudices: overlap and similarities <br>


</td> 
  <td>Lecture, discussion, Learning team activity</td>
  <td>• Learning team preparation and presentation.  <br>
• Peer critique

</td>
</tr>

<tr>
  <td>WEEK 6</td>
  <td>Mid-semester exam: <br>
• Preparation and Review (Day 1) <br>
• Exam (Day 2), based on concepts discussed through Week 5 <br>


</td> 
  <td>EXAM WEEK!</td>
 
</tr>

<tr>
  <td>WEEK 7</td>
  <td>• Multi-perspective thinking vs. single perspective thinking <br>
• Why thinking out of the ‘box’ implies critical and creative thinking <br>
</td> 
  <td>Lecture, discussion, individual presentation</td>
  <td>• Reading assignment <br>
• Application of class discussion in individual presentations

</td>
</tr>


<tr>
  <td>WEEK 8</td>
  <td>• General Semantics and its connection to Critical Thinking <br>
• The theories of Hayakawa and Korzybski

</td> 
  <td>Lecture, discussion, handouts.
Preparation for learning team exercise
</td>
  <td>• Peer  critique of learning team activity <br>
• Reading assignment <br>
</td>
</tr>


<tr>
  <td>WEEK 9</td>
  <td>• The limitations of the GS Paradigm <br>
• Critical and Creative Thinking : case studies<br>
• Practice exercises <br>

</td> 
  <td>Lecture, discussion</td>
  <td>• Reading  and research assignment
</td>
</tr>

<tr>
  <td>WEEK 10</td>
  <td>• De Bone and ‘Po’ thinking <br>
• Informal and formal logic <br>
• Preparation for research paper due by week 12 <br>

</td> 
  <td>Lecture, discussion, Q & A.
Learning team activity
</td>
  <td>• Learning team presentations<br>
• Peer critique

</td>
</tr>
<tr>
  <td>WEEK 11</td>
  <td>• Following the lame calf vs. innovation and thinking for oneself. <br>
</td> 
  <td>Lecture, discussion, learning team activity</td>
  <td>• Reading assignment <br>
• Learning team presentations <br>
• Peer critique <br>

</td>
</tr>
<tr>
  <td>WEEK 12</td>
  <td>• Preparation for Final Exam.  Discussions <br>
• Can one be a consistent critical thinker? Research paper due

</td> 
  <td></td>
  <td>Research paper submission
Preparation for Semester Final Exam

</td>
</tr>

<tr>
  <td>WEEK 13</td>
  <td>Final exam
</td> 
  
</tr>
</table>

      </div>
      <?php }

else if(isset($_GET['live'])){ ?>
  <div id="main" class="card live_hack" style="margin-top:20px;">

</div>
<?php } 
else if(isset($_GET['discussion'])){ ?>
  <div id="main" class="card " style="margin-top:20px;">

</div>
<?php }
else if(isset($_GET['resources'])){ ?>
  <div id="main" class="card " style="margin-top:20px;">
    <h4>Add Resources</h4>
<input type="file" name="file" /><br>
<button class="btn btn-danger">Upload File</button>
</div>
<?php } ?>
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