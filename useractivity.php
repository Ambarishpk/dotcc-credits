<?php
  session_start();
  $_SESSION['choosecolor'] = 4;
  require_once('dbconnection.php');

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
  //code for comments
  // include('comments.php');

?>
<link rel="stylesheet" href="assets/css/custom.css">
<link rel="stylesheet" href="assets/css/form-activity.css">


<div id="wrapper">

    <ul id="profileul">
        <!-- <li><a href="home.php">Home</a></li> -->
        <li><a href="profile.php" class="<?php if($_SESSION['choosecolor'] == 1) {  echo "active";} ?>">My Profile</a></li>
        <li><a href="userupdate.php" class="<?php if($_SESSION['choosecolor'] == 2) {  echo "active";} ?>">Update Profile</a></li>
        <li><a href="userpasschange.php " class="<?php if($_SESSION['choosecolor'] == 3) {  echo "active";} ?>">Change Password</a></li>
        <li><a href="useractivity.php" class="<?php if($_SESSION['choosecolor'] == 4) {  echo "active";} ?>">My Activity</a></li>
        <li><a href="usercredits.php" class="<?php if($_SESSION['choosecolor'] == 5) {  echo "active";} ?>">Credits</a></li>
        <li><a href="userreputation.php" class="<?php if($_SESSION['choosecolor'] == 6) {  echo "active";} ?>">Reputation</a></li>
    </ul>

    <div class="main-content">
        <div class="form-activity" >
            <div class="form-title-row">
                <label for="file-input">
                   <h1>My Activities</h1>
                </label>
            </div> 
        </div>
    </div>


</div>

<?php include('./footer.php'); ?>


