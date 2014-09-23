<?php

include "cxn.php";
error_reporting(0);
session_start();
$email = $_SESSION['email_ses'];
$role = $_SESSION['role_ses'];

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
  <h3>Create your Course at Doorado</h3>
 
  

</div>

 <form action="course_page_submit.php" method="post" style="position:relative; padding:20px;  ">
    
    <fieldset id="inputs">
    <input id="Course_id"  name="course_id" type="text" class="form-control" placeholder="Course No." autofocus required> <br>
    <input id="Course_name"  name="course_name" type="text"  class="form-control" placeholder="Course Name" required><br>
  <!-- <select name="Day" style="height:40px; "><br>
    <option value="Monday">Monday</option>
    <option value="Tuesday">Tuesday</option>
    <option value="Wednesday">Wednesday</option>
    <option value="Thursday">Thursday</option>
    <option value="Friday">Friday</option>
    <option value="Saturday">Saturday</option>
    <option value="Sunday">Sunday</option>
    </select><br><br>  -->
   
    <input id="Work" name="work" type="text"  class="form-control" placeholder="Working Hours /Day/Week" required><br>
    <input id="Language"  name="language" type="text"  class="form-control" placeholder="Course Language" required><br>
    <input id="fee"  name="fee" type="text"  class="form-control" placeholder="Course Fee in INR" required><br>
    <input id="credits"  name="credits" type="text"  class="form-control" placeholder="Course Credits" required><br>
    <textarea rows="3" name="details" style="width:100%; height:300px;" class="form-control" placeholder="Enter your course details  ..."></textarea><br>
    <textarea rows="3" name="evaluation" style="width:100%; height:300px;" class="form-control" placeholder="Enter your course Evaluation  ..."></textarea><br>
    <textarea rows="3" name="syllabus" style="width:100%; height:300px;" class="form-control" placeholder="Enter the syllabus  ..."></textarea><br>
    
    
    
  
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
     


    <footer>
<center><br><span style="font-size: 30px;
font-weight: 700; ">Doorado</span><br> Doorado is an educational software, developed at IIIT-Delhi
</center>
    </footer>

      </body>
  </html>