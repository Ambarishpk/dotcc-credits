<?php
  session_start();
  $_SESSION['choosecolor'] = 2;
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

//update user image

if(isset($_POST['uploadimage']))
{
    include('./dbconnection.php');
    $target_dir = "./upload/img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $path=$_FILES["image"]["name"];
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "bmp" ) {
      echo "Sorry, only JPG, JPEG, PNG, GIF & BMP files are allowed.";
    }else{
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }
    if(mysqli_query($DB,"update user set upload_image='$path' where user_id='".$_SESSION['id']."'")){
        $_SESSION['uimage'] = $path;
        $_SESSION['msg']="Profile picture Updated successfully";
    }else{
        $_SESSION['msg']="Profile picture not updated please check parameters";
    }
}


//update profile code
if(isset($_POST['profile']))
{
    $name=$_POST['name'];
	$mobile=$_POST['mobile'];
    $interest=$_POST['interest'];
	$exception=$_POST['exception'];
    
	if(mysqli_query($DB,"update user set name='$name',mobile='$mobile',interest='$interest',exception='$exception' where user_id='".$_SESSION['id']."'")){
        
        $_SESSION['msg']="Profile Updated successfully";
        }else{
        $_SESSION['msg']="Profile not updated please check parameters";
    }
}

?>

<link rel="stylesheet" href="assets/css/custom.css">
<link rel="stylesheet" href="assets/css/form-profile.css">

<div id="wrapper" >
    <ul id="profileul">
            <!-- <li><a href="home.php">Home</a></li> -->
            <li><a href="profile.php" class="<?php if($_SESSION['choosecolor'] == 1) {  echo "active";} ?>">My Profile</a></li>
            <li><a href="userupdate.php" class="<?php if($_SESSION['choosecolor'] == 2) {  echo "active";} ?>">Update Profile</a></li>
            <li><a href="userpasschange.php " class="<?php if($_SESSION['choosecolor'] == 3) {  echo "active";} ?>">Change Password</a></li>
            <li><a href="useractivity.php" class="<?php if($_SESSION['choosecolor'] == 4) {  echo "active";} ?>">My Activity</a></li>
            <li><a href="usercredits.php" class="<?php if($_SESSION['choosecolor'] == 5) {  echo "active";} ?>">Credits</a></li>
            <li><a href="userreputation.php" class="<?php if($_SESSION['choosecolor'] == 6) {  echo "active";} ?>">Reputation</a></li>
        </ul>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#foo')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            return;
        }
    }
</script>
<form name="uploadimage" class="form-profile" method="post" action="" enctype="multipart/form-data">
        <div class="form-title-row">
                <label for="file-input">
                   <h1>My Profile</h1>
                   <?php
                        if($_SESSION['msg'] != "") {
                            echo '<p style="color:#F00;">'; echo $_SESSION['msg']; echo '</p>';
                            echo $_SESSION['msg']="";
                        }
                   ?>
                   
                </label>
            </div> 
            <div class="form-title-row mb-0 pb-0">
                <label for="file-input">
                   <img alt="User Pic" id="foo" src="./upload/img/<?php if($_SESSION['uimage'] != "") { echo $_SESSION['uimage']; } else { echo "avatar_2x.png"; } ?>" class="img-fluid shadow-lg rounded-circle mx-auto" style="max-width:200px; max-height:200px;">
                </label><br>
                <input id="file-input" name="image" type="file"  onchange="readURL(this);"/><br>
                <input type="submit" class="btn btn-primary" style="border-radius:50px;" name="uploadimage" value="Upload"/>
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
                    <input type="text" name="name" value="<?php echo $row['name'];?>" >
                </label>
                <label>
                    <span>Email</span>
                    <input type="text" name="email" value="<?php echo $row['email']; ?>" disabled>
                </label>
                <label>
                    <span>Batch No</span>
                    <input type="text" name="bno" value="<?php echo $row['batchno']; ?>" disabled>
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
                    <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" >
                </label>
                <label>
                    <span>Interested In</span>
                    <input type="text" name="interest" value="<?php echo $row['interest']; ?>" >
                </label>    
                <label>
                    <span>Others</span>
                    <input type="text" name="exception" value="<?php echo $row['exception']; ?>" >
                </label> 
            </div>
                <div class="form-row">
                    <button type="submit" name="profile"  style="border-radius:50px;" class="btn btn-primary">Update</button>
                </div>
            </form>
           


    </div>
</div>

<?php include("footer.php"); ?>