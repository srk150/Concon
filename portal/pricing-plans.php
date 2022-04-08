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
   
   <style type="text/css">
  h3.mb-0 {
    font-size: 20px;
}
h4.pt-5.text-left.h4set {
    min-height: 100px;
}
.pricing-features {
    min-height: 90px;
}
   </style>
 
   
    <main class="app-content" id="procing-page">
      
   
      
      <!---======------>

            <div class="row mt-4">
         
         <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Annual save 20% </a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Monthly</a>
  </li>
 
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><div class="row align-items-center justify-content-md-center justify-content-center">
        
        <div class="col-md-3"><!---------->
         <div class="pricing-table purple">
            <div class="row">
                 <div class="col-md-8"> <div class="pricing-label float-left">Trial</div></div>
                 <div class="col-md-4"><h3 class="mb-0">Free</h3></div>
                 <div class="col-md-12 mt-1 mb-1"><small>Try it for <strong>free</strong></small> </div>
            </div>   
            <div class="row"> 
                <div class="col-md-12 text-center mt-2 mb-2">
                     <a class="btn-1 btn-block" href="#"> <strong><i class="fa fa-star crc"></i>  Access </strong> for a week</a>
                </div>  
               
            </div>
            <h4 class="pt-5 text-left h4set" ><strong>Zero Cost Trial</strong> Plan Includes:</h4>
            <!-- Features -->
            <div class="pricing-features">

                <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature">Unlimited access for week</span></div>
                </div>

                <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature"> week extension for a successful referral</span></div>
                </div>


              
              
             </div>
              <div class="col-md-12 text-center mt-5 mb-2">
                     <a class="btn-2" href="../sign-up.php">Get Started</a>
                </div>  
       </div>
      </div><!----------1---------->
       <div class="col-md-3"><!---------->
         <div class="pricing-table purple">
            <div class="row">
                 <div class="col-md-4"> <div class="pricing-label float-left">Starter</div></div>
                 <div class="col-md-8"><h3 class="mb-0">£ 9.99 <ins>/mo</ins></h3></div>
                 <div class="col-md-12 mt-1 mb-1"><small>Up to <strong>2 users</strong></small> </div>
            </div>   
            <div class="row"> 
                <div class="col-md-12 text-center mt-2 mb-2">
                     <a class="btn-1 btn-block" href="#"> <strong><i class="fa fa-star crc"></i> 900 Credits</strong> /yr</a>
                </div>  
                  
            </div>
            <h4 class="pt-5 text-left h4set" ><strong>Starter</strong> Plan Includes:</h4>
            <!-- Features -->
            <div class="pricing-features">

                 <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature">£ 5 Amazon voucher for a successful referral</span></div>
                </div>

                 <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature">25 Credits for a successful referral</span></div>
                </div>


              
             </div>
             <div class="col-md-12 text-center mt-5 mb-2">
                     <a class="btn-2" href="controller/purchase.php?type=Annual&plan=Starter">Choose Plan</a>
                </div>
       </div>
      </div><!----------2---------->
         <div class="col-md-3"><!---------->
         <div class="pricing-table purple">
            <div class="row">
                 <div class="col-md-4"> <div class="pricing-label float-left">Pro</div></div>
                 <div class="col-md-8"><h3 class="mb-0">£ 24.99 <ins>/mo</ins></h3></div>
                 <div class="col-md-12 mt-1 mb-1"><small>Up to <strong>2 users</strong></small> </div>
            </div>   
            <div class="row"> 
                <div class="col-md-12 text-center mt-2 mb-2">
                     <a class="btn-1 btn-block" href="#"> <strong><i class="fa fa-star crc"></i> 3600 Credits</strong> /yr</a>
                </div>  
                 
            </div>
            <h4 class="pt-5 text-left h4set" ><strong>Pro</strong> Plan Includes:</h4>
            <!-- Features -->
            <div class="pricing-features">

                <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature">£ 5 Amazon voucher for a successful referral</span></div>
                </div>

                <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature">125 Credits for a successful referral</span></div>
                </div>

              
             </div>
             <div class="col-md-12 text-center mt-5 mb-2">
                     <a class="btn-2" href="controller/purchase.php?type=Annual&plan=Pro">Choose Plan</a>
                </div> 
       </div>
      </div><!----------3---------->
      
        <div class="col-md-3"><!---------->
         <div class="pricing-table purple">
            <div class="row">
                 <div class="col-md-4"> <div class="pricing-label float-left">Unlimited</div></div>
                 <div class="col-md-8"><h3 class="mb-0">£ 99.99 <ins>/mo</ins></h3></div>
                 <div class="col-md-12 mt-1 mb-1"><small>Up to <strong>2 users</strong></small> </div>
            </div>   
            <div class="row"> 
                <div class="col-md-12 text-center mt-2 mb-2">
                     <a class="btn-1 btn-block" href="#"> <strong><i class="fa fa-star crc"></i> Unlimited access</strong> </a>
                </div>  
                  
            </div>
            <h4 class="pt-5 text-left h4set" ><strong>Unlimited</strong> Plan Includes:</h4>
            <!-- Features -->
            <div class="pricing-features">

                 <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature">£ 5 Amazon voucher for a successful referral</span></div>
                </div>

                <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature">On boarding call</span></div>
                </div>

                <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature">Customer Success Plan</span></div>
                </div>


             </div>
             <div class="col-md-12 text-center mt-5 mb-2">
                     <a class="btn-2" href="controller/purchase.php?type=Annual&plan=Unlimited">Choose Plan</a>
                </div>
       </div>
      </div><!----------4---------->
        
        
    </div><!--========row==========--></div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"><div class="row align-items-center justify-content-md-center justify-content-center">
        
        <div class="col-md-3"><!---------->
         <div class="pricing-table purple">
            <div class="row">
                 <div class="col-md-8"> <div class="pricing-label float-left">Trial</div></div>
                 <div class="col-md-4"><h3 class="mb-0">Free</h3></div>
                 <div class="col-md-12 mt-1 mb-1"><small>Try it for <strong>free</strong></small> </div>
            </div>   
            <div class="row"> 
                <div class="col-md-12 text-center mt-2 mb-2">
                     <a class="btn-1 btn-block" href="#"> <strong><i class="fa fa-star crc"></i> Access</strong> for a week</a>
                </div>  
                
            </div>
            <h4 class="pt-5 text-left h4set" ><strong>Zero Cost Trial</strong> Plan includes:</h4>
            <!-- Features -->
            <div class="pricing-features">
                <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature">Unlimited access for week</span></div>
                </div>
                <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature">1 week extension for a successful referral</span></div>
                </div>
              
             </div>
             <div class="col-md-12 text-center mt-5 mb-2">
                     <a class="btn-2" href="sign-up.php">Get Started</a>
                </div>  
       </div>
      </div><!----------1---------->
       <div class="col-md-3"><!---------->
         <div class="pricing-table purple">
            <div class="row">
                 <div class="col-md-4"> <div class="pricing-label float-left">Starter</div></div>
                 <div class="col-md-8"><h3 class="mb-0">£ 14.99 <ins>/mo</ins></h3></div>
                 <div class="col-md-12 mt-1 mb-1"><small>Up to <strong>2 users</strong></small> </div>
            </div>   
            <div class="row"> 
                <div class="col-md-12 text-center mt-2 mb-2">
                     <a class="btn-1 btn-block" href="#"> <strong><i class="fa fa-star crc"></i> 75 Credits</strong> /month</a>
                </div>  
                
            </div>
            <h4 class="pt-5 text-left h4set" ><strong>Starter</strong> Plan includes:</h4>
            <!-- Features -->
            <div class="pricing-features">
                 
                <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature">£ 5 Amazon voucher for a successful referral</span></div>
                </div>
                <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature">25 Credits for a successful referral</span></div>
                </div>
               <!-- <div class="feature"><span><i class="fa fa-check"></i></span><strong>Export contact</strong></div>
               <div class="feature"><span><i class="fa fa-check"></i></span><strong>Prospecting <i class="fa fa-exclamation cercl" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom"></i></strong></div> -->
             </div>
             <div class="col-md-12 text-center mt-5 mb-2">
                     <a class="btn-2" href="controller/purchase.php?type=Monthly&plan=Starter">Choose Plan</a>
                </div>  
       </div>
      </div><!----------2---------->
       <div class="col-md-3"><!---------->
         <div class="pricing-table purple">
            <div class="row">
                 <div class="col-md-4"> <div class="pricing-label float-left">Pro</div></div>
                 <div class="col-md-8"><h3 class="mb-0">£ 29.99 <ins>/mo</ins></h3></div>
                 <div class="col-md-12 mt-1 mb-1"><small>Up to <strong>2 users</strong></small> </div>
            </div>   
            <div class="row"> 
                <div class="col-md-12 text-center mt-2 mb-2">
                     <a class="btn-1 btn-block" href="#"> <strong><i class="fa fa-star crc"></i> 300 Credits</strong> /month</a>
                </div>  
                
            </div>
            <h4 class="pt-5 text-left h4set" ><strong>Pro</strong> Plan includes:</h4>
            <!-- Features -->
            <div class="pricing-features">
                 <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature"> 5 Amazon voucher for a successful referral</span></div>
                </div>
                 <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature"> 25 Credits for a successful referral</span></div>
                </div>
              
             </div>
             <div class="col-md-12 text-center mt-5 mb-2">
                     <a class="btn-2" href="controller/purchase.php?type=Monthly&plan=Pro">Choose plan</a>
                </div>  
       </div>
      </div><!----------3---------->
      
             <div class="col-md-3"><!---------->
         <div class="pricing-table purple">
            <div class="row">
                 <div class="col-md-4"> <div class="pricing-label float-left">Unlimited </div></div>
                 <div class="col-md-8"><h3 class="mb-0">£ 149.99 <ins>/mo</ins></h3></div>
                 <div class="col-md-12 mt-1 mb-1"><small>Up to <strong>2 users</strong></small> </div>
            </div>   
            <div class="row"> 
                <div class="col-md-12 text-center mt-2 mb-2">
                     <a class="btn-1 btn-block" href="#"> <strong><i class="fa fa-star crc"></i> Unlimited access</strong></a>
                </div>  
               
            </div>
            <h4 class="pt-5 text-left h4set" ><strong>Unlimited</strong> Plan includes:</h4>
            <!-- Features -->
            <div class="pricing-features">
                 
                <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature">£ 5 Amazon voucher for a successful referral</span></div>
                </div>
                <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature">On boarding call</span></div>
                </div>
                <div class="row">
                <div class="col-2"><i class="fa fa-check feature"></i></div>
                <div class="col-10"><span class="feature">Customer Success Plan</span></div>
                </div>
             
             </div>
              <div class="col-md-12 text-center mt-5 mb-2">
                     <a class="btn-2" href="controller/purchase.php?type=Monthly&plan=Unlimited">Choose plan</a>
                </div>  
       </div>
      </div><!----------4---------->
        
        
    </div><!--========row==========--></div>
  
</div>
      
     </div>  

      <!---======------>
   
        
    </main>
    <!------>
         <?php include 'include/footer.php';?>
    <!------>
 
  </body>
</html>