<?php
/*
 * @author THAYALAN G R
 */

include('./dbconnection.php');
$msg="";
session_start();
if(isset($_POST['password']))
{
    
$id=$_GET['id'];
$newpass=md5($_POST['newpass']);
$ret=mysqli_query($con,"update admin set password='$newpass' where user_id='$id'");
if($ret){
$_SESSION['msg']="password updated successfully";
}else{
  $_SESSION['msg']= "there is an error in updating password contact administrator";
}
}
?>
 <script language="javascript" type="text/javascript">
function valid()
{
if(document.form1.newpass.value=="")
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


<body>
      <?php
      $ret=mysqli_query($con,"select * from admin where forgetpasswordcode='".$_GET['code']."'");
	  if($row=mysqli_fetch_array($ret))
      {?>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> <?php echo $row['name'];?>- change password</h3>
                <div class="row">             
                <p style="color:#F00; padding-top:20px;" align="center"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                <div class="col-md-12">
                         <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                </div>
                            <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">New Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="newpass" value="" >
                            </div>
                        </div>
                            <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="confirmpassword" value="" >
                            </div>
                        </div>
                        <div style="margin-left:100px;">
                        <input type="submit" name="password" value="Change" class="btn btn-theme"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		</section>
      </section>
      <?php } else { ?>
      
      <h1>code failed please try again</h1> 
        <a href="index.php">go to home page</a>
      
      <?php } ?>
      </body>