<?php
if(isset($_POST['login']))
{
  $password = trim($_POST["password"]);
  $useremail = trim($_POST["email"]);
  $dec_password=md5($password);
  $sql= mysqli_query($DB,"SELECT * FROM user WHERE email='$useremail' and password='$dec_password'");
  $num=mysqli_fetch_array($sql);
  $active=$num['active'];
if(isset($_POST['remember'])){
  $re = "on";
}else{
  $re = "";
}
if($num>0){
  if($active==1){
  if($re == "on"){ //remember me checked
    // setcookie("login",$useremail,time() + (86400  * 10));
    // setcookie("password",$dec_password,time() + (86400  * 10));
    $_SESSION['userlogin']=$_POST['email'];
    $_SESSION['id']=$num['user_id'];
    $_SESSION['name']=$num['name'];
    $_SESSION['fname']=$num['first_name'];
    $_SESSION['dob']=$num['birthdate'];
    $_SESSION['lname']=$num['last_name'];
    $_SESSION['gender']=$num['gender'];
    $_SESSION['uimage']=trim($num['upload_image']);
    $extra="home.php";
    $host  = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location:http://$host$uri/$extra");
    exit();
    }else{
    $_SESSION['userlogin']=$_POST['email'];
    $_SESSION['id']=$num['user_id'];
    $_SESSION['name']=$num['name'];
    $_SESSION['fname']=$num['first_name'];
    $_SESSION['dob']=$num['birthdate'];
    $_SESSION['lname']=$num['last_name'];
    $_SESSION['gender']=$num['gender'];
    $_SESSION['uimage']=trim($num['upload_image']);
    $extra="home.php";
    $host  = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location:http://$host$uri/$extra");
    exit();
    }
  }else{
    $msg="email verification is pending please check your email inbox and verify your account or Contact administrator" ; 
    $msgtype="warning";
  }
}
else
{
  $msg="username or password is incorrect";
  $msgtype="warning";
}
}




?>