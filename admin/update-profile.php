<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
$msg="";
if(isset($_POST['Submit']))
{
    $name=$_POST['name'];
	$batchno=$_POST['bno'];
	$gender=$_POST['sex'];
    $mobile=$_POST['mob'];
    $email=$_POST['email'];
    $interest=$_POST['interest'];
    // $dob=$_POST['dob'];
    $active=$_POST['active'];
	mysqli_query($con,"update user set name='$name',batchno='$batchno',gender='$gender' ,interest='$interest' ,mobile='$mobile' , email='$email',active=$active  where user_id='".$_GET['uid']."'");
    $_SESSION['msg']="Profile Updated successfully";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Update Profile</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
<?php include('./header.php'); ?>
        <?php include('./sidebar.php'); ?>      
      <?php $ret=mysqli_query($con,"select * from user where user_id='".$_GET['uid']."'");
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> <?php echo $row['name'];?> 's Information</h3>
				<div class="row">
                  <div class="col-md-12">
                      <div class="content-panel">
                      <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p>
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Profile Picture </label>
                              <div class="col-sm-2">
                             <img alt="User Pic" src="../upload/img/<?php echo $row['upload_image']; ?>" class="img-circle img-responsive">
                             </div>
                          </div>
 
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Name </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" >
                              </div>
                          </div>
                         
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Batch No </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="bno" value="<?php echo $row['batchno'];?>" >
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Sex </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="sex" value="<?php echo $row['gender'];?>" >
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Mobile</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="mob" value="<?php echo $row['mobile'];?>" >
                              </div>
                          </div>
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Email </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Interested field</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="interest" value="<?php echo $row['interest'];?>">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Other Skills</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="exception" value="<?php echo $row['exception'];?>" >
                              </div>
                          </div>
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Date of birth </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="dob" value="<?php echo $row['birthdate'];?>" readonly>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Active</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="active" value="<?php echo $row['active'];?>" >
                              </div>
                          </div>
                          <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Update" class="btn btn-theme"></div>
                          </form>
                      </div>
                  </div>
              </div>
		</section>
        <?php } ?>
      </section></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
