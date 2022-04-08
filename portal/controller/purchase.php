<?php

include_once 'config.php';

$type = $_GET['type'];
$plan = $_GET['plan'];

$user_id  = $_COOKIE['id'];
$order_id = uniqid();

date_default_timezone_set('America/New_York');
$date =  date('Y-m-d');
$time =  date('H:i');

if(!empty($user_id)){

// get plan 
$get       = mysqli_query($con,"SELECT * FROM package_plan WHERE type='$type' AND plan_name='$plan'");
$getdata   = mysqli_fetch_array($get);
$chk_page  = mysqli_num_rows($get);

$price     = $getdata['price'];
$plan_name = $getdata['plan_name'];
$type      = $getdata['type'];
$credit    = $getdata['credit'];

if($type == "Annual"){

$price  = $price * 12 ;

if($credit =='Unlimited'){

$credit = $credit ;

}else{

$credit = $credit * 12 ;

}

}else{

$price  = $price;
$credit = $credit;

}


$ses_sql = mysqli_query($con,"INSERT INTO `myorder` (`date`, `time`, `order_id`, `user_id`, `plan`, `type`, `amount`) VALUES ('$date', '$time', '$order_id', '$user_id', '$type', '$plan', '$price');");

$plam    = mysqli_query($con , "INSERT INTO `user_plan` (`time`, `date`, `plan`, `type`, `price`, `credit`, `user_id`, `order_id`) VALUES ('$time', '$date', '$plan_name', '$type', '$price', '$credit', '$user_id','$order_id')");

header('location:  ../../pay.php?id='.$order_id);


}else{

header("location:  ../../sign-in.php");

}

?>