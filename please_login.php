<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Doorado</title> 
   <meta name="description" content= ""  />
        <meta name="keywords" content="" />         
      <!-- Google Webfonts and our stylesheet -->
        <script src="jquery.js"></script>
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
</head>
  <body>
  <a href="#" style="margin-right:10px;" onclick="create_modal('login_modal'); return false;">Please Login to Join the Course</a>
   


   <div class="overlay_modal" id="login_modal">
  <div class="overlay_modal_body">
 <center>Login to your Doorado Account</center>

  <form action="login.php" method="post" style="position:absolute; left:15%; width:30% ; top:150px">
    Student Login
    <fieldset id="inputs">
                <input id="username" name="email" type="text" class="form-control" placeholder="Email" autofocus required>   
                <input id="password" name="password" type="password"  class="form-control" placeholder="Password" required>
            </fieldset>
                     <div id=err style=" width: 300px; height: 10px; align : left; color: #C00; font-weight:normal;  line-height: 1; font: 14px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif;  ">
            
      
      <?php if ($err==1)
        {
          echo '<p id="invalid"  summary="datapass">';
          echo "<strong> Invalid username/password. Try Again!</strong> </p>";
        }
        
        
        if ($err==2)
        {
          echo '<p id="invalid"  summary="datapass"></p>';
          echo "Please enter Username or Password.";
        }
        ?>    

            </div>
 
            <fieldset id="actions">
                <input  type="submit" id="submit"  class="btn btn-danger" value="Sign in">
                      
             
                  </fieldset>
               </form>
                 
  <form style="position:absolute; left:55%; width:30%; top:150px" action="login.php" method="post">
    Instructor Login
    <fieldset id="inputs">
                <input id="username" name="email" type="text" class="form-control" placeholder="Email" autofocus required>   
                <input id="password" name="password" type="password"  class="form-control" placeholder="Password" required>
            </fieldset>
                     <div id=err style=" width: 300px; height: 10px; align : left; color: #C00; font-weight:normal;  line-height: 1; font: 14px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif;  ">
            
      
      <?php if ($err==1)
        {
          echo '<p id="invalid"  summary="datapass">';
          echo "<strong> Invalid username/password. Try Again!</strong> </p>";
        }
        
        
        if ($err==2)
        {
          echo '<p id="invalid"  summary="datapass"></p>';
          echo "Please enter Username or Password.";
        }
      ?>    

            </div>
 
            <fieldset id="actions">
                <input  type="submit" id="submit" class="btn btn-danger" value="Sign in">
                      
             
                  </fieldset>
  </form>




  </div>
   </div>

</div>

  </form>


</div>
</div>
   
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