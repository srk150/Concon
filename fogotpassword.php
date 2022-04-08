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
          <!----css----->
        <!-- endbuild -->

        <style type="text/css">
            .login-signup-form .form-group .input-group .form-control {
    text-indent: 0px;
}
        </style>
    </head>
<body style="background:#fff">

  
    <!--preloader end-->
   
    <!--header section start-->
          <?php include 'include/header.php';?>
        <!--header section end-->
   

    <div class="main">


        <!--page header section start-->
        <section class="page-header-section bg-image" image-overlay="8" style="padding:70px 0 30px;">
            <div class="background-image-wraper" style="background: url('assets/img/slider-bg-1.jpg'); opacity: 1;"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-9 col-lg-7">
                        <div class="page-header-content text-white repo">
                            <h1 class="text-white mb-0">Forgot Password</h1>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--page header section end-->

        <!--breadcrumb section start-->
       
        <div class="breadcrumb-bar gray-light-bg border-bottom">
           

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="custom-breadcrumb">
                            <ol class="breadcrumb pl-0 mb-0">
                                <li class="breadcrumb-item"><a class="text-success" href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Forgot Password</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--breadcrumb section end-->

       

        <!--our contact section from partials/contact-section start-->
        <section id="contact" class="contact-us-section pt-5 pb-5">
            <div class="container">
                <div class="row justify-content-around">
                    <div class="col-12 pb-3 message-box d-none">
                        <div class="alert alert-danger"></div>
                    </div>
                   
                    <div class="col-md-12 col-lg-12">
                       
                    </div>
                </div>


            <!-- show alert message start -->
                <!--  <div class="alert alert-danger alert-dismissible err_alert" style="display: none;">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong><p class="err_msg"></p></strong>
                </div>


                 <div class="alert alert-success alert-dismissible success_alert1" style="display: none;">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong><p class="success_msg1"></p></strong>
                </div> -->
            <!-- show alert message end -->
                 
                
                <form class="login-signup-form mt-5" id="myform">
                <div class="row">



                    <div class="col-md-6 col-12">

                         <div class="contact-us-content">
                            <h2>Forgot Password</h2>

                             <small class="err_msg" style="color:red; display:none;font-weight:600;"></small>
                             <small class="success_msg1" style="color:#69d065; display:none;font-weight:600;"></small>
                          
                        </div>
                     
                      <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Email
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                   <input type="email" name="email" class="form-control email" placeholder="Enter Email " maxlength="30">
                                </div>
                                   <small class="email_err" style="color:red; display:none;font-weight:600;">Please Enter Your Verifed Email</small>

                            </div>

                             <input type="hidden" name="web" class="web" value="1">
                             
                            


                             

                                <div class="form-group">
                                <label>If you remember your  password so please <a href="sign-in.php">Log in</a></label>
                                </div>

                                <button type="button"  class="btn btn-brand-02 forgotbtn" id="btnContactUs" style="pointer-events: all; cursor: pointer;">
                                     Reset Passoword
                                </button>

                    </div><!---->  

                       <div class="col-md-6 col-12 text-center">
                       <img src="assets/img/signn.png" class="img-fluid">
                    </div>  
                    
                        </div>

                </div><!--row-->
</div>
                </form><!--form-->
            
        </section>
        <!--our contact section from partials/contact-section end-->

     
    </div>


    <!--footer section start-->
 <?php include 'include/footer.php';?>
 <!--footer section start-->
<!--build:js-->
<?php include 'include/js.php';?>
<script type="text/javascript">
£(function () {
  £('[data-toggle="tooltip"]').tooltip()
})</script>
<!--endbuild-->

   
     <script>
      $(document).ready(function() {

        $('.forgotbtn').click(function(e){

            e.preventDefault();
           
            var email         = $(".email").val();
           
            var web           = $(".web").val();

            //alert
            if(email.length == ''){
              
              $(".email_err").show();

             }else{ 


            $.ajax({type: "POST", url: "portal/controller/forgot_json.php",dataType: "json",

            data: {
                email        : email,
                web          : web

            },

            success : function(data){

            if (data.status=='success') {
           
            $("#myform")[0].reset();

            $('.success_msg1').show();
            $(".success_msg1").html("<p>"+data.response+"</p>");
            $('.err_msg').hide();   
            //window.location = 'portal/dashboard.php';

            }
            else{
                $('.success_msg1').hide();
                $(".agree_err").hide();
                $('.err_msg').show();   
                $(".err_msg").html(data.response);

            }

                }

            });
            
                }



        });

    });

     </script>

</body>
</html>
