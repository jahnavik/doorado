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
$cid="";
if(isset($_GET['c']))
{
    $cid=$_GET['c'];
}
echo $cid;
$q=mysql_query("select * from courses where cid='$cid' ");
$tt=mysql_fetch_assoc($q);
$live_id=$tt['live_id'];

/*
if(isset($_SESSION['email_ses']))
{
  if($_SESSION['role_ses']=="student")
      header("LOCATION:dashboard.php");
  else
     header("LOCATION:instructor_dashboard.php");
} */
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
         .join {
    display: inline;
}
.quit {
    display: none;
}
video {
    float:left;

    margin: 10px;
    width: 200px;
}
<?php echo "#".$live_id; ?>
{
    position: fixed;
    top:150px;
    right:0px;
    width: 50%;
    margin-right: 10%;
    margin-left:10%;
}
    </style>

     <!-- Important Owl stylesheet -->
<link rel="stylesheet" href="owl-carousel/owl.carousel.css">
 
<!-- Default Theme -->
<link rel="stylesheet" href="owl-carousel/owl.theme.css">
 


<script src="owl-carousel/owl.carousel.js"></script>


<link rel="shortcut icon" type="/image/x-icon" href="favicon.png" />
<script type="text/javascript" src="https://api.bistri.com/bistri.conference.min.js"></script>

</head>
  <body style="background:#da4949;">
    <?php include "headbar.php"; ?>

<?php if($role=='teacher' || ($role=='student' && $live_id!='')) { ?>
 <div style="position:relative; top:70px;" id="main_live">
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
function master_t()
{
    var f= $(".video-container video:first").attr("id");
    //alert(f);
    $('#temp').load("master_t.php?on&c=<?php echo $cid; ?>&id="+f);
    
}
function close_t()
{

    $('#temp').load("master_t.php?off&c=<?php echo $cid; ?>&id="+f);
       
}
    </script>
  <center>  <input type="button" value="Join Live Class" onclick="joinRoom(); <?php if($role=="teacher")
  {
    echo "master_t();";
  } ?>" class="join btn btn-success" \>
    <input type="button" value="Quit Live Class" onclick="quitRoom();<?php if($role=="teacher")
  {
    echo "close_t();";
  } ?>" class="quit btn btn-danger" \> </center>


<div class="video-container"  class="card"></div>

</div>
<?php 
}
if($role=='student' && $live_id=='') {
    ?>

 <div style="position:relative; top:70px;" id="main_live">

  <center>  
<h1>Class hasn't started yet. Please wait and come back later.</h1>

  </center>


<div class="video-container"  class="card"></div>

</div>
    <?
}
?>
<div id="temp"></div>
  

      </body>
  </html>