<?php
  session_start();
  require_once('dbconnection.php');
  include('checklogin1.php');
  check_login1();
  //register code
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
  //code for comments
  // include('comments.php');
?>
<div id="wrapper">
<!-- all main contents over here -->




</div>

    <?php include('./footer.php'); ?>
