<?php
session_start();
$msg="";
if (isset($_POST["sub"])) {
    require_once "dbregister.php";
    require_once "phpmailer/class.phpmailer.php";
    $roleid= 1;      //***1-admin***2-user ***   
    $name = trim($_POST["uname"]);
    $password = trim($_POST["pass1"]);
    $email = trim($_POST["email"]);
    $sql = "SELECT COUNT(*) AS count from admin where email = :email_id";
    try {
      $stmt = $DB->prepare($sql);
      $stmt->bindValue(":email_id", $email);
      $stmt->execute();
      $result = $stmt->fetchAll();
      if ($result[0]["count"] > 0) {
        $msg = "Email already exist , Please Try another one ";
        $msgType = "warning";
      } else {
        $activationcode=md5(uniqid(rand()));
        $sql = "INSERT INTO `admin` (`role_id`,`name`,`password`,`activationcode`,`forgetpasswordcode`,`email`) VALUES " . "(:role_id ,:name,:password,:activationcode,:forgetpasswordcode,:email)";
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":role_id", $roleid);
        $stmt->bindValue(":name", $name);
        $stmt->bindValue(":password", md5($password));
        $stmt->bindValue(":activationcode",$activationcode);
        $stmt->bindValue(":forgetpasswordcode",md5(uniqid(rand())));
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $result = $stmt->rowCount();
        if ($result > 0) {
            $lastID = $DB->lastInsertId();
            $id = base64_encode($lastID);
          $message = "     
          Hello ADMIN $name,
          <br /><br />
          Welcome to DotCodeCommunity!<br/>
          To complete your registration  please , just click following link<br/>
          <br /><br />
          <a href=".SITE_URL."activate1.php?id=$id&code=$activationcode>Click HERE to Activate :)</a>
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
          $mail->Subject = trim("Registration - DotCodeCommunity");
          $mail->MsgHTML($message);
          try {
            $mail->send();
            $msg = "An email has been sent for verfication.";
            $msgType = "success";
          } catch (Exception $ex) {
            $msg = $ex->getMessage();
            $msgType = "warning";
          }
        } else {
          $msg = "Failed to create User";
          $msgType = "warning";
        }
      }
    } catch (Exception $ex) {
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

    <title>Admin | Register</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>
	  <div id="login-page">
	  	<div class="container">
      
	  	
		      <form class="form-login" action="" method="post" onsubmit="return validateForm();">
		        <h2 class="form-login-heading">ADMIN REGISTERATION</h2>
            <?php if ($msg <> "") { ?>
                                <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
                                    <button data-dismiss="alert" class="close" type="button">x</button>
                                    <p><?php echo $msg; ?></p>
                                </div>
                                <?php } ?>
		        <div class="login-wrap">
                                    <div class="form-group has-success">
                                        <label class="control-label" for="uname">User-Name </label>
                                        <input class="form-control"  
                                        type="text" name="uname" id="uname">
                                    </div>       
                                    <div class="form-group has-error has-feedback">
                                        <label class="control-label" for="email">Email :-</label>
                                        <input class="form-control" type="email" name="email" id="email"></div>
                                    <div class="form-group has-error has-feedback">
                                        <label class="control-label" for="pass1">Password:- </label>
                                        <input class="form-control" type="password" id="pass1"   style="font-size:20px;" name="pass1"></div>
                                    <div class="form-group has-error has-feedback">
                                        <label class="control-label" for="pass2">Confirm Password:- </label>
                                        <input class="form-control" type="password" name="pass2"   style="font-size:20px;"id="pass2"></i></div>
                                    </div>
                                    <div class="form-group has-warning">
                                        <p class="form-static-control text-lowercase text-center text-info bg-danger" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-seri;">By Clicking Register , verification code will be send to your email-id, after the proper verification you will be able to login to your account successfully.</p>
                                    </div>
                                    <div class="form-group has-warning">
                                        <button class="btn btn-success btn-block" name="sub" type="submit" >Register </button>
                                    </div>
                                    
            <a class="btn btn-theme btn-block" href="./index.php">Admin login!</a>
		        </div>
            
		      </form>	  	
	  	
	  	</div>
	  </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>
    <script>
        
    function validateForm() {
      var your_name = $.trim($("#uname").val());
      var your_email = $.trim($("#email").val());
      var pass1 = $.trim($("#pass1").val());
      var pass2 = $.trim($("#pass2").val());
      // validate name
      if (your_name == "") {
        alert("Enter your name.");
        $("#uname").focus();
        return false;
      } else if (your_name.length < 3) {
        alert("Name must be atleast 3 character.");
        $("#uname").focus();
        return false;
      }
  
      // validate email
      if (!isValidEmail(your_email)) {
        alert("Enter valid email.");
        $("#email").focus();
        return false;
      }
  
      // validate subject
      if (pass1 == "") {
        alert("Enter password");
        $("#pass1").focus();
        return false;
      } else if (pass1.length < 6) {
        alert("Password must be atleast 6 character.");
        $("#pass1").focus();
        return false;
      }
  
      if (pass1 != pass2) {
        alert("Password does not matched.");
        $("#pass2").focus();
        return false;
      }
  
      return true;
    }
  
    function isValidEmail(email) {
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }
  
  
  </script>

  </body>
</html>
