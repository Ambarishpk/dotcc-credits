<?php
function maindiv(){
  include('./checklogin.php');
  $a=check_login();
  if($a==1){
    include './loggedindiv.php';
  }else{
    include './logindiv.php'; 
    }
}
?>