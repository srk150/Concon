<?php
require_once ('config.php');
require('mailer/class.phpmailer.php');
 
if(isset($_GET['id'])){
   
$id        = mysqli_escape_string($con,$_GET['id']);

//date time function for diff timezone
date_default_timezone_set('America/New_York');
$date =  date('Y-m-d');
$time =  date('H:i');

//for refer code generate and update in user tbl
$refer_code = "Concon_".random_strings(8);
$sqls       = "UPDATE user SET status='1', refer_code='$refer_code' WHERE user_id='$id'";
$results    = mysqli_query($con,$sqls);
$rows       = mysqli_fetch_array($results,MYSQLI_ASSOC);

//check i m refer user 
$chk_im_reflog = mysqli_query($con,"SELECT * FROM ref_log WHERE user_id='$id'");
$imif_ref      = mysqli_num_rows($chk_im_reflog);

if($imif_ref > 0){
    //update my plan status
    $up_reflog     = mysqli_query($con,"UPDATE ref_log SET status='1' WHERE user_id='$id'");
    $up_userplan   = mysqli_query($con,"UPDATE user_plan SET status='1' WHERE user_id='$id'");

}else{

//for user trial plan when user sign up
$plan    = mysqli_query($con , "INSERT INTO `user_plan` (`time`, `date`, `plan`, `type`, `price`, `credit`, `user_id`, `status`) VALUES ('$time', '$date', 'Trial', 'Trial', '0', '0', '$id','1')");

}


    //get user data from user table using uid 
    $sql_user     = mysqli_query($con,"SELECT * FROM user WHERE user_id='$id'");
    $row_get_user = mysqli_fetch_array($sql_user);
    
    $fname = $row_get_user['fname'];
    $email = $row_get_user['email'];
    $linkedin_url  = $row_get_user['linkedin_url'];
    $create_date   = $row_get_user['create_date'];
    
    //get referal data
    $sql_uref        = mysqli_query($con,"SELECT * FROM ref_log WHERE user_id='$id' AND status='1'");
    $row_sql_uref    = mysqli_fetch_array($sql_uref);
    $ref_succ        = mysqli_num_rows($sql_uref);
   
    if($ref_succ > 0){
    
    $ref_name = $row_sql_uref['ref_name'];
    $ref_id   = $row_sql_uref['ref_id'];


    //get refuser data from user table using refid 
    $sql_ref_id        = mysqli_query($con,"SELECT * FROM user WHERE user_id='$ref_id'");
    $row_sql_ref_id    = mysqli_fetch_array($sql_ref_id);
    
    $refercode_name  = $row_sql_ref_id['fname'];
    $refercode_email = $row_sql_ref_id['email'];

    // ref plan of user 
    // $ref_userplan  = mysqli_query($con,"SELECT * FROM user_plan WHERE user_id='$ref_id' ORDER BY id DESC LIMIT 1");
    // $ref_userplan  = mysqli_fetch_array($ref_userplan);


     // refuser  plan  
     $ref_userplan  = mysqli_query($con,"SELECT * FROM user_plan WHERE user_id='$id' ORDER BY id DESC LIMIT 1");
     $ref_userplan  = mysqli_fetch_array($ref_userplan);
    
    $plan_nm      = $ref_userplan['plan'];
    $plan_type    = $ref_userplan['type'];

    }
    
//WHEN USER USER REF CODE THEN MAIL GOTO ADMIN
if($imif_ref > 0){

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
$mail->AddAddress("dbsharukh@gmail.com");
//here is admin email
$mail->Subject = "New user sign up";

$content = "<!DOCTYPE html>
<html>

<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Mail For New Sign-Up</title>
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
                                            <span style='    text-decoration: none;line-height: 24px;font-size: 30px;color: rgb(51, 51, 51);font-weight: bold;'>Hi Admin,</span>
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
                                        <td valign='top' height='25' width='100' style='font-weight:600; color:#000; font-size: 20px; color:#000; font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
                                           We have a new sign-up. Here’s their information.
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
                                        <td valign='top' height='25' width='100' style='font-size: 14px; color: rgb(136, 136, 136); font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
                                           Name:
                                        </td>
                                        <td valign='top'>
                                            <table width='100%' align='center' border='0' cellspacing='0' cellpadding='0' style='height:100%;'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' style='font-size: 14px; color: rgb(51, 51, 51); font-weight: normal; text-align: right; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
                                                            $fname
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                        <td valign='top' height='20' style='font-size: 1px; line-height: 1px;'>
                                        </td>
                                    </tr>
                                    <!-- end space -->
                                    <tr>
                                        <td valign='top' height='25' width='150' style='font-size: 14px; color: rgb(136, 136, 136); font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
                                            Email Address:
                                        </td>
                                        <td valign='top'>
                                            <table width='100%' align='center' border='0' cellspacing='0' cellpadding='0' style='height:100%;'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' style='font-size: 14px; color: rgb(51, 51, 51); font-weight: normal; text-align: right; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
                                                           $email
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                        <td valign='top' height='25' width='100' style='font-size: 14px; color: rgb(136, 136, 136); font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
                                            LinkedIn URL
                                        </td>
                                        <td valign='top'>
                                            <table width='100%' align='center' border='0' cellspacing='0' cellpadding='0' style='height:100%;'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' style='font-size: 14px; color: rgb(51, 51, 51); font-weight: normal; text-align: right; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
                                                            $linkedin_url
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                        <td valign='top' height='25' width='300' style='font-size: 14px; color: rgb(136, 136, 136); font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
                                           Sign-Up Date
                                        </td>
                                        <td valign='top'>
                                            <table width='100%' align='center' border='0' cellspacing='0' cellpadding='0' style='height:100%;'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' style='font-size: 14px; color: rgb(51, 51, 51); font-weight: normal; text-align: right; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
                                                           $create_date
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                        <td valign='top' height='25' width='200' style='font-size: 14px; color: rgb(136, 136, 136); font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
                                           Referred by 
                                        </td>
                                        <td valign='top'>
                                            <table width='100%' align='center' border='0' cellspacing='0' cellpadding='0' style='height:100%;'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' style='font-size: 14px; color: rgb(51, 51, 51); font-weight: normal; text-align: right; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
                                                           $refercode_name
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                        <td valign='top' height='25' width='200' style='font-size: 14px; color: rgb(136, 136, 136); font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
                                           Referral Email
                                        </td>
                                        <td valign='top'>
                                            <table width='100%' align='center' border='0' cellspacing='0' cellpadding='0' style='height:100%;'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' style='font-size: 14px; color: rgb(51, 51, 51); font-weight: normal; text-align: right; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
                                                            $refercode_email
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                        <td valign='top' height='25' width='300' style='font-size: 14px; color: rgb(136, 136, 136); font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
                                            Sign Up For 
                                        </td>
                                        <td valign='top'>
                                            <table width='100%' align='center' border='0' cellspacing='0' cellpadding='0' style='height:100%;'>
                                                <tbody>
                                                    <tr>
                                                        <td valign='top' style='font-size: 14px; color: rgb(51, 51, 51); font-weight: normal; text-align: right; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 140%; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>
                                                          $plan_type  
                                                          $plan_nm 
                                                          Plan

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
    <!-- start table list -->

</tbody>

<tr>
    <td class='footer' bgcolor='#44525f'>
        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr>
                <td align='center' class='footercopy'>
                    <span class='hide'>© 2022-2025 CONCON.AI All Rights Reserved | Designed &amp; Developed By<a href='https://www.developerbazaar.com'><span style='color: red;'> Developer </span><span style='color: limegreen;'> Bazaar</span> <span style='color: red;'> Technologies </span></a></span>
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
//for mail to admin
}


header('Location : ../../sign-in.php?succ');

}


// random refer code generate using this function
function random_strings($length_of_string) 
{ 
    $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; 
    return substr(str_shuffle($str_result), 0, $length_of_string); 
} 

?>