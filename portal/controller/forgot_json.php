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
    
    }
    else{
    
    $jsondata = file_get_contents("php://input");
    $user = json_decode($jsondata, true);
    $email_address      = $user['email'];
   
   
    }
   
 

   if(empty($email_address)){

         $response = array(
            "status" => "error",
            "response" => "Email is Empty!"
             );

        }


   else{ 
   
   $sqls = "SELECT * FROM user WHERE email='$email_address'";
   $results = mysqli_query($con,$sqls);
   $rows    = mysqli_fetch_array($results,MYSQLI_ASSOC);
   $count   = mysqli_num_rows($results);

   if($count == '1'){

    $uid           = $rows['user_id'];
    $username      = $rows['username'];
    $email         = $rows['email'];
    $fullname      = $rows['fname'];
        
        
    require('mailer/class.phpmailer.php');
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port     = 587;  
    $mail->Username = "aqeeqecommerce@gmail.com";
    $mail->Password = "arpit@123";
    $mail->Host     = "smtp.gmail.com";
    $mail->Mailer   = "smtp";
    $mail->SetFrom("db.rahulpatwari@gmail.com",    "Concon.Ai");
    $mail->AddReplyTo("db.rahulpatwari@gmail.com", "Concon.Ai");
    $mail->AddAddress($email);
    $mail->Subject = "Reset Password";

    $link = 'https://forestathome.com/concon/upd_password.php?id='.$uid;

    $content="<!DOCTYPE html>

<html>



<head>

<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

<title>New Enquiry</title>

<style type='text/css'>

body {

margin: 0;

padding: 0;

min-width: 100%!important;

}



img {

height: auto;

}



.content {

width: 100%;

max-width: 600px;

}



.header {

padding: 40px 30px 20px 30px;

}



.innerpadding {

padding: 30px 30px 30px 30px;

}



.borderbottom {

border-bottom: 1px solid #f2eeed;

}



.subhead {

font-size: 15px;

color: #fff;

font-family: sans-serif;

letter-spacing: 10px;

}



.h1,

.h2,

.bodycopy {

color: #fff;

font-family: sans-serif;

}



.h1 {

font-size: 24px;

line-height: 38px;

font-weight: bold;

}



.h2 {

padding: 0 0 15px 0;

font-size: 24px;

line-height: 28px;

font-weight: bold;

}



.bodycopy {

font-size: 16px;

line-height: 22px;

}



.button {

text-align: center;

font-size: 18px;

font-family: sans-serif;

font-weight: bold;

padding: 0 30px 0 30px;

}



.button a {

color: #ffffff;

text-decoration: none;

}



.footer {

padding: 20px 20px 15px 20px;

}



.footercopy {

font-family: sans-serif;

font-size: 12px;

color: #ffffff;

font-weight: 600;

}



.footercopy a {

color: #ffffff;

text-decoration: none;

}



@media only screen and (max-width: 550px),

screen and (max-device-width: 550px) {

body[yahoo] .hide {

display: none!important;

}

body[yahoo] .buttonwrapper {

background-color: transparent!important;

}

body[yahoo] .button {

padding: 0px!important;

}

body[yahoo] .button a {

background-color: #e05443;

padding: 15px 15px 13px!important;

}

body[yahoo] .unsubscribe {

display: block;

margin-top: 20px;

padding: 10px 50px;

background: #2f3942;

border-radius: 5px;

text-decoration: none!important;

font-weight: bold;

}

}

/*@media only screen and (min-device-width: 601px) {

.content {width: 600px !important;}

.col425 {width: 425px!important;}

.col380 {width: 380px!important;}

}*/

</style>

</head>



<body yahoo bgcolor='#f6f8f1'>

<table width='100%' bgcolor='#f6f8f1' border='0' cellpadding='0' cellspacing='0'>

<tr>

<td>



<table bgcolor='#ffffff' class='content' align='center' cellpadding='0' cellspacing='0' border='0' style='background: #000;'>

<tr>

<td bgcolor='#000000' class='header' style='text-align: center;
    display: table;
    margin: 0 auto;'>
<center>
<table width='150' align='left' border='0' cellpadding='0' cellspacing='0'>

<tr>

<td height='40' style='padding: 0 20px 20px 0;'>

<img class='fix' src='https://forestathome.com/concon/assets/img/concon-logo.png' width='200' height='' border='0' alt=''/>

</td>

</tr>

</table>
</center>


<!-- <table class='col425' align='left' border='0' cellpadding='0' cellspacing='0' style='width: 100%; max-width: 425px;'>

<tr>

<td height='70'>

<table width='100%' border='0' cellspacing='0' cellpadding='0'>

<tr>

<td class='h1' style='padding: 5px 0 0 0;'>CONCON.AI

</td>

</tr>





</table>

</td>

</tr>

</table>
 -->


</td>

</tr>

<tbody>

<tr edit-duplicate='' class='relative_index1' dup='0'>

<td valign='top'>

<table width='100%' edit-style='color_table' align='center' border='0' cellspacing='0' cellpadding='0' style='background-color:#ffffff; ' effect-all='false'>

<tbody>

<tr>

<td valign='top' style='padding-left: 20px; padding-right: 20px;'>

<table width='100%' edit-style='color_table' align='center' border='0' cellspacing='0' cellpadding='0'>

<!-- start space -->

<tbody>

    <tr>

        <td valign='top' height='30' style='font-size: 1px; line-height: 1px;'>

        </td>

    </tr>

    <!-- end space -->

    <tr>

        <td valign='top' height='25' width='100' style='font-size: 18px; color: rgb(51, 51, 51); font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 120%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>

            <span style='text-decoration: none;line-height: 24px;font-size: 20px;color: rgb(51, 51, 51);font-weight: bold;'>Hi $fullname!</span>

        </td>

    </tr>

</tbody>

</table>

</td>

</tr>

</tbody>

</table>

</td>

</tr>

<!-- end heading -->





<!-- start table list -->

<tr edit-duplicate='' class='relative_index1' dup='0'>

<td valign='top'>

<table width='100%' edit-style='color_table' align='center' border='0' cellspacing='0' cellpadding='0' style='background-color:#ffffff; ' effect-all='false'>

<tbody>

<tr>

<td valign='top' style='padding-left: 20px; padding-right: 20px;'>

<table width='100%' edit-style='color_table' align='center' border='0' cellspacing='0' cellpadding='0' style='border-bottom :1px solid #e8e8e8;'>

<!-- start space -->

<tbody>

    <tr>

        <td valign='top' height='20' style='font-size: 1px; line-height: 1px;' class=''>

        </td>

    </tr>

    <!-- end space -->

    <tr>

        <td valign='top' height='25' width='100' style='font-size: 14px; color: rgb(136, 136, 136); font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 30px; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>We received a request to reset the password for your account.
        To reset your password , click on the button below:<br>
            <center style='padding-top:10px;padding-bottom:10px;'>
            <a href='$link' style='background: #69d065; padding: 10px 20px; margin: 10px; border-radius: 4px;color: #000; font-weight: 700; text-decoration: none;'>Reset Password</a>
            </center>
            
      </td>

    </tr>



     <tr>

        <td valign='top' height='25' width='100' style='font-size: 12px; color: #000; font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 30px; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
        If you did not initiate this request, please contact us immediately at support@concon.ai                  

        </td>

    </tr>



    

    <!-- start space -->

    <tr>

        <td valign='top' height='20' style='font-size: 1px; line-height: 1px;'>

        </td>

    </tr>

    <!-- end space -->

</tbody>

</table>

</td>

</tr>

</tbody>

</table>

</td>

</tr>

<!-- end table list -->



<!-- end table list -->

<!-- start table list -->

<tr edit-duplicate='' class='relative_index1' dup='0'>

<td valign='top'>

<table width='100%' edit-style='color_table' align='center' border='0' cellspacing='0' cellpadding='0' style='background-color:#ffffff; ' effect-all='false'>

<tbody>

<tr>

<td valign='top' style='padding-left: 20px; padding-right: 20px;'>

<table width='100%' edit-style='color_table' align='center' border='0' cellspacing='0' cellpadding='0' style='border-bottom :1px solid #e8e8e8;'>

<!-- start space -->

<tbody>

    <tr>

        <td valign='top' height='20' style='font-size: 1px; line-height: 1px;'>

        </td>

    </tr>

    <!-- end space -->

    <tr>

        <td valign='top' height='25' width='100' style='font-size: 14px; color: rgb(136, 136, 136); font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>Regards,<br>The Concon.ai Support Team

        </td>

    </tr>

    <!-- start space -->

    <tr>

        <td valign='top' height='20' style='font-size: 1px; line-height: 1px;' class=''>

        </td>

    </tr>

    <!-- end space -->

</tbody>

</table>

</td>

</tr>

</tbody>

</table>

</td>

</tr>

<!-- end table list -->

</tbody>



<tr>

<td class='footer' bgcolor='#000'>

<table width='100%' border='0' cellspacing='0' cellpadding='0'>

<tr>

<td align='center' class='footercopy'>

<span class='hide'>© 2021-25 CONCON.AI All Rights Reserved | Designed &amp; Developed By<a href='https://www.developerbazaar.com'><span style='color: red;'> Developer </span><span style='color: limegreen;'> Bazaar</span> <span style='color: red;'> Technologies </span></a></span>

</td>

</tr>

</table>

</td>

</tr>

</table>

</td>

</tr>

</table>



</td>

</tr>

</table>

</body>



</html>";

   
    $mail->MsgHTML($content);
    $mail->IsHTML(true);
    $mail->Send();
    

       
        $response = array(

        "status"   => "success",
        "response" => "An email has been sent, Please check your email inbox for a password recovery link!",
      
         );

        }

    else{

         $response = array(

            "status" => "error",

            "response" => "The email address you entered isn't connected to an account!"

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



