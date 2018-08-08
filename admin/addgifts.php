<?php
session_start();
include('dbconnection.php');
include("checklogin.php");
check_login();
if(isset($_POST["category"]))
{


  $target_dir = "../giftimage/";
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
$name=$_POST['catname'];
$desc=$_POST['catdesc'];
$point=$_POST['point'];
$result=mysqli_query($con,"insert into gift (giftname,description,image,pointvalue,active) values ('$name','$desc','$path','$point',1)");
if($result)
{
echo "<script>alert('gift added :-)');</script>";
}
}

if(isset($_POST['delete']))
{
$id=$_POST['id'];
$result=mysqli_query($con,"delete from gift where gift_id='$id'");
if($result)
{
echo "<script>alert('category deleted :-)');</script>";
}
}
?><!DOCTYPE html>
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
      <section id="main-content">
          <section class="wrapper">
     <h3><i class="fa fa-angle-right"></i>Add Gifts </h3>      
    <form method="post" action="" name="category" id="category" enctype="multipart/form-data">
    <label for="cat"><h4>Gift Name:-<h4></label>
    <input id="cat" required="" name="catname" type="text"><br>
    <label for="cat"><h4>Point value:-<h4></label>
    <input id="cat" required="" name="point" type="number"><br>
    <label for="cat"><h4>Gift picture:-<h4></label>
    <input id="cat" name="image" required="" type="file"><br>
    <label for="asd"><h4>Description:-<h4></label>
    <input id="asd" style="height:100px; width:400px; text-align:justify; over-flow:wrap; " name="catdesc" type="text" placeholder="write something about this category" required="">
    <input type="submit" name="category" id="category" class="btn-primary" value="ADD GIFT"> 
    </form>
    <h4><i class="fa fa-angle-right"></i>ALL Gifts</h4>               
            <div class="row">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th>Gift Name</th>
                                  <th>Gift Picture</th>
                                  <th>pointvalue</th>
                                  <th>Description </th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"SELECT * FROM gift");
                                $cnt=1;
                                while($row=mysqli_fetch_array($ret))
                                {
                                  ?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                              <td style="font-size:12px;"><?php echo $row['giftname'];?></td>
                              <td><img alt="User Pic" src="../giftimage/<?php echo $row['image']; ?>" style="width:50px; height:50px;" class="img-circle img-responsive"></td>
                              <td style="font-size:12px;"><?php echo $row['pointvalue'];?></td>
                              <td><p id="content" readonly style="font-size:12px;"><?php echo $row['description'];?></p></td>
                              <td>
                              <a>           
                                  <form action="" method="post" name="delete">                    
                                  <input type="hidden" name="id" value="<?php echo $row['gift_id'];?>">
                                  <button type="submit" name="delete" class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                </form>
                              </td>
                          </tr>
                              <?php $cnt=$cnt+1; }?>
                            
                              </tbody>
                          </table>
                      </div>
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
