<?php
header("Access-Control-Allow-Origin: * ");

header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Methods: POST");

header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once ('config.php');

require('mailer/class.phpmailer.php');

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

    $fname          = $user['fname']; 

    $dob            = $user['dob'];

    $username       = $user['username'];

    $email          = $user['email'];

    $password       = $user['password'];

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
    $refer_code     = $user['refer_code'];

    $user_id        = uniqid();

    $newpassword     = md5($password);


    date_default_timezone_set("America/New_York");  
    $date =  date('Y-m-d');
    $time =  date('H:i');

    $sql_user        = "SELECT * FROM user WHERE email='$email'";
    $get_result_user = mysqli_query($con,$sql_user);
    $row_get_user    = mysqli_fetch_array($get_result_user,MYSQLI_ASSOC);
    $count_user      = mysqli_num_rows($get_result_user);

    $key = "Test123";

    $payload  = array(
                    'user_id'    =>$user['user_id'], 
                    'fname'      =>$user['fname'], 
                    'username'   =>$user['username'] , 
                    'email'      =>$user['email']
                  );

    

    if (empty($fname))
    {
        $response = array(
            "status" => "error",
            "response" => "Enter Your Full Name"
        );

    }
     elseif (empty($dob))
     {  
        $response = array(
            "status" => "error",
            "response" => "Enter Your DOB "
        );

    }

    elseif (empty($username))
    {  
        $response = array(
            "status" => "error",
            "response" => "Enter Your Username"
        );

    }

    elseif (empty($email))
    {
        $response = array(
            "status" => "error",
            "response" => "Enter Your E-mal"
        );
    }

    elseif (empty($password))
    {
        $response = array(
            "status" => "error",
            "response" => "Enter Your Password"
        );

    }

    elseif (empty($job_fun))
    {
        $response = array(
            "status" => "error",
            "response" => "Select Job Function"
        );
    }
    elseif (empty($sector))
    {
        $response = array(
            "status" => "error",
            "response" => "Select Sector"
        );

    }
    elseif (empty($message))
    {
        $response = array(
            "status" => "error",
            "response" => "Enter Bio"
        );

    }

    elseif ($count_user == '1')
    {
        $response = array(
            "status" => "error",
            "response" => "Email has been already taken"

        );

    }
    else
    {
     
     if(!empty($refer_code)){
        
        //get referral user details
        $get_refer  = mysqli_query($con,"SELECT * FROM user WHERE refer_code='$refer_code'");
        $chk_ref    = mysqli_fetch_array($get_refer);
        $ref_succ   = mysqli_num_rows($get_refer);
        $refer_id   = $chk_ref['user_id'];
        $refer_name = $chk_ref['username'];
        $refer_email= $chk_ref['email'];
        
        //get referral user plan
        $get_refer_upln  = mysqli_query($con,"SELECT * FROM user_plan WHERE user_id='$refer_id' ORDER BY id DESC LIMIT 1");
        
        $get_plan    = mysqli_fetch_array($get_refer_upln);
        $plan_date   = strtotime($get_plan['date']);
        $plan        = $get_plan['plan'];
        $plan_id     = $get_plan['id'];
        $credit      = $get_plan['credit'];
        
        if($plan =='Trial'){
         $earn = "A reward is waiting for you!";
        }else if($plan =='Starter'){
         $earn = "A reward is waiting for you!";
        }else if($plan =='Pro'){
         $earn = "A reward is waiting for you!";
        }else if($plan =='Unlimited'){
         $earn = "A reward is waiting for you!";
        }

        if($ref_succ > 0){

            $ref_logs = mysqli_query($con,"INSERT INTO `ref_log` (`date`, `ref_name`, `fname`, `user_id`, `ref_code`, `ref_id`, `status`, `earn`) VALUES ('$date', '$refer_name', '$username', '$user_id', '$refer_code', '$refer_id', '0', '$earn')");
            
            //for lowest plan with 14 days for reward ref user
            //for expire 15 days
            $fiteen_day_plan =  date('Y-m-d',(strtotime ( '-15 day' , strtotime ($date))));

            $plan    = mysqli_query($con , "INSERT INTO `user_plan` (`time`, `date`, `plan`, `type`, `price`, `credit`, `user_id`, `status`) VALUES ('$time', '$fiteen_day_plan', 'Starter', 'Monthly', '14.99', '75', '$user_id','0')");


            // if($plan =='Trial'){
               
            //    $oneweek_access = date("Y-m-d",strtotime("+7 days",$plan_date));
            //    $ref_user_earn  = mysqli_query($con, "UPDATE user_plan SET date='$oneweek_access' WHERE id='$plan_id'");

            // }else if($plan =='Starter'){
               
            //    $earn_credit = $credit + 25 ;

            //    $ref_user_earn = mysqli_query($con, "UPDATE user_plan SET credit='$earn_credit' WHERE id='$plan_id'");


            // }else if($plan =='Pro'){

            //    $earn_credit = $credit + 125 ;

            //    $ref_user_earn = mysqli_query($con, "UPDATE user_plan SET credit='$earn_credit' WHERE id='$plan_id'");

            // }
//mailfor referal
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
$mail->AddAddress($refer_email);
$mail->AddCC('dbsharukh@gmail.com', 'Admin');
//here is admin email
$mail->Subject = "Referral user sign up";
//for referal user 

$content = "<!DOCTYPE html>
<html>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>Referral Mail For New Sign-Up</title>
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
            font-size: 28px;
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

                <table bgcolor='#000' class='content' align='center' cellpadding='0' cellspacing='0' border='0'>
                   
                    <tr>
                        <td class='innerpadding borderbottom' align='center'>
                            <img class='fix' src='https://forestathome.com/concon/assets/img/concon-logo.png' width='250' height='100%' border='0' alt='' />
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
                                                                <span style='    text-decoration: none;line-height: 24px;font-size: 30px;color: rgb(51, 51, 51);font-weight: bold;'>Hi $refer_name,</span>
                                                            </td>
                                                        </tr>
                                                        <!-- start space -->
                                                       
                                                     
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
                                                            <td valign='top' height='25' width='100' style='font-weight:600; color:#000; font-size: 18px; color:#000; font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
                                                                Thanks so much for spreading the word about <a href='https://concon.ai/'> http://Concon.AI.</a>
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
                                                            <td valign='top' height='25' width='100' style='font-size: 18px; color:#000; font-weight: normal; text-align: center;font-weight:700; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
                                                              Guess what? Someone within your network has used your referral code to sign-up!<br>
                                                              <small style='color:#69d065'>Soon you will get your rewards via mail</small>
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
                      
                    


                        
                        <tr edit-duplicate='' class='relative_index1' dup='0'>
                            <td valign='top'>
                                <table width='100%' edit-style='color_table' align='center' border='0' cellspacing='0' cellpadding='0' style='background-color:#ffffff; border-bottom :2px solid #e8e8e8; ' effect-all='false'>
                                    <tbody>
                                        <tr>
                                            <td valign='top' style='padding-left: 20px; padding-right: 20px;'>
                                                <table width='100%' edit-style='color_table' align='center' border='0' cellspacing='0' cellpadding='0'>
                                                    <!-- start space -->
                                                    <tbody>
                                                        <tr>
                                                            <td valign='top' height='20' style='font-size: 1px; line-height: 1px;' class=''>
                                                            </td>
                                                        </tr>
                                                        <!-- end space -->
                                                        <tr>
                                                            <td valign='top' height='25' width='100' style='font-size: 22px; color: #000; font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; font-weight:700;' panel-color='color_table' editor='content' class='relative_index2'>
                                                                Best<br>

                                                                 <span style='font-size:18px'> All the Prospecting Fanatics at <a href='https://concon.ai'>Concon.AI </span>
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
                        <!-- start table list -->

                    </tbody>

                    <tr>
                        <td class='footer' bgcolor='#44525f'>
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td align='center' class='footercopy'>
                                        <span class='hide'>© 2022-2025 CONCON.AI  All Rights Reserved | Designed &amp; Developed By<a href='https://www.developerbazaar.com'><span style='color: red;'> Developer </span><span style='color: limegreen;'> Bazaar</span> <span style='color: red;'> Technologies </span></a></span>
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
// end mail function for referal
          
        }
     
     }

     $jwt = JWT::encode($payload, $key);
     //insert into mysql table

     $insert = "INSERT INTO `user`(`fname`, `dob`, `username`, `email`, `password` , `job_fun`, `sector`, `linkedin_url`, `message`,`user_id`, `create_date`,`create_time`,`token`,`about`,`role`,`emp_range`,`linkedin_url1`,`linkedin_url2`,`linkedin_url3`) VALUES  ('" . $fname . "','" . $dob . "','" . $username . "','" . $email . "' ,'" . $newpassword . "','" . $job_fun . "','" . $sector . "','" . $linkedin_url . "','" . $message . "','" . $user_id . "','" . $date . "','" . $time . "','" . $jwt . "','" . $about . "','" . $role . "','" . $emp_range . "','" . $linkedin_url1 . "','" . $linkedin_url2 . "','" . $linkedin_url3 . "')";




    $query = mysqli_query($con, $insert);
    $myarr['jwt'] = $jwt;

    // mail to user 

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
    //$mail->AddCC('dbsharukh@gmail.com', 'Admin');
    //here is admin email
    $mail->Subject = "Sign-Up Verification";

    $link = 'https://forestathome.com/concon/portal/controller/verify_acc.php?id='.$user_id;

    $content = "<!DOCTYPE html>

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

<span style='text-decoration: none;line-height: 24px;font-size: 20px;color: rgb(51, 51, 51);font-weight: bold;'>Hi $fname!</span>

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

<td valign='top' height='25' width='100' style='font-size: 14px; color: rgb(136, 136, 136); font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 30px; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>Thank you for signing up for our Concon.ai Portal To get you started, please click on the button below to verify your account for the first time.<br>
<center style='padding-top:10px;padding-bottom:10px;'>
<a href='$link' style='background: #69d065; padding: 10px 50px; margin: 10px; border-radius: 4px;color: #000; font-weight: 700; text-decoration: none;'>verify</a>
</center>

</td>

</tr>



<tr>

<td valign='top' height='25' width='100' style='font-size: 12px; color: #000; font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 30px; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
If you experience any issues logging into your account, reach out to us at support@concon.ai                   

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

<span class='hide'>© 2022-25 CONCON.AI All Rights Reserved | Designed &amp; Developed By<a href='https://www.developerbazaar.com'><span style='color: red;'> Developer </span><span style='color: limegreen;'> Bazaar</span> <span style='color: red;'> Technologies </span></a></span>

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
     "data"     => $myarr,
     "response" => "You Have Successfully Signed Up , Please Check Your Email To Verify Your Account!"
      );

}

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