<?php 
include 'controller/cookie.php';
$uid        = $_COOKIE['id'];
$user_plan  = mysqli_query($con,"SELECT * FROM user_plan WHERE user_id='$uid' AND status='1' ORDER BY id DESC LIMIT 1");
$get_plan   = mysqli_fetch_array($user_plan);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="">
    <!-- Twitter meta-->
   
    <title>Admin| CONCON.AI</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->

   <?php include 'include/header.php';?>
   
    <main class="app-content">
      
   
      <div class="row mt-5">
        <div class="col-md-4">
          <div class="tile">
            <h3 class="tile-title">Current <?php if($get_plan['plan'] !='Trial'){ echo $get_plan['type']; }?> Plan : <b style="color: #9fe6a0;"><?php echo $get_plan['plan'];?></b></h3>
 
           <center> <img src="https://forestathome.com/concon/assets/img/priching-img-1.png"></center>
            <div class="pricing-header pt-3 pb-3">
              <?php
              $pric = explode(".", $get_plan['price']);
              $plans =  $get_plan['plan'];
              $types =  $get_plan['type'];
              ?>
            <div class="price text-center mb-0 monthly-price color-secondary" style="display: block;">£<?php echo $pric[0];?><span>.<?php echo $pric[1];?></span></div>
            </div>
            <ul class="list-unstyled mb-4">
                        
                        <?php 
                        $get_ser  = mysqli_query($con,"SELECT * FROM package_service WHERE plan_type='$plans'");
                        while($service = mysqli_fetch_array($get_ser)){
                        ?>
                        <li><span><?php echo $service['feature'] ;?></span></li>
                        <?php } ?>
                       <!--  <li><span>15</span> customize sub page</li>
                        <li class="text-deem"><span>105</span> disk space</li>
                        <li class="text-deem"><span>3</span> domain access</li>
                        <li class="text-deem">24/7 phone support</li> -->
                    </ul>
           
          </div>
        </div>
        <div class="col-md-8">
          <div class="">
            <h3 class="tile-title">Current Plan</h3>

            <div class="row">
                 <div class="col-md-6">
                      <div class="widget-small coloured-icon" style="background:#67c069;"><i class="icon la la-calendar-times-o la-lg"></i>
            <div class="info">
              <h4> Expires On</h4>
              <?php
              $datep    = strtotime($get_plan['date']);

              $week     = date("Y-m-d",strtotime("+7 days",$datep));
              $mnth_add = date("Y-m-d",strtotime("+1 month",$datep));
              $yr_add   = date('Y-m-d',strtotime('+1 years',$datep));

              ?>
              <p><b><?php if(!empty($get_plan['date'])){ if($types =="Monthly" && $plans !='Trial'){ echo $mnth_add; }else if($types =="Annual" && $plans !='Trial'){ echo $yr_add ; }else{ echo $week; } }?></b></p>
            </div>
          </div>
                 </div>


                  <div class="col-md-6">
                      <div class="widget-small coloured-icon" style="background:#67c069;"><i class="icon la la-cc-mastercard la-lg"></i>
            <div class="info">
              <h4>Credits</h4>
              <p><b><?php if($get_plan['credit'] =='0'){ echo "Unlimited access for a week" ; } else if($get_plan['credit'] =="Unlimited"){ echo "Unlimited access"; } else{ echo $get_plan['credit'] ;} ?></b></p>
            </div>
          </div>
                 </div>


                  <div class="col-md-6">
                      <div class="widget-small coloured-icon" style="background:#67c069;"><i class="icon la la-users la-lg"></i>
            <div class="info">
              <h4>Users</h4>
              <p><b>2</b></p>
            </div>
          </div>
                 </div>


                 <div class="col-md-6">

                  <div class="widget-small coloured-icon" style="background:#67c069;"><i class="icon la la-paste la-lg"></i>
            <div class="info">
              <h4>Renew your plans</h4>
              <p><b>
                   
                   <a class="text-white" href="pricing-plans.php">Click</a>
                <!-- <a class="text-white" href="../index.php" target="_blank">Click</a> -->

              </b></p>
            </div>
          </div>
                     
                </div>  

                <div class="col-md-12">
                     
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">All Items</h3>
              
            </div>
            <div class="tile-body">
              <b>Card with button group </b><br>
              Hey there, I am a very simple card. I am good at containing small bits of information. I am quite convenient because I require little markup to use effectively.
              
            </div>
          </div>
        </div>
              


            </div>  
           
          </div>
        </div>
      </div>
    </main>
    <!------>
         <?php include 'include/footer.php';?>
    <!------>
 
  </body>
</html>