<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();

if(isset($_GET['id']))
{
$id=$_GET['id'];
$msg=mysqli_query($con,"delete from games where game_id='$id'");
if($msg)
{
echo "<script>alert('Game files deleted :-)');</script>";
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
    <script src="https://use.fontawesome.com/6e1f898155.js"></script>
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
            <h3><i class="fa fa-angle-right"></i>ALL Games</h3>                  
            <div class="row">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All GAMES Details </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th class="hidden-phone">Game Name</th>
                                  <th class="hidden-phone">Game category</th>
                                  <th class="hidden-phone">FTP Path</th> 
                                  <th> NO of Levels</th>
                                  <th> ADD Date</th>
                                  <th> EDIT Date</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from games,category where category.category_id=games.category_id");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                              <td><?php echo $row['gamename'];?></td>
                                  <td><?php echo $row['categoryname'];?></td>
                                  <td><?php echo $row['ftppath'];?></td>
                                  <td><?php echo $row['levels'];?></td>
                                  <td><?php echo $row['adddate'];?></td>
                                  <td><?php echo $row['editdate'];?></td>
                                  <td>                              
                                     <a href="updategame.php?uid=<?php echo $row['game_id'];?>"> 
                                     <button class="btn btn-primary btn-default"><i class="fa fa-pencil">update</i></button></a>
                                     <a href="allgames.php?id=<?php echo $row['game_id'];?>"> 
                                     <button class="btn btn-danger btn-default" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o ">delete</i></button></a>
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
