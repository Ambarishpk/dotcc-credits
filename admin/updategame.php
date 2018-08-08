<?php
session_start();
include('dbconnection.php');
include("checklogin.php");
check_login();
$msg="";
if(isset($_POST["uploadgame"])) {
$file = $_FILES["game"];
$filename = $file["name"];
$tmp_name = $file["tmp_name"];
$type = $file["type"];
$name = explode(".", $filename);
$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
if(in_array($type,$accepted_types)) { //If it is Zipped/compressed File
  $okay = true;
} 
$continue = strtolower($name[1]) == 'zip' ? true : false; //Checking the file Extension
if(!$continue) {
  $message = "The file you are trying to upload is not a .zip file. Please try again.";
  $_SESSION['msg']=$message;
}

/* here it is really happening */
  //$ran = $name[0]."-".time()."-".rand(1,time());
  $ran = $name[0];
  $targetdir = "../games/gamefiles/".$ran;
  $targetzip = "../games/gamefiles/".$ran.".zip";
$filename = "../games/gamefiles/".$ran;
$indexfile = "../games/gamefiles/".$ran."/index.html";
if (file_exists($filename))
{
  $msg= " The file exists";
  echo "<script>alert( '$msg');</script>";
/*    if(file_exists($indexfile))
    {
$sql="DELETE FROM games WHERE ftppath='$indexfile'";
$result = $conn->query($sql) or die("DB FAIL"); 
    }*/
    $dir = $filename;
    $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
    $files = new RecursiveIteratorIterator($it,
                 RecursiveIteratorIterator::CHILD_FIRST);
    foreach($files as $file) {
        if ($file->isDir()){
            rmdir($file->getRealPath());
        } else {
            unlink($file->getRealPath());
        }
    }
    //rmdir($dir);
//rmdir($filename);
} 
$targetdir = "../games/gamefiles/".$ran;
$targetzip = "../games/gamefiles/".$ran.".zip";
if(move_uploaded_file($tmp_name, $targetzip)) { //Uploading the Zip File
  
  /* Extracting Zip File */
  $zip = new ZipArchive();
  $x = $zip->open($targetzip);  // open the zip file to extract
  if ($x === true) {
      $zip->extractTo($targetdir); // place in the directory with same name  
      $zip->close();
      unlink($targetzip); //Deleting the Zipped file
      $message = "Your file was uploaded , unpacked patching in process :-)";
      echo "<script>alert( '$message');</script>";
  }
$filename = "../games/images/".$ran."/index.html";
if (file_exists($targetdir)) {
  $msg= "The index file exists";
  echo "<script>alert( '$msg');</script>";

if(mysqli_query($con,"update `games` set `ftppath`='$filename' , `editdate`='". date("Y-m-d H:i:s")."' where `game_id`='".$_SESSION['temp']."'")){
$msg="successfully patched :-)"; 
$_SESSION['msg']=$msg;
} else {
    $msg="patch failed:-(";
    echo "<script>alert( '$msg');</script>";
}   
}else {    
  $message = "There was a problem with the upload. Please try again.";
  echo "<script>alert( '$message');</script>";
}
}
}










if(isset($_POST['uploadimage']))
{
    $target_dir = "../games/images/";
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
    if(mysqli_query($con,"update games set image='$path' where game_id='".$_SESSION['temp']."'")){
 
        $_SESSION['msg']="game picture Updated successfully";
    }else{
      $_SESSION['temp']="";
        $_SESSION['msg']="game picture not updated please check parameters";
    }
}



if(isset($_POST['Submit']))
{
$name=$_POST['name'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
mysqli_query($con,"update user set name='$name',first_name='$fname',last_name='$lname' , email='$email' where user_id='".$_GET['uid']."'");
$_SESSION['msg']="GAME Updated successfully";
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

<title>Admin | Manage Users</title>
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/style-responsive.css" rel="stylesheet">
</head>

<body>

<section id="container" >
<?php include('./header.php'); ?>
<?php include('./sidebar.php'); ?>
<?php $ret=mysqli_query($con,"select * from games,category where game_id='".$_GET['uid']."' AND category.category_id=games.category_id");
$row=mysqli_fetch_array($ret); 
$_SESSION['temp']=$_GET['uid'];
?>
<section id="main-content">
<section class="wrapper">
<h3><i class="fa fa-angle-right"></i>UPDATE GAME - <?php echo $row['gamename'];?> </h3>                  
<div class="row">
<strong style="background-color:yellow;">  <?php echo $_SESSION['msg'];  $_SESSION['msg']=""; ?> </strong>
<div class="col-md-3 col-lg-3 " align="center" >
<form name="uploadimage" method="post" action="" enctype="multipart/form-data">
<img alt="User Pic" src="../games/images/<?php echo $row['image']; ?>" class="img-circle img-responsive">
<h5>upload new game image:<h5>
<input class="form-control" type="file" name="image"> 
<input class="btn-success btn-sm" type="submit" style="margin-left:5px; margin-top:5px;" name="uploadimage" value="Upload";>
</form>
</div>
<div class=" col-md-9 col-lg-9 "> 
<table class="table table-user-information">
<tbody>
<form class="form-control"  name="form1" method="post" action="" enctype="multipart/form-data">
<tr>
<td>Game Name:</td>
<td><input class="form-control" type="text" name="gname" value="<?php echo $row['gamename']; ?>"></td>
</tr>


<tr>
<td>Category Name:</td>
<td>
    <select class="form-control" id="category" name="category"  required="">
    <option value="<?php echo $row["category_id"]; ?>"><?php echo $row["categoryname"]; ?></option>
    <?php
    $sql = "SELECT * FROM category";
    $resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
    while( $rows = mysqli_fetch_assoc($resultset) ) {
    ?>
    <option style="color:black;" value="<?php echo $rows["category_id"]; ?>"><?php echo $rows["categoryname"]; ?></option>
    <?php }	?>
    </select>
</td>
</tr>
<tr>
<td>FTP Path:</td>
<td><input type="text" class="form-control" readonly name="ftp" readonly value="<?php echo $row['ftppath']; ?>"></td>
</tr>
<tr>
<td>ADD date:</td>
<td><input type="text" class="form-control" name="edate" readonly value="<?php echo $row['adddate']; ?>"></td>
</tr>

<tr>
<td>EDIT date</td>
<td><input type="text" name="adate" class="form-control" value="<?php echo $row['editdate'];?>" readonly ></td>
</tr>



<tr>
<td>levels</td>
<td>
<input type="number" class="form-control" name="level" placeholder="<?php echo $row['levels'];?>">  </td>
</tr>

<tr>
<td><input type="submit"  class="btn-warning btn-sm" name="profile" value="Update" ></div></td>
</tr>

</form>
<form name="uploadgame" class="form-control"  method="post"  action=""  enctype="multipart/form-data">
<h4>Patch update : <h4>
<input type="file" class="form-control" name="game"> 
<input type="submit"  class="btn-primary btn-sm" style="margin-left:5px; margin-top:5px;" name="uploadgame" value="patch";>
</form>

</tbody>
</table>
</div>
</div>
</section>
</section>
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
