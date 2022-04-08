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

    $authentication_token      = $user['token'];
    
   

    $sqls    = "SELECT * FROM user WHERE token='$authentication_token' AND status='1'";

    $results = mysqli_query($con,$sqls);

    $rows    = mysqli_fetch_array($results,MYSQLI_ASSOC);

    $count   = mysqli_num_rows($results);

    // make sure data is not empty
    $credits = $rows['credits'];
    $user_id = $rows['user_id'];

    //$uid           = $rows['user_id'];
    $username      = $rows['username'];
    $email         = $rows['email'];
    $fullname      = $rows['fname'];
    $token         = $rows['token'];
    $wallet_credit = $rows['wallet_credit'];

     // available plan credit
    $user_plan  = mysqli_query($con,"SELECT * FROM user_plan WHERE user_id='$user_id' AND status='1' ORDER BY id DESC LIMIT 1");
    $get_plan    =  mysqli_fetch_array($user_plan);
    $credit_plan =  $get_plan['credit'];
    $id_plan     =  $get_plan['id'];
    $date_plan   =  $get_plan['date'];
    $plan        =  $get_plan['plan'];
    $type        =  $get_plan['type'];
    
    if($type =='Trial'){
    
    $datefor    =  date('Y-m-d', strtotime('+1 week', strtotime($date_plan)));

    }else if($type =='Annual'){
    
    $datefor   = date('Y-m-d',strtotime('+1 years', strtotime($date_plan)));

    }else if($type =='Monthly'){

    $datefor    =  date('Y-m-d', strtotime('+1 month', strtotime($date_plan)));

    }


   date_default_timezone_set('America/New_York');
   $cdate =  date('Y-m-d');
   $time  =  date('H:i');



   if(empty($authentication_token)){

         $response = array(
                     "status" => "error",
                     "response" => "Authentication Token  is Empty!"
                     );

   }else{

   if($count > 0 ){
         
      if($type =='Trial'){

         if($datefor > $cdate){

                 $total_credits = $credits + 1 ;

                 $sqls = mysqli_query($con,"UPDATE user SET credits='$total_credits' WHERE token='$token'");
                 
                 $response = array(

                 "status" => "success",
                 "credit" => $total_credits
                  
                  );

            }else{
               

               $response = array(

                        "status" => "error",

                        "response" => "Trial Plan is Expire,Please Upgrade Your Plan!"

                         );

            }
 
                 

         }else if($type =='Monthly'){

            if($datefor > $cdate){


               if($plan =='Unlimited'){

                 $total_credits = $credits + 1 ;

                 $sqls = mysqli_query($con,"UPDATE user SET credits='$total_credits' WHERE token='$token'");
                 
                 $response = array(

                 "status" => "success",
                 "credit" => $total_credits
                  
                  );

               }else{

             
               if($wallet_credit !='0'){
                 
                 if($wallet_credit =='empty'){

                 $remove_credit_from_plan = $credit_plan - 1 ;

                 }else{

                 $remove_credit_from_plan = $wallet_credit - 1 ;

                 }

                 $total_credits = $credits + 1 ;

                 $sqls = mysqli_query($con,"UPDATE user SET credits='$total_credits',wallet_credit='$remove_credit_from_plan' WHERE token='$token'");
                 
                 $response = array(

                 "status" => "success",
                 "credit" => $total_credits
                  
                  );

            }else{

                   $response = array(

                        "status" => "error",

                        "response" => "Insuffitient Credit, Please Upgrade Your Plan!"

                         );

                  }



                  }

                 
                 

                 }else{


                  $response = array(

                        "status" => "error",

                        "response" => "Your Monthly Plan is Expire,Please Upgrade Your Plan!"

                         );

                 }


         }else if($type =='Annual'){


               if($datefor > $cdate){
                 
                 if($plan =='Unlimited'){

                 $total_credits = $credits + 1 ;
                 
                 $sqls = mysqli_query($con,"UPDATE user SET credits='$total_credits' WHERE token='$token'");
                 
                 $response = array(

                 "status" => "success",
                 "credit" => $total_credits
                  
                  );
                
                }else{
                       
                     
             
               if($wallet_credit !='0'){
                 
                 if($wallet_credit =='empty'){

                 $remove_credit_from_plan = $credit_plan - 1 ;

                 }else{

                 $remove_credit_from_plan = $wallet_credit - 1 ;

                 }

                 $total_credits = $credits + 1 ;

                 $sqls = mysqli_query($con,"UPDATE user SET credits='$total_credits',wallet_credit='$remove_credit_from_plan' WHERE token='$token'");
                 
                 $response = array(

                 "status" => "success",
                 "credit" => $total_credits
                  
                  );

            }else{

                   $response = array(

                        "status" => "error",

                        "response" => "Insuffitient Credit, Please Upgrade Your Plan!"

                         );

                  }



                     }

                 }else{


                 $response = array(

                        "status" => "error",

                        "response" => "Your Annual Plan is Expire,Please Upgrade Your Plan!"

                         );

                 }

            }

        }

    else{

         $response = array(

            "status" => "error",

            "response" => "Authentication Token  Does not Match!"

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