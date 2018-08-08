<?php
session_start();
include('dbconnection.php');
include("checklogin.php");
check_login();
if(isset($_POST["category"]))
{
$name=$_POST['catname'];
$desc=$_POST['catdesc'];
$result=mysqli_query($con,"insert into category (categoryname,description,active) values ('$name','$desc',1)");
if($result)
{
echo "<script>alert('category added');</script>";
}
}

if(isset($_POST['delete']))
{
$id=$_POST['id'];
$result=mysqli_query($con,"delete from category where category_id='$id'");
if($result)
{
echo "<script>alert('category deleted');</script>";
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
     <h3><i class="fa fa-angle-right"></i>Add Game Category</h3>      
    <form method="post" action="" name="category" id="category" enctype="multipart/form-data">
    <label for="cat"><h4>Category Name:-<h4></label>
    <input id="cat" name="catname" type="text"><br>
    <label for="asd"><h4>Description:-<h4></label>
    <input id="asd" style="height:100px; width:400px; text-align:justify; over-flow:wrap; " name="catdesc" type="text" placeholder="write something about this category">
    <input type="submit" name="category" id="category" class="btn-primary" value="submit"> 
    </form>
    <h4><i class="fa fa-angle-right"></i>ALL Game Categories</h4>               
            <div class="row">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th>Category Name</th>
                                  <th>Description </th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"SELECT * FROM category");
                                $cnt=1;
                                while($row=mysqli_fetch_array($ret))
                                {
                                  ?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                              <td style="font-size:12px;"><?php echo $row['categoryname'];?></td>
                              <td><textarea id="content" style="font-size:12px;"><?php echo $row['description'];?></textarea></td>
                              <td>
                              <a>           
                                  <form action="" method="post" name="delete">                    
                                  <input type="hidden" name="id" value="<?php echo $row['category_id'];?>">
  
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
