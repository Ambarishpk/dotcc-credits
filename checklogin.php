<?php
function check_login()
{
if(strlen($_SESSION['userlogin'])==0)
	{	
		$_SESSION["login"]="";
		return 0;
		
	}
	else{

		return 1;
	}
}
?>