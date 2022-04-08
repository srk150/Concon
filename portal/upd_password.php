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
                            <h1 class="text-white mb-0">Update Password</h1>
                            
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
                            <ol class="breadcrumb pl-0 mb-0 bg-transparent">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Update Password</li>
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
                 <div class="alert alert-danger alert-dismissible err_alert" style="display: none;">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong><p class="err_msg"></p></strong>
                </div>


                 <div class="alert alert-success alert-dismissible success_alert1" style="display: none;">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong><p class="success_msg1"></p></strong>
                </div>
            <!-- show alert message end -->
                 
                
                <form class="login-signup-form mt-5" id="myform">
                <div class="row">



                    <div class="col-md-6 col-12">

                         <div class="contact-us-content">
                            <h2>Update Password</h2>
                          
                        </div>
                     
                          <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Password
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                   <input type="password" name="pass" class="form-control pass" placeholder="Enter Password " required="">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Confirm Password
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                   <input type="password" name="pass2" class="form-control pass2" placeholder="Enter Confirm Password " required="">
                                </div>
                            </div>

                             <input type="hidden" name="web" class="web" value="1">
                             <input type="hidden" name="uid" class="uid" value="<?php echo $uid; ?>">

                             
                            

                                <button type="button"  class="btn btn-brand-02 updpassbtn" id="btnContactUs" style="pointer-events: all; cursor: pointer;">
                                    Update 
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

    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <script>
      $(document).ready(function() {

        $('.updpassbtn').click(function(e){

            e.preventDefault();
           
            var pass          = $(".pass").val();
            var pass2         = $(".pass2").val();
            var web           = $(".web").val();
            var uid           = $(".uid").val();
      
            $.ajax({type: "POST", url: "portal/controller/updpass_json.php",dataType: "json",

            data: {
                pass         : pass,
                pass2        : pass2,
                web          : web,
                uid          : uid
            },

            success : function(data){

            if (data.status=='success') {
           
            $("#myform")[0].reset();

            $('.success_alert1').show();
            $(".success_msg1").html("<p>"+data.response+"</p>");
             $('.err_alert').hide();   
            //window.location = 'portal/dashboard.php';

            }
            else{
                $('.success_alert1').hide();
                $('.err_alert').show();   
                $(".err_msg").html("<p>"+data.response+"</p>");

            }

                }

            });
            
             
        });

    });

     </script>

</body>
</html>
</body>

</html>