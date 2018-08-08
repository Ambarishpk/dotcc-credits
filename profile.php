<?php
  session_start();
  $_SESSION['choosecolor'] = 1;
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
<link rel="stylesheet" href="assets/css/form-profile.css">


<div id="wrapper" >

    <div class="main-content">
        <ul id="profileul">
            <!-- <li><a href="home.php">Home</a></li> -->
            <li><a href="userprofile.php" class="<?php if($_SESSION['choosecolor'] == 1) {  echo "active";} ?>">My Profile</a></li>
            <li><a href="userupdate.php" class="<?php if($_SESSION['choosecolor'] == 2) {  echo "active";} ?>">Update Profile</a></li>
            <li><a href="userpasschange.php " class="<?php if($_SESSION['choosecolor'] == 3) {  echo "active";} ?>">Change Password</a></li>
            <li><a href="useractivity.php" class="<?php if($_SESSION['choosecolor'] == 4) {  echo "active";} ?>">My Activity</a></li>
            <li><a href="usercredits.php" class="<?php if($_SESSION['choosecolor'] == 5) {  echo "active";} ?>">Credits</a></li>
            <li><a href="userreputation.php" class="<?php if($_SESSION['choosecolor'] == 6) {  echo "active";} ?>">Reputation</a></li>
        </ul>
        <!-- Display the User Details -->
        <form name="uploadimage" class="form-profile" method="post" action="" enctype="multipart/form-data">
        <div class="form-title-row">
                <label for="file-input">
                   <h1>My Profile</h1>
                </label>
            </div> 
            <div class="form-title-row mb-0 pb-0">

                <label for="file-input">
                   <img alt="User Pic" src="./upload/img/<?php if($_SESSION['uimage'] != "") { echo $_SESSION['uimage']; } else { echo "avatar_2x.png"; } ?>" class="img-fluid shadow-lg rounded-circle mx-auto" style="max-width:200px;">
                </label><br>
                <!-- <input id="file-input" type="file"/><br>
                <input type="submit" class="btn btn-primary" style="border-radius:50px;" name="uploadimage" value="Upload"/> -->
            </div>
            </form>
            <form name="form1" class="form-profile mt-0 pt-0 text-center" method="post" action="">
            <?php
              //selecting info about user and display in form
               include('./dbconnection.php');
               $ret=mysqli_query($DB,"select * from user where user_id='".$_SESSION['id']."'");
               $row=mysqli_fetch_array($ret);
               ?>
            <div class="form-row "> 
                <label>
                    <span>Name</span>
                    <input type="text" name="name" value="<?php echo $row['name'];?>" disabled >
                </label>
                <label>
                    <span>Email</span>
                    <input type="text" name="email" value="<?php echo $row['email']; ?>" disabled>
                </label>
                <label>
                    <span>Batch No</span>
                    <input type="text" name="email" value="<?php echo $row['batchno']; ?>" disabled>
                </label>
                <label>
                    <span>date of Birth</span>
                    <input type="text" name="dob" value="<?php echo $row['birthdate']; ?>" disabled>
                </label>
                <label>
                    <span>Gender</span>
                    <input type="text" name="gender" value="<?php echo $row['gender']; ?>" disabled>
                </label>
                <label>
                    <span>Mobile</span>
                    <input type="text" name="fname" value="<?php echo $row['mobile']; ?>" disabled>
                </label>
                <label>
                    <span>Interested in</span>
                    <input type="text" name="lname" value="<?php echo $row['interest']; ?>" disabled>
                </label>    
                <label>
                    <span>Others</span>
                    <input type="text" name="lname" value="<?php echo $row['exception']; ?>" disabled>
                </label> 
            </div>
            </form>
            <!--<div class="form-row">
                <button type="submit">Login</button>
            </div>-->

    </div>

</div>

<?php include('./footer.php'); ?>


