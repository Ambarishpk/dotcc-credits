<?php
function check_login2()
{
if(strlen($_SESSION['userlogin'])!=0)
	{	
        $_SESSION['msg']="";
		// $_SESSION["login"]="";
        $extra="home.php";
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();		

}
}
?>