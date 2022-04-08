<?php

//require('portal/controller/config.php');
require('portal/controller/cookie.php');
require('portal/controller/stripe.php');

$id  = $_GET['id'];

//get plan details
$get       = mysqli_query($con,"SELECT * FROM myorder WHERE order_id='$id'");
$getdata   = mysqli_fetch_array($get);
$chk_page  = mysqli_num_rows($get);

$price     = $getdata['amount'];
//$user_id   = $getdata['user_id'];


// get user details 
$user_id     = $_COOKIE['id'];

$get_u       = mysqli_query($con,"SELECT * FROM user WHERE user_id='$user_id'");
$udata       = mysqli_fetch_array($get_u);
$chk_u       = mysqli_num_rows($get_u);
$email       = $udata['email'];


if($chk_page > 0){

?>
<!DOCTYPE html>
<html lang="en">
 <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--favicon icon-->
<link rel="icon" href="assets/img/concon-fav.png" type="image/png" sizes="32x32"> 
<!--title-->
<title>concon.ai</title>    <!--build:css-->

<!----css----->
<?php include 'include/css.php';?>
<link rel="stylesheet" href="assets/css/hover.css">
<!----css----->
<!-- endbuild -->
<style>
.pay-section {
display: -webkit-box;
display: -ms-flexbox;
display: flex;
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
-ms-flex-direction: column;
flex-direction: column;
-webkit-box-align: center;
-ms-flex-align: center;
align-items: center;
-webkit-box-pack: center;
-ms-flex-pack: center;
justify-content: center;
min-height: 100vh;
}
.stripe-button-el span {
background: #69d065!important;
border-color: #69d065!important;
}
.stripe-button-el {
width: 50%;
border: unset!important;
background-image: unset!important;
height: 50px;
display: block!important;
margin: 25px auto!Important;
}
.stripe-button-el span {
background: #69d065!important;
border-color: #69d065!important;
height: 50px!important;
padding: 10px 0!Important;
}

.footer-with-newsletter {
    margin-top: 0px;
}

/*.bg-light-set{
background-image: url(assets/images/pay-bg.png);
    background-size: contain;
    background-repeat: no-repeat;
}*/
</style>
</head>


<body>

      <!--header section start-->
          <?php include 'include/header.php';?>
        <!--header section end-->

<section class="pay-section bg-light-set">
<div class="container">
<div class="row mt-5">

<!------->  


<div class="col-6 mx-auto pt-5">
<!-- <div class="shadow pb-3"> -->
    <div class=" pb-3 mt-3 text-center">
  <img class="w-50" src="assets/images/pay-side-img.png"></div>  
<form action="portal/controller/payout.php" method="post">

<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"

data-key="<?php echo $publishableKey?>"

data-amount= "<?php echo ($price * 100); ?>"

data-name="Concon"

data-description="Concon Payment"

data-image="https://forestathome.com/concon/assets/img/concon-logo.png"

data-currency="GBP"

data-email = "<?php echo $email; ?>"

>

</script>

<input type="hidden" name="order_id" value="<?php echo $id; ?>">

</form>
</div>

<div class="col-6 mx-auto pt-5">

<img class="img-fluid" src="assets/images/point-.jpg">
</div>
</div><!----->


</section>

<footer class="footer-1 gradient-bg ptb-60 footer-with-newsletter">
<!--subscribe newsletter start-->
<div class="container">

</div>
<!--subscribe newsletter end-->
<div class="container">
<div class="row">
    <div class="col-md-12 col-lg-4 mb-4 mb-md-4 mb-sm-4 mb-lg-0">
        <a href="#" class="navbar-brand mb-2">
            <img src="assets/img/concon-logo.png" alt="logo" class="img-fluid" width="200" style="background: #000;
    padding: 10px;
    border-radius: 14px;">
            
        </a>
        <br>
        <p>Prospect with confidence knowing you are focusing your time on the right potential customers.</p>
        
    </div>
    <div class="col-md-12 col-lg-4 mb-4 mb-md-4 mb-sm-4 mb-lg-0">
        
        <h6 class="text-uppercase">Link</h6>
        <ul>
            <li>
                <a href="#">Privacy Policy</a>
            </li>
            <li>
                <a href="#">Terms &amp; Conditions</a>
            </li>
            <li>
                <a href="#">Support</a>
            </li>
            
        </ul>
    </div>
    <div class="col-md-12 col-lg-4 mb-4 mb-md-4 mb-sm-4 mb-lg-0">
        
        <h6 class="text-uppercase">Social Media</h6>
        <div class="list-inline social-list-default background-color social-hover-2 mt-2">
            <li class="list-inline-item"><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item"><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li>
            <li class="list-inline-item"><a class="linkedin" href="#"><i class="fab fa-linkedin-in"></i></a></li>
            
        </div>
    </div>
</div>
<!--end of container-->
</div></footer>
<div class="footer-bottom py-3" style="background:#000">
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="copyright-wrap text-center small-text">
                <p class="center mb-0 text-white" style="font-size: 14px !important;">© 2021 - 2025 <a href="#" style="color:#69d065">CONCON.AI</a>- All Rights Reserved | Designed &amp; Developed By<a href="https://www.developerbazaar.com"> <strong> <span style="color: red;"> Developer </span><span style="color: limegreen;"> Bazaar</span> <span style="color: red;"> Technologies</span> </strong> </a></p>
            </div>
        </div>
        <!--  <div class="col-md-6 col-lg-5">
            
        </div> -->
    </div>
</div>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
function disableBack() {
window.history.forward()
}
window.onload = disableBack();
window.onpageshow = function(e) {
if (e.persisted)
disableBack();
}
});
</script>

<?php } else{ 

//header('Location : https://kwikisweeps.com/404.php');
echo "Access Denied!"; 
 }

?>
