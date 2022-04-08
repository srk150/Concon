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
    
    $user = $_POST;
    
    }else{

    $jsondata = file_get_contents("php://input");
    $user     = json_decode($jsondata, true);

    }
    
    
    //get the employee details
    $id = $_COOKIE['id'];
    
    $fname          = $user['fname']; 

    $dob            = $user['dob'];

    $username       = $user['username'];

    $job_fun        = $user['job_fun'];

    $sector         = $user['sector'];

    $message        = $user['message'];
    
    $linkedin_url   = $user['linkedin_url'];
    
    $linkedin_url1  = $user['linkedin_url1'];
    $linkedin_url2  = $user['linkedin_url2'];
    $linkedin_url3  = $user['linkedin_url3'];
    
    $about          = $user['about'];
    $role           = $user['role'];
    $emp_range      = $user['emp_range'];
  
    date_default_timezone_set("America/New_York");  
    $date =  date('Y-m-d');
    $time =  date('H:i');


   
     
    $query = mysqli_query($con,"UPDATE user SET fname='$fname',dob='$dob',username='$username',job_fun='$job_fun',sector='$sector',linkedin_url='$linkedin_url',message='$message',create_date='$date',create_time='$time',about='$about',role='$role',emp_range='$emp_range',linkedin_url1='$linkedin_url1',linkedin_url2='$linkedin_url2',linkedin_url3='$linkedin_url3' WHERE user_id='$id'");
    
    $response = array(

     "status"   => "success",
     "response" => "Update Successfully"
      );



}

else
{

    $response = array(

        "status"   => "error",
        "response" => "Access Denied Method Not Allowed"
    );
}
echo json_encode($response);
?>