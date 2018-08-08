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
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 offset-md-2 col-sm-12 offset-sm-0">
        <!-- all main contents over here -->


        <div class="row ">
          <div class="col text-center">
            <h2 class="" style="color:#039be5;">Android Development</h2>
          </div>
        </div>
        <div class="row shadow p-4" id="video-container"></div>
        <!--end of  all main contents over here -->
      </div>
    </div>  
  </div>
</div>
  <script src="assets/js/youtube.js"></script>
  <script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()">
  </script>
<?php include('./footer.php'); ?>

