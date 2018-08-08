<?php
  session_start();
  $_SESSION['choosecolor'] = 3;
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

  if(isset($_POST['passwordupdate']))
{
include('./dbconnection.php');
$oldpassword=md5($_POST['oldpass']);
$sql=mysqli_query($DB,"SELECT password FROM admin where password='$oldpassword'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$userid=$_SESSION['id'];
$newpass=md5($_POST['newpass']);
 $ret=mysqli_query($DB,"update user set password='$newpass' where user_id='$userid'");
$_SESSION['msg']="Password Changed Successfully !!";
//header('location:user.php');
}
else
{
$_SESSION['msg']="Old Password not match !!";
}
}

  include('header.php');



?>


<script language="javascript" type="text/javascript">

    function valid()
    {
    if(document.form1.oldpass.value=="")
    {
    alert(" Old Password Field Empty !!");
    document.form1.oldpass.focus();
    return false;
    }
    else if(document.form1.newpass.value=="")
    {
    alert(" New Password Field Empty !!");
    document.form1.newpass.focus();
    return false;
    }
    else if(document.form1.confirmpassword.value=="")
    {
    alert(" Re-Type Password Field Empty !!");
    document.form1.confirmpassword.focus();
    return false;
    }
    else if(document.form1.newpass.value.length<6)
    {
    alert(" Password Field length must be atleast of 6 characters !!");
    document.form1.newpass.focus();
    return false;
    }
    else if(document.form1.confirmpassword.value.length<6)
    {
    alert(" Re-Type Password Field less than 6 characters !!");
    document.form1.confirmpassword.focus();
    return false;
    }
    else if(document.form1.newpass.value!= document.form1.confirmpassword.value)
    {
    alert("Password and Re-Type Password Field do not match  !!");
    document.form1.newpass.focus();
    return false;
    }
    return true;
    }
</script>

	<link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/form-passchange.css">
    
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
    <div class="main-content">

        <!-- For change the Password -->

        <form class="form-passchange" name="form3" method="post" action="" onSubmit="return valid();">

            <div class="form-title-row">
                <label for="file-input">
                   <h1>Change Password</h1>
                </label>
                <?php
                        if($_SESSION['msg'] != "") {
                            echo '<p style="color:#F00;">'; echo $_SESSION['msg']; echo '</p>';
                            echo $_SESSION['msg']="";
                        }
                   ?>
            </div> 

            <div class="form-row">
                <label>
                    <span>Old Password</span>
                    <input type="password" name="oldpass" value="">
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>New Password</span>
                    <input type="password" name="newpass" value="">
                </label>
            </div>
            <div class="form-row">   
                <label>
                    <span>Confirm Password</span>
                    <input type="password" name="confirmpassword" value="">
                </label>
            </div>
           
            <div class="form-row">
                <button type="submit" name="passwordupdate" value="Update Password" class="btn btn-theme">Update</button>
            </div>

        </form>

    </div>
</div>


<?php include("footer.php"); ?>