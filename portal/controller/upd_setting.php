<?php

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once ('config.php');
require_once ('jwt/src/BeforeValidException.php');
require_once ('jwt/src/BeforeValidException.php');
require_once ('jwt/src/JWK.php');
require_once ('jwt/src/JWT.php');
require_once ('jwt/src/SignatureInvalidException.php');

use Firebase\JWT\JWT;

 
if ($_SERVER['REQUEST_METHOD'] == 'POST')

{
    $web     = $_POST['web'];
   
   if($web =='1'){
    
    $fname      = $_POST['fname'];
    $username   = $_POST['username'];
    $email      = $_POST['email'];
    $dob        = $_POST['dob'];
    $uid        = $_COOKIE['id'];
    
    }else{
    
    $jsondata   = file_get_contents("php://input");
    $user       = json_decode($jsondata, true);
    $fname      = $user['fname'];
    $username   = $user['username'];
    $email      = $user['email'];
    $dob        = $user['dob'];
    $uid        = $user['uid'];
   
    }


    if(empty($fname)){

       $response = array(

        "status" => "error",

        "response" => "Fullname is empty!"

         );

    }else if(empty($email)){
       $response = array(

        "status" => "error",

        "response" => "Email is empty!"

         );

    }else if(empty($dob)){
       $response = array(

        "status" => "error",

        "response" => "DOB is empty!"

         );

    }else{

          
   $sqls    = "UPDATE user SET fname='$fname',email='$email',dob='$dob' WHERE user_id='$uid'";
   $results = mysqli_query($con,$sqls);
   $rows    = mysqli_fetch_array($results,MYSQLI_ASSOC);
   

   if($web =='1'){
    
    header('Location : ../settings.php?succ');

   }else{
    
    $response = array(

        "status" => "success",
        "response" => "Successfully  updated!",
      
         );

   }
   
  
  

  }   

  }


else{

     $response = array(

        "status" => "error",

        "response" => "Access Denied Method Not Allowed!"

         );

   }

//Json decode

echo json_encode($response);

?>



