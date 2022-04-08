<?php 
include 'controller/cookie.php';
$uid = $_COOKIE['id'];
$getu = mysqli_query($con,"SELECT * FROM user WHERE user_id='$uid'");
$chk  = mysqli_fetch_array($getu);

$user_plan  = mysqli_query($con,"SELECT * FROM user_plan WHERE user_id='$uid' AND status='1' ORDER BY id DESC LIMIT 1");
$get_plan   = mysqli_fetch_array($user_plan);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="">
    <meta property="twitter:site" content="">
    <meta property="twitter:creator" content="">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="">
    <meta property="og:site_name" content="">
    <meta property="og:title" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:description" content=".">
    <title>Admin| CONCON.AI</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->

   <?php include 'include/header.php';?>
   
    <main class="app-content">
    
    <div class="tile">
     <div class="row">
         
         <div class="col-md-5">
           <img class="img-fluid" src="https://forestathome.com/concon/assets/img/12-new.png" width="400">
         </div><!---->


          <div class="col-md-7">
            <h3>Chrome Extension</h3>
            <p>Download our Chrome Extension to seamlessly fit within your prospecting workflow. We’ll help you to make the right decisions when you are working on LinkedIn and support you in moving data quickly to your other sales systems. Download it here.</p>

            <p>LinkedIn and support you in moving data quickly to your other sales systems. Download it here.</p>
            <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Install Plugin</button>
         </div><!---->

        </div><!--Row-->
      </div>

      

         <div class="row">
          <div class="col-md-8">
          <div class="tile">
        <canvas id="myChart" height="200" class="mt-2"></canvas>
            </div>
          
        </div>

        <div class="col-md-4">

          <div class="tile">

              <div class="row">
          <div class="col-md-12">
           <div class="tile">
             <div class="row">

             <div class="col-4">
                 <img class="img-fluid fix-h" src="images/credit-card.png">
             </div>
           
            <div class="col-8">
               <h4 class="color-h">Total Credits</h4>
                  <p class="counta"><b><?php if($get_plan['credit'] =='0'){ echo "Unlimited access for a week" ; } else if($get_plan['credit'] =="Unlimited"){ echo "Unlimited access"; } else{ echo $get_plan['credit'] ;} ?>
            </b></p>


            </div>
             
               
            </div>
           </div>
          </div><!---->

          <div class="col-md-12">
           <div class="tile">
             <div class="row">
              <div class="col-4"> 

                 <img class="img-fluid fix-h" src="images/booking.png">

              </div>

              <div class="col-8">

             <div class="info">
              <h4 class="color-h">Used Credits</h4>
              <p class="counta"><b><?php echo $chk['credits'];?></b></p>
            </div>
           </div>

          </div></div>
          </div><!---->
          
          <?php if($get_plan['type'] !='Trial'){ ?>

          <div class="col-md-12">
           <div class="tile">

             <div class="row">
              <div class="col-4"> 
                  <img class="img-fluid fix-h" src="images/payment.png">
              </div>

             <div class="col-8"> 
             <div class="info">
              <h4 class="color-h">Remaining Credits</h4>
              <p class="counta"><b><?php if($chk['wallet_credit'] =='empty'){ echo "0";}else{ echo $chk['wallet_credit'];}?></b></p>
             </div>
            </div>
            </div>
            </div>
          </div>
         <?php } ?>
          
  
          <!---->

        </div><!----->   


          </div>

        </div>    
       </div>
      
    
       

      




 
    </main>

    <!------>
         <?php include 'include/footer.php';?>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
          <script type="text/javascript">

   var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Used Credits", "Remaining Credits"],
    datasets: [{
      backgroundColor: [
        
        "#e74c3c",
        "#34495e"
      ],
      data: [<?php echo $chk['credits'];?>,<?php if($chk['wallet_credit'] =='empty'){ echo "0";}else{ echo $chk['wallet_credit'];}?>]
    }]
  }
});
    </script>
    <!------>

  </body>
</html>