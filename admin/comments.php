<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();

if(isset($_GET['id']))
{
  $id=$_GET['id'];
$result=mysqli_query($con,"delete from comments where comment_id='$id'");
if($result)
{
echo "<script>alert('Data deleted');</script>";
}
}

if(isset($_POST['reply']))
{  
$id=$_POST['uuid'];
$text=$_POST['text'];
$ret=mysqli_query($con,"select * from user where user_id='$id'");
$result=mysqli_fetch_array($ret);
if ($result > 0) {
require_once './dbregister.php';
require_once './phpmailer/class.phpmailer.php';
$email=$result['email'];
 $name=$result['name'];
 $adddate=$_POST['adddate'];
$message = "     
Hello $name,
<br /><br />
Reply from TechnKryon!<br/>
  Related to your comment on date:$adddate<br/>
<br /><br />
$text
<br /><br />
Thanks,";
// php mailer code starts
date_default_timezone_set('Etc/UTC');
$mail = new PHPMailer(true);
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host = gethostbyname('ssl://smtp.gmail.com');      // sets GMAIL as the SMTP server
$mail->Port = 465;                   // set the SMTP port for the GMAIL server
$mail->Username = 'grthayalan18@gmail.com';
$mail->Password = '1018@thayalan';
$mail->SetFrom('grthayalan18@gmail.com', 'Thaya');
$mail->AddAddress($email);
$mail->Subject = trim("Email Verifcation - TechnoKryon");
$mail->MsgHTML($message);
try {
  $mail->send();
  $msg = "reply successfully sent";
echo "<script>alert(' $msg:-(');</script>";
unset($_SESSION['uuid']);
unset($_SESSION['date']);

} catch (Exception $ex) {
  $msg = $ex->getMessage();
  echo "<script>alert('$msg:-(');</script>";
}
}else{
echo "<script>alert('there is an error :-(');</script>";
}
}
//download code for attachment
if(isset($_GET["file"])){
    // Get parameters
    $file = $_GET["file"]; 
    $filepath = "../commentsattachment/attachment/".$file;
    // Process download
    if(file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: '. filesize($filepath));
        flush(); // Flush system output buffer
        readfile($filepath);
        exit;
    }
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
       
  <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Creative StartUp Project Ideas</h3>                  
            <div class="row">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All Ideas </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th class="hidden-phone">Name</th>
                                  <th> Email Id</th>
                                  <th> Post Date</th>
                                  <th> Subject</th>
                                  <th> Comments</th>
                                  <th> Attachment</th>
                                  <th> reply</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"SELECT * FROM comments, user WHERE comments.user_id=user.user_id");
                                $cnt=1;
                                while($row=mysqli_fetch_array($ret))
                                {
                                  ?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                              <td style="font-size:12px;"><?php echo $row['name'];?></td>
                              <td style="font-size:12px;"><?php echo $row['email'];?></td>
                              <td style="font-size:10px;"><?php echo $row['adddate'];?></td>
                              <input type="hidden" name="uuid" value="<?php echo $row['user_id'];?>">
                              <td><textarea readonly style="font-size:10px;"><?php echo $row['subject'];?></textarea></td>
                              <td><textarea id="content" readonly style="font-size:12px;"><?php echo $row['content'];?></textarea></td>
                              <td><p class="test"><a href="comments.php?file=<?php echo $row['attachment'];?>" ><?php echo $row['attachment'];?></a></p></td>
                              <form action="" method="post" id="reply" name="reply" enctype="multipart/form-data">
                              <input type="hidden" name="uuid" value="<?php echo $row['user_id'];?>">
                              <input type="hidden" name="adddate" value="<?php echo $row['adddate'];?>">
                              <td><input type="text" require="" name="text" id="note" placeholder="reply here..."></td>
                              <td>                              
                                  <a href="comments.php?uid=<?php echo $row['comment_id'];?>"> 
                                  <button type="submit" name="reply" class="btn btn-primary btn-sm">Reply</button></a>
                                  </form>
                                  <a href="comments.php?id=<?php echo $row['comment_id'];?>"> 
                                  <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
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
