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
    $pass       = $_POST['pass'];
    $pass2      = $_POST['pass2'];
    $uid        = $_POST['uid'];

    }
    else{
    
    $jsondata   = file_get_contents("php://input");
    $user       = json_decode($jsondata, true);
    $pass       = $user['pass'];
    $pass2      = $user['pass2'];
    $uid        = $user['uid'];
   
    }
   
 

   if(empty($pass)){

         $response = array(
            "status" => "error",
            "response" => "Password is Empty!"
             );

        }else  if(empty($pass2)){

         $response = array(
            "status" => "error",
            "response" => "Confirm Password is Empty!"
             );

        }


   else{ 
   
   if($pass == $pass2){
   
   $newpassword     = md5($pass);

   $sqls    = "UPDATE user SET password='$newpassword' WHERE user_id='$uid'";
   $results = mysqli_query($con,$sqls);
   $rows    = mysqli_fetch_array($results,MYSQLI_ASSOC);
   
   $response = array(

        "status" => "success",
        "response" => "Your password has been successfully changed!",
      
         );
  
   }else{
       
       
      $response = array(
            "status" => "error",
            "response" => "Oops the entered password does not match"
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



