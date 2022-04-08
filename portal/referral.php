<?php 
include 'controller/cookie.php';
$uid  = $_COOKIE['id'];
$getu = mysqli_query($con,"SELECT * FROM user WHERE user_id='$uid'");
$chk  = mysqli_fetch_array($getu);
$refer_code = $chk['refer_code'];
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
    <style>
      *[tooltip]:focus:after {
      content: attr(tooltip);
      display:block;
      position: absolute;    
      top: -30px;
      color: #67c069;
      left: 15px;
      }
    </style>
   <?php include 'include/header.php';?>
   
    <main class="app-content">
      <!-- <div class="app-title">
        <div>
          <h1> Referral</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div> -->
      

        <div class="tile mt-5">
      <div class="row">


        <div class="col-md-12 mt-4">
        <h3 class="All Items">About Referral</h3>

        <div class="tile-body">
              

              Hey there, use your referral code to earn credits and amazon vouchers
        </div>
      </div>



        <div class="col-md-12 mt-4">
        
            <h3 class="tile-title">Your Referral Code</h3>
            <!-- <h5 class="text-success">CoNcOn-HK123HJ</h5> -->
            <div class="col-4 mx mt-3 pl-0">
            <form method="" action="">

            <div class="input-group">
            <input type="text" class="form-control text-success" id="myInput" value="<?php echo $refer_code ;?>" aria-label="Recipient's username" readonly="">
            <div class="input-group-append">

            <button class="btn btn-outline-secondary copy" onclick="myFunction()" type="button" tooltip="Copied!">Copy Code</button>
            </div>
            </div>

            </form>
            </div> 

          </div>
  

       

       <div class="col-md-12 mt-4">
        <h3 class="tile-title">My Referral</h3>
        
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>S No.</th>
                      <th>Date</th>
                      <!-- <th>Username</th> -->
                      <th>Referral Username</th>
                      <th>Earn</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    
                    $i = 1 ;

                    $get_ref = mysqli_query($con,"SELECT * FROM ref_log WHERE ref_id='$uid' AND status='1'");
                   
                    while ($getref = mysqli_fetch_array($get_ref)){
                    
                    ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $getref['date'];?></td>
                      <!-- <td><?php //echo $getref['ref_name'];?></td> -->
                      <td><?php echo $getref['fname'];?></td>
                      <td><?php echo $getref['earn'];?></td>
                    </tr>
                                       
                    <?php } ?>
                  </tbody>
                </table>
              </div>
           
          </div>

       </div><!---->


    

    </div>

    </main>
  <!------>
  <?php include 'include/footer.php';?>
  <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
  <!------>
 
  <script>
  function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  //alert("Copied the text: " + copyText.value);
  }
  </script>


 
  </body>
</html>