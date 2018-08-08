<?php
function check_login1()
{
if(strlen($_SESSION['userlogin'])==0)
	{	
        $_SESSION['msg']="you are not loged in please login to continue :)";
		$_SESSION["login"]="";
        $extra="index.php";
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();		

}
}
?>