<?php
  session_start();
  include('dbconnection.php');
  //checking login and redirecting to index page
  //below 2 lines are hidden because public users can also view this page without restriction for user login
  include('checklogin1.php');
  check_login1();
  //register code
  // include('register.php');
  //login code
  // include('login.php');
  //deciding whether div in login or loggedin
  include('decidelogin.php');
  //including header
  include('header.php');
  //including login register popup module as modal
  // include('loginlogoutmodel.php');
  //forget password code
  // include('forgetpasswordcode.php');
  //including leftpan
  // include('leftpan.php');
?>
   

<div id="wrapper">

<!-- all main contents over here -->
<!-- <div class="container-fluid pt-4">
  <div class="row">
    <div class="col-md-8 col-sm-12 col-md-offset-2 text-center">
      <h2 class="" style="color:#039be5;">Courses</h2>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8 col-sm-12 col-md-offset-2">
      <div class="row" id="courseContainer">
      
      </div>
    </div>
</div>
</div> -->

<!-- <!DOCTYPE html> -->
<!-- <html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css"> -->

  <!-- <style>
    #content,
    #authorize-button,
    #signout-button {
      display: none
    }
  </style> -->

  <!-- <title>YouTube Channel Data</title> -->
<!-- </head> -->

<!-- <body> -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 col-sm-12">
      <div class="row ">
        <div class="col text-center">
          <h2 class="" style="color:#039be5;">Courses</h2>        
        </div>
      </div>
      <div class="row shadow p-4"  id="video-container">

      </div>
    </div>
  </div>
</div>
  <!-- <nav class="black">
    <div class="nav-wrapper">
      <div class="container">
        <a href="#!" class="brand-logo">YouTube Channel Data</a>
      </div>
    </div>
  </nav>
  <br> -->
  <!-- <section>
    <div class="container">
      <p>Log In With Google</p>
      <button class="btn btn-primary red" id="authorize-button">Log In</button>
      <button class="btn red" id="signout-button">Log Out</button>
      <br>
      <div id="content">
        <div class="row">
          <div class="col s6">
            <form id="channel-form">
              <div class="input-field col s6">
                <input type="text" placeholder="Enter Channel Name" id="channel-input">
                <input type="submit" value="Get Channel Data" class="btn grey">
              </div>
            </form>
          </div>
          <div id="channel-data" class="col s6"></div>
        </div>
        <div class="row" id="video-container"></div>
      </div>
    </div>
  </section> -->

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script> -->
  <script src="assets/js/youtube.js"></script>
  <script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()">
  </script>
  </div>
<!-- </body>
</html>
</div> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="./assets/js/youtube.js" type="text/javascript"></script> -->



<?php include('./footer.php'); ?>

