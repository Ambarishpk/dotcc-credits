<?php
session_start();
$_SESSION['userlogin']=="";
session_unset();
$_SESSION['action1']="You have logged out successfully..!";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
?>
</script>
