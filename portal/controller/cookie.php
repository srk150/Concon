<?php

include_once 'config.php';


   $user_check = $_COOKIE['user'];

   $ses_sql = mysqli_query($con,"select * from user where email = '$user_check' ");
  
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   
  if(!isset($_COOKIE['user'])){

     header("location:  ../sign-in.php");

     die();

  }

?>