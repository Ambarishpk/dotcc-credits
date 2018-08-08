<?php
session_start();
include('dbconnection.php');
include("checklogin.php");
check_login();

if(isset($_POST['submit']))
{  
 $id = $_POST['uid'];
 $text1 = $_POST['text1'];
 $text2 = $_POST['text2'];
 $adddate = date('Y-m-d H:i:s');
 $sql = "INSERT INTO credits(userid,credits,reason,date1) VALUES ('$id','$text1','$text2','$adddate')";
 $result = mysqli_query($con,$sql);
 if(!$result){
    echo "Not Submitted...:-(";
  }
 else{
    echo "Submitted Registered...!";
  }
mysqli_close($con);

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

    <title>Admin | Add Credits</title>
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
          	<h3><i class="fa fa-angle-right"></i>Add Credits</h3>                  
            <div class="row">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <!-- <h4><i class="fa fa-angle-right"></i> All Ideas </h4> -->
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th class="hidden-phone">User-ID</th>
                                  <th> Name</th>
                                  <th> Mail</th>
                                  <th> Recent Credits</th>
                                  <th> Credits</th>
                                  <th> Reason</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"SELECT * FROM user");
                                $cnt=1;
                                while($row=mysqli_fetch_array($ret))
                                {
                                    $uid = $row['user_id'] ;
                                  ?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                              <td style="font-size:12px;"><?php echo $row['user_id'];?></td>
                              <td style="font-size:12px;"><?php echo $row['name'];?></td>
                              <td style="font-size:12px;"><?php echo $row['email'];?></td>
                               <?php $ret2=mysqli_query($con,"SELECT credits FROM credits where userid = $uid ");
                               $cnt=1;
                                while($row=mysqli_fetch_array($ret2))
                                {?>
                                    <td style="font-size:12px;"><?php echo $row['credits'];?></td>
                                 <?php } ?>
                              
                              <input type="hidden" name="uid" value="<?php echo $row['user_id'];?>">
                              <form action="" method="post" id="submit" name="submit" enctype="multipart/form-data">
                              <input type="hidden" name="uid" value="<?php echo $row['user_id'];?>">
                              <td><input type="text" require="" name="text1" id="note" autocomplete="OFF" placeholder="credits here..."></td>
                              <td><input type="text" require="" name="text2" id="note" autocomplete="OFF" placeholder="reason here..."></td>
                              <!-- <input type="hidden" name="adddate" value="<?php echo $row['adddate'];?>"> -->
                              <td>                              
                                  <a href="addcredits.php?id=<?php echo $row['credits_id'];?>"> 
                                  <button type="submit" name="submit" class="btn btn-primary btn-sm">submit</button></a>
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
</section>






<!-- //      <script src="assets/js/jquery.js"></script>
//     <script src="assets/js/bootstrap.min.js"></script>
//     <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
//     <script src="assets/js/jquery.scrollTo.min.js"></script>
//     <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
//     <script src="assets/js/common-scripts.js"></script>
//   <script>
//       $(function(){
//           $('select.styled').customSelect();
//       });

//   </script> -->

  </body>
</html>