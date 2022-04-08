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
   
    $jsondata = file_get_contents("php://input");
    $user     = json_decode($jsondata, true);
    $token    = $user['token'];
    
    $results  = mysqli_query($con,"SELECT * FROM user WHERE token='$token' AND status='1'");
    $count    = mysqli_num_rows($results);
    $rows     = mysqli_fetch_array($results);

    // make sure data is not empty
   if(empty($token)){
        
      $response = array(
                  "status" => "error",
                  "response" => "Please Enter Token!"
                   );

        }

  else{ 

   if($count == '1'){

     //$uid           = $rows['user_id'];
     // $username      = $rows['username'];
     // $email         = $rows['email'];
     // $fullname      = $rows['fname'];
     // $token         = $rows['token'];
     
      $response = array(

                  "status" => "success"
      
                    );


     }else{
      
      $response = array(
                  "status" => "error",
                  //"response" => "Authentication Token  Does not Match!",
                  "response" => "Please Enter Valid Token!"

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



