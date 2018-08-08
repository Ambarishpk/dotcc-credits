<?php
// require_once "dbregister.php";
require_once "phpmailer/class.phpmailer.php";
if(isset($_POST['send']))
{
    $email=trim($_POST['femail']); 
   
   // $sql = "SELECT COUNT(*) AS count from user where email = :email_id";
    try {
      $sql= mysqli_query($DB,"SELECT * FROM user WHERE email='$email'");
      //$num=mysqli_fetch_array($sql);
      // $stmt = $DB->prepare($sql);
      // $stmt->bindValue(":email_id", $email);
      // $stmt->execute();
      // $result = $stmt->fetchAll();
      $result = mysqli_fetch_array($sql);
      $forgetpasswordcode=$result['forgetpasswordcode'];
      $name=$result['name'];
      $id=$result['user_id'];
      if ($result > 0) {
            $message = "     
          Hello $name,
          <br /><br />
          <br /><br />
          <a href=".SITE_URL."resetpassword.php?id=$id&code=$forgetpasswordcode>Click HERE TO CHANGE THE PASSWPRD :)</a>
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
            $msg = "An email has been sent for password reset.";
            $msgType = "success";
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