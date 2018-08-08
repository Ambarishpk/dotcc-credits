<?php
session_start();
require_once "dbregister.php";
require_once "phpmailer/class.phpmailer.php";
if(isset($_POST['password']))
{
    $email=$_POST['femail'];
    $sql = "SELECT COUNT(*) AS count from admin where email = :email_id";
    try {
      $stmt = $DB->prepare($sql);
      $stmt->bindValue(":email_id", $email);
      $stmt->execute();
      $result = $stmt->fetchAll();
      $forgetpasswordcode=$result['forgetpasswordcode'];
      $name=$result['name'];
      $id=$result['user_id'];
      if ($result[0]["count"] > 0) {
            $message = "     
          Hello $name,
          <br /><br />
          <br /><br />
          <a href=".SITE_URL."admin/resetpassword.php?id=$id&code=$forgetpasswordcode>Click HERE TO CHANGE THE PASSWPRD :)</a>
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
          $mail->Username = 'dotcodecommunity@gmail.com';
          $mail->Password = 'dotcc@123';
          $mail->SetFrom('dotcodecommunity@gmail.com', 'dotCC');
          $mail->AddAddress($email);
          $mail->Subject = trim("Reset Password - DotCodeCommunity");
          $mail->MsgHTML($message);
          try {
            $mail->send();
            $_SESSION['action1']="An email has been sent for password reset.";
            $extra="index.php";
            echo "<script>window.location.href='".$extra."'</script>";
            exit();
          } catch (Exception $ex) {
            $msg = $ex->getMessage();
            $msgType = "warning";
          }
        }
        else
        {
            echo "<script>alert('Email not register with us');</script>";	
        }
    }
    catch (Exception $ex) {
        $msg= $ex->getMessage();
        $msgtype="warning";
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

    <title>Admin | forgot password</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>
	  <div id="login-page">
	  	<div class="container">      
		      <form class="form-login" action="" method="post">
		        <h2 class="form-login-heading">Forgot Password</h2>
                  <p style="color:#F00; padding-top:20px;" align="center"><?php echo $_SESSION['action1'];?><?php echo $_SESSION['action1']="";?></p>
                  <?php if ($msg <> "") { ?>
                                <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
                                    <button data-dismiss="alert" class="close" type="button">x</button>
                                    <p><?php echo $msg; ?></p>
                                </div>
                                <?php } ?>
		        <div class="login-wrap">
		            <input type="text" name="femail" class="form-control" placeholder="enter your registerd email id" autofocus>
		            <br>
		            <input  name="password" class="btn btn-theme btn-block" type="submit">
		        </div>
            <a class="btn btn-theme btn-block" href="./index.php">login here</a>
		      </form>	  	
	  	</div>
	  </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
