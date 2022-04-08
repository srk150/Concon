<?php

require('config.php');
require('stripe.php');

if(isset($_POST['stripeToken'])){

$token     = $_POST['stripeToken'];
$order_id  = $_POST['order_id'];


$get       = mysqli_query($con,"SELECT * FROM myorder WHERE order_id='$order_id'");
$getdata   = mysqli_fetch_array($get);

$user_id   = $getdata['user_id'];
$amount    = $getdata['amount'];
$plan      = $getdata['plan'];
$type      = $getdata['type'];


// get user details 
$get_u       = mysqli_query($con,"SELECT * FROM user WHERE user_id='$user_id'");
$udata       = mysqli_fetch_array($get_u);
$chk_u       = mysqli_num_rows($get_u);
$email       = $udata['email'];
$fname       = $udata['fname'];


//payment gateway integration in stripe
\Stripe\Stripe::setVerifySslCerts(false);

$token=$_POST['stripeToken'];

$charge = \Stripe\Charge::create(array(

		"amount"=> $amount*100,

		"currency"=>"GBP",

		"description"=>"Concon Payment",

		"source"=>$token,

	));

$data        = array('success' => true, 'data'=> $charge);
$data_json   = json_encode($charge);
$data_array  = json_decode($data_json, true);

//echo "<pre>";
$ch_id   = $data_array['id'];
$amounts = $data_array['amount'];
$status  = $data_array['status'];

date_default_timezone_set('America/New_York');
$date =  date('Y-m-d');
$time =  date('H:i');


if($status == 'succeeded'){

//update payment status here
$upd = mysqli_query($con,"UPDATE myorder SET status='1',ch_id='$ch_id',date='$date',time='$time' WHERE order_id='$order_id'");
$upd_plan = mysqli_query($con,"UPDATE user_plan SET status='1',date='$date',time='$time' WHERE order_id='$order_id'");
$upd_user_credit = mysqli_query($con,"UPDATE user SET credits='0',wallet_credit='empty' WHERE user_id='$user_id'");

// php mailer function
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
$mail->Subject = "Purchase Pricing plans";
$link ="https://forestathome.com/concon/sign-in.php";
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

        <td valign='top' height='25' width='100' style='font-size: 14px; color: rgb(136, 136, 136); font-weight: normal; text-align: left; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; word-break: break-word; line-height: 30px; cursor: text;' panel-color='color_table' editor='content' class='relative_index2'>You Have Successfully purchase  <b>$plan Plan $type</b> For More Information Login Our Portal Here:

            <center style='padding-top:10px;padding-bottom:10px;'>
            <a href='$link' style='background: #69d065; padding: 10px 20px; margin: 10px; border-radius: 4px;color: #000; font-weight: 700; text-decoration: none;'>Login</a>
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

if(!$mail->Send()){

echo "Problem sending email.";

}else{

header('Location : ../../thankyou.php?succ');

}


}

}
?>