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
    $email_address      = $_POST['email'];
    $password           = $_POST['password'];
    }
    else{
    
    $jsondata           = file_get_contents("php://input");
    $user               = json_decode($jsondata, true);
    $email_address      = $user['email'];
    $password           = $user['password'];
   
    }
   
    $newpassword     = md5($password);
 
    
   if(empty($email_address)){

         $response = array(
            "status" => "error",
            "response" => "Email is Empty!"
             );

        }

    else if(empty($password)){
         $response = array(
            "status" => "error",
            "response" => "Password is Empty!"
             );

        }



else{ 
   
   $sqls = "SELECT * FROM user WHERE email='$email_address' AND password='$newpassword' AND status='1'";
   $results = mysqli_query($con,$sqls);
   $rows    = mysqli_fetch_array($results,MYSQLI_ASSOC);
   $count   = mysqli_num_rows($results);

   if($count == '1'){

        $uid           = $rows['user_id'];
        $username      = $rows['username'];
        $email         = $rows['email'];
        $fullname      = $rows['fname'];

        setcookie('id', $uid, time()+(86400 * 7), '/');
        setcookie('username', $username, time()+(86400 * 7), '/');
        setcookie('user', $email, time()+(86400 * 7), '/');
        setcookie('fname', $fullname, time()+(86400 * 7), '/');
        

        $secret_key = "Test123";
        $issuer_claim = "Concon"; // this can be the servername
        $audience_claim = "THE_AUDIENCE";
        $issuedat_claim = time(); // issued at
        $notbefore_claim = $issuedat_claim + 10; //not before in seconds
        $expire_claim = $issuedat_claim + 60; // expire time in seconds
        $token = array(
            "iss" => $issuer_claim,
            "aud" => $audience_claim,
            "iat" => $issuedat_claim,
            "nbf" => $notbefore_claim,
            "exp" => $expire_claim,
            "data" => array(
                        "user_id" => $rows['user_id'],
                        "fname" => $rows['fname'],
                        "username" =>$rows['username'] ,
                        "email" => $rows['email']
                         )
                   );


         http_response_code(200);

         $jwt = JWT::encode($token, $secret_key);
       

         $tupd = mysqli_query($con,"UPDATE user SET token ='$jwt' WHERE user_id='$uid'");

         /*$jwt = JWT::encode($payload, $key);
         $myarr['name'] = $rows['username'];
         $myarr['email'] = $rows['email'];
         $myarr['jwt'] = $jwt;
        */
        $response = array(

        "status" => "success",
        "message" => "Successful login.",
        "jwt" => $jwt,
        "email" => $email,
        "expireAt" => $expire_claim

         );

        }

    else{

         $response = array(

            "status" => "error",

            "response" => "Email and password do not match!"

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



