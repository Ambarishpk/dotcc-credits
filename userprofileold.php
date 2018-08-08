<?php
session_start();
//update profile code
if(isset($_POST['profile']))
{
    include './dbconnection.php';
    $name=$_POST['name'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	if(mysqli_query($DB,"update user set name='$name',first_name='$fname',last_name='$lname' where user_id='".$_SESSION['id']."'")){
        $_SESSION['msg']="Profile Updated successfully";
    }else{
        $_SESSION['msg']="Profile not updated please check parameters";
    }
}



//update user image
if(isset($_POST['uploadimage']))
{
    include('./dbconnection.php');
    $target_dir = "./upload/img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if($_FILES["images"]["name"]==""){

    }else{
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
            $_SESSION['msg']="Profile picture Updated successfully";
        }else{
            $_SESSION['msg']="Profile picture not updated please check parameters";
        }
    }
}


//update password code

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
?>


<style>
input[type=text]{
    width:200px;
    height:10px;
    border:1px dotted;
    background-color:transparent;

}
input[type=submit]{
margin-left:200px;
color:white;
}
input[type=submit]:hover{
    color:#23527c;

}

.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}


</style>

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

<script>
    $(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();
});
</script>

<p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
    <div style="text-align:center;">                      
        <a href="#panel-1" class="btn btn-primary">Update Profile</a>
        <a href="#panel-2" class="btn btn-primary">Change Password</a>
        <a href="#panel-3" class="btn btn-primary">My Activity</a>
        <a href="#panel-4" class="btn btn-primary">Credits</a>
        <a href="#panel-5" class="btn btn-primary">Reputation</a>
</div>


<!--upadate profile-->
<div class="panel panel-info" id="panel-1">
<div class="panel-heading">
<h3 class="panel-title">UPDATE PROFILE</h3>
</div>
<div class="panel-body" >
<div class="row">            
<?php
//selecting info about user and display in form
    include('./dbconnection.php');
    $ret=mysqli_query($DB,"select * from user where user_id='".$_SESSION['id']."'");
    $row=mysqli_fetch_array($ret);
 ?>
<div class="col-md-3 col-lg-3 " align="center" >
<form name="uploadimage" method="post" action="" enctype="multipart/form-data">
<img alt="User Pic" src="./upload/img/<?php echo $row['upload_image']; ?>" class="img-circle img-responsive">
<h5>upload new profile image:<h5>
<input type="file" name="image"> 
<input type="submit" style="margin-left:5px; margin-top:5px;" class="btn btn-primary" name="uploadimage" value="Upload";>
</form>
</div>
<div class=" col-md-9 col-lg-9 "> 
<table class="table table-user-information">
<tbody>
<form  name="form1" method="post" action="">
<tr>
<td>Name:</td>
<td><input type="text" style="height:20px;" name="name" value="<?php echo $row['name']; ?>"></td>
</tr>
<tr>
<td>First Name:</td>
<td><input type="text" name="fname" style="height:20px;" value="<?php echo $row['first_name']; ?>"></td>
</tr>

<tr>
<td>Last Name:</td>
<td><input type="text" name="lname" style="height:20px;" value="<?php echo $row['last_name']; ?>"></td>
</tr>

<tr>
<td>Email:</td>
<td><input type="text" name="email" style="height:20px;" value="<?php echo $row['email'];?>" readonly ></td>
</tr>

<tr>
<td>Date of Birth</td>
<td><input type="text"  name="dob" style="height:20px;" value="<?php echo $row['birthdate'];?>" readonly ></td>                         
</tr>

<tr>
<td>Gender</td>
<td><input type="text"  name="gender" style="height:20px;" value="<?php echo $row['gender'];?>" readonly ></td>
</tr>

<tr>
<td><input type="submit" name="profile" class="btn btn-primary" value="Update" ></div></td>
</tr>

</form>
</tbody>
</table>
</div>
</div>
</div>             
</div>

<!--change password-->
<div class="panel panel-info"  id="panel-2">
<div class="panel-heading">
<h3 class="panel-title">CHANGE PASSWORD</h3><br>
</div>
<div class="panel-body">
<div class="row">            
<form class="form-horizontal style-form" name="form3" method="post" action="" onSubmit="return valid();">
<!--p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p-->
<div class="form-group">
<label  style="float:left; margin-left:30px;" >Old Password : </label>
<div class="col-sm-6" id="old">
<input type="password" class="form-control" name="oldpass" value="" >
</div>
</div>

<div class="form-group">
<label  style="float:left; margin-left:30px;" >New Password : </label>
<div class="col-sm-6">
<input type="password" class="form-control" name="newpass" value="" >
</div>
</div>

<div class="form-group">
<label for="old" style="float:left; margin-left:30px;" >Confirm Password : </label>
<div class="col-sm-6">
<input type="password" class="form-control" name="confirmpassword" value="" >
</div>
</div>
<div style="margin-left:100px;">
<input type="submit" name="passwordupdate" value="Update Password" class="btn btn-theme"></div>
</form>
</div>
</div>
</div>

<!--PLAYED GAMES-->
<div class="panel panel-info" id="panel-3">
<div class="panel-heading"><h3 class="panel-title">MY ACTIVITY</h3></div>
<div class="panel-body"><h1>Progress History </h1></div>
</div>


<!--details point details-->
<div class="panel panel-info" id="panel-4">
<div class="panel-heading">
<h3 class="panel-title">CREDITS</h3></div>
<div class="panel-body"><h1>Credits Point Details</h1></div>
</div>

<!--SHOPPING GIFT DETAILS-->
<div class="panel panel-info" id="panel-5">
<div class="panel-heading">
<h3 class="panel-title">Reputation</h3></div>
<div class="panel-body"><h1>Reputation Details</h1></div>
</div>
