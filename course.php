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
$c_fee=$row3['fee'];
$credits_h=$row3[credits];
$credits=$credits_h.' Credits';
$fee=$c_fee.'INR';
$language=$row3['language'];
$hours=$row3['hours'];
$evaluation=$row3['evaluation'];
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

$query6="SELECT * FROM quiz WHERE cid='$cid'";
$result6=mysql_query($query6);
$num_q=mysql_num_rows($result6);




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

<!--  jQuery 1.7+  -->
<script src="jquery.js"></script>
<link rel="shortcut icon" type="/image/x-icon" href="favicon.png" />
<script type="text/javascript" src="https://api.bistri.com/bistri.conference.min.js"></script>

</head>
  <body>
     <script type="text/javascript">
/*
 * Need some explanations about this code ? Take a look at our API tutorial:
 * https://api.developers.bistri.com/tutorial
 */

onBistriConferenceReady = function () {
    
    var room = "myMeetingRoom";

    // at first we test if the browser is WebRTC enable
    if (!BistriConference.isCompatible()) {
        alert("your browser is not WebRTC compatible !");
        return;
    }

    window.localStreamReady = false;

    /*
     * this is the function called when the button "Join Conference" is pressed
     */
    window.joinRoom = function () {

        // if the local stream (webcam) is ready 
        if (!window.localStreamReady) {
            alert("local media is not ready");
            return;
        }

        // then when are ready to join the conference room called "myMeetingRoom"
        BistriConference.joinRoom(room);
    };

    /*
     * this is the function called when the button "Quit Conference" is pressed
     */
    window.quitRoom = function () {

        // We stop calls with all conference room members
        BistriConference.endCalls(room);

        // then we quit the conference room
        BistriConference.quitRoom(room);
    };

    /*
     * API is initialized with personal keys
     * To get your own keys, go to https://api.developers.bistri.com/login
     * debug is set to true to print some logs in the javascript console
     */
    BistriConference.init({
        // don't forget to replace the following keys by your own
        appId: "32d816e0",
        appKey: "d4c9e78676d1359c4e2d545ed1170abc",
        debug: true
    });

    /*
     * we add a handler to manage "onConnected" event triggered by the signaling server
     * this event occurs when user is connected to the signaling server
     */
    BistriConference.signaling.addHandler("onConnected", function () {
        
        // we are now connected to the signaling server, 
        // we can request access to the user webcam
        BistriConference.startStream("webcamSD",function(localStream){

            window.localStreamReady = true;
            
            var node = document.querySelector('.video-container');

            // we "insert" the local video stream into a container
            BistriConference.attachStream(localStream, node, {
                // video auto start after being inserted
                autoplay: true,
                // video switch to fullscreen when user click on it
                fullscreen: true
            });
        });
    });

    /*
     * we add a handler to manage "onJoinedRoom" event triggered by the signaling server
     * this event occurs when user join the conference room
     */
    BistriConference.signaling.addHandler("onJoinedRoom", function (result) {

        // we entered the conference room.
        // we request a call start with every single member already present in the room
        var roomMembers = result.members;
        for (var i = 0; i < roomMembers.length; i++) {
            BistriConference.call(roomMembers[i].id,room);
        }

        // we hide "Join Conference" button
        document.querySelector(".join").style.display = "none";

        //  and show "Quit Conference" button
        document.querySelector(".quit").style.display = "inline";
    });

    /*
     * we add a handler to manage "onJoinRoomError" event triggered by the signaling server
     * this event occurs when user fails to join the conference room
     */
    BistriConference.signaling.addHandler("onJoinRoomError", function (error) {

        // we can't handle more than 4 participants in a same room (for performance issue) 
       alert(error.text+" ("+error.code+")" );
    });

    /*
     * we add a handler to manage "onQuittedRoom" event triggered by the signaling server
     * this event occurs when user has quitted the conference room
     */
    BistriConference.signaling.addHandler("onQuittedRoom", function (data) {

        // we hide "Quit Conference" button
        document.querySelector(".quit").style.display = "none";

        // and we show "Join Conference" button
        document.querySelector(".join").style.display = "inline";

    });

    /*
     * we add a handler to manage "onStreamAdded" event triggered by the stream manager
     * this event occurs when a local or remote video stream is received
     */
    BistriConference.streams.addHandler("onStreamAdded", function (remoteStream, pid) {
        
         var node = document.querySelector('.video-container');

        // we "insert" the video stream into a container
        BistriConference.attachStream(remoteStream, node, {
            // video auto start after being inserted
            autoplay: true,
            // video switch to fullscreen when user click on it
            fullscreen: true
        });
    });

    /*
     * we add a handler to manage "onStreamClosed" event triggered by the stream manager
     * this event occurs when a local or remote stream is closed
     */
    BistriConference.streams.addHandler("onStreamClosed", function (remoteStream, pid) {

        // we remove the video stream from the page
        BistriConference.detachStream(remoteStream);
    });

    // we open a session on the signaling server
    BistriConference.connect();

}
    </script>
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

<a href="course.php?c=<?php echo $cid;?>&live" style="text-decoration:none;color:#FFF;margin-right:10px;<?php if(isset($_GET['live']))
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
    </div>
 
    <?php if(!isset($_GET['discussion']) && !isset($_GET['live'])  && !isset($_GET['resources']) && !isset($_GET['assignments']) && !isset($_GET['quizzes'])&& !isset($_GET['grades'])) { ?> 
  
 <center>
  <div style="margin-top:20px;">
  <br>
  <button class="btn btn-primary" style="width:20%"><?php if($num==1) {echo 'Leave Course'; } else {echo 'Join Course';} ?></button>
    </div>

    </center>  
         <div id="main" class="card" style="margin-top:20px;">

<div class="half" style="margin-right:28px; position:relative;">


<h2>Evaluation</h2>
<?php echo $evaluation; ?>
<hr>
 

</div> 
 <div class="half" style="margin-right:28px; position:relative;">
<h2>Instructor </h2>
<a href="#"><?php echo $t_name;?> </a>
<br>
<h2>Texts </h2>

 </div>  
    </div>
      <div id="main" class="card " style="margin-top:20px;">

        <center><h2>Course Syllabus</h2></center>
<?php echo $syllabus; ?>
        
      </div>
      <?php }

else if(isset($_GET['live'])){ ?>
  <div id="main" class="card " style="margin-top:20px;">
<div>
  <center>  <input type="button" value="Join Live Class" onclick="joinRoom();" class="join btn btn-default" \>
    <input type="button" value="Quit Live Class" onclick="quitRoom();" class="quit btn btn-danger" \> </center>
</div>
<div class="video-container"></div>
</div>
<?php } 
else if(isset($_GET['discussion'])){ ?>
  <div id="main" class="card " style="margin-top:20px;">

</div>
<?php }
else if(isset($_GET['assignments'])){ ?>
  <div id="main" class="card " style="margin-top:20px;">
<a href="">+ Add Assignment</a>
</div>

<?php }
else if(isset($_GET['quizzes'])){ ?>
  <div id="main" class="card " style="margin-top:20px;">
    <?php $i=0;
    while($i<$num_q)
{
  $q_id=mysql_result($result6,$i,"qid");
?>
<a href="attempt_quiz.php?c=<?php echo  $q_id;?> " style="margin-right:10px;" ><?php echo $q_id;?></a><br>
<?php
$i++;
}?>

</div>

<?php }

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