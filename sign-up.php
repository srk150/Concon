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
 .breadcrumb{
    background:transparent;}
        </style>
 
    </head>
<body style="background:#f7f7f7">

  
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
                            <h1 class="text-white mb-0">Sign Up</h1>
                            <p class="lead">Rapidiously deploy world-class platforms whereas collaborative interfaces.</p>
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
                                <li class="breadcrumb-item active">Sign Up</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumb section end-->

       

        <!--our contact section from partials/contact-section start-->
        <section id="contact" class="contact-us-section pt-5">
            <div class="container">
                <div class="row justify-content-around">
                    <div class="col-12 pb-3 message-box d-none">
                        <div class="alert alert-danger"></div>
                    </div>
                   
                    <div class="col-md-12 col-lg-12">
                        <div class="contact-us-content">
                            <h2>Are you new here?</h2>
                            <p class="lead">Sign Up with your email and personal details to get started!</p>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                          <h3>About You</h3>
                    </div>    
                </div>


            <!-- show alert message start -->
                 <!-- <div class="alert alert-danger alert-dismissible err_alert" style="display: none;">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong><p class="err_msg"></p></strong>
                </div> -->

                 <p class="err_msg" style="color:red; display:none;"></p>
                 <p class="success_msg1" style="color:#69d065; display:none;"></p>


               <!--   <div class="alert alert-success alert-dismissible success_alert1" style="display: none;">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong><p class="success_msg1"></p></strong>
                </div> -->
            <!-- show alert message end -->
          
                
                <form class="login-signup-form mt-5" id="myform">
                <div class="row">

                    <div class="col-md-4"><!---->
                      <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Full Name
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                   <input type="text" name="fname" class="form-control fname" placeholder="Fullname" maxlength="20">
                                </div>
                              <small class="fname_err" style="color:red; display:none;">Please provide your full name</small>
                            </div>
                    </div><!---->    


                    <div class="col-md-4"><!---->
                      <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Date Of Birth
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                   <input type="date" name="dob" class="form-control dob" max="<?php echo date('Y-m-d');?>" placeholder="Date of Birth">
                                    
                                </div>
                                <small class="dob_err" style="color:red; display:none;">Please select date of birth</small>
                            </div>
                    </div><!---->    


                     <div class="col-md-4"><!---->
                      <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Username
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                   <input type="text" name="username" class="form-control username" placeholder="Username" maxlength="20">
                                </div>
                                    <small class="username_err" style="color:red; display:none;">Please provide username</small>

                            </div>
                    </div><!---->    


                     <div class="col-md-4"><!---->
                      <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                   Email Address
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                   <input type="email" name="email" class="form-control email" placeholder="Email Address" maxlength="30">
                                </div>
                                   <small class="email_err" style="color:red; display:none;">Please provide a properly formatted email address</small>

                            </div>
                    </div><!---->    

                     <div class="col-md-4"><!---->
                      <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                   Password
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge pser">
                                   <input type="Password" name="password" class="form-control password" placeholder="Password" maxlength="15">

                                </div>
                                <small class="password_len" style="color:red; display:none;">Please Select minimum 5 character</small>
                                   <small class="password_err" style="color:red; display:none;">Password field is required</small>

                            </div>
                    </div><!---->    


                     <div class="col-md-4"><!---->
                      <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                  Your Job Function
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                  <select name="job_fun" class="form-control job_fun" id="sel1">
                                        <option value="emp_jobf">Select</option>
                                        <option>New Business</option>
                                        <option>Marketing</option>
                                        <option>Sales Development</option>
                                        <option>Sales Ops</option>
                                        <option>Account Management</option>
                                        <option>Exec</option>
                                       
                                  </select>

                                </div>
                                  <small class="job_fun_err" style="color:red; display:none;">Please Select Job Function</small>

                            </div>
                    </div><!---->    

                    <div class="col-md-4"><!---->
                      <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                  Your Sector
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                  <select name="sector" class="form-control sector" id="sel1">
                                        <option value="emp_sector">Select</option>
                                        <option>Commercial & Professional Services</option>
                                        <option>Media</option>
                                        <option>Retail</option>
                                        <option>Health Care</option>
                                        <option>Financial Services</option>
                                        <option>Food, Beverage & Tobacco</option>
                                        <option>Manufacturing</option>
                                        <option>Utilities</option>
                                        <option>Information Technology</option>
                                        <option>Consumer Products</option>
                                        <option>Non profit</option>
                                        <option>Education</option>
                                        <option>Government Administration</option>
                                        <option>Construction & Engineering</option>
                                        <option>Travel & Tourism</option>
                                        <option>Supply Chain & Transportation</option>
                                        <option>Consumer Services</option>
                                       
                                  </select>
                                </div>
                                  <small class="sector_err" style="color:red; display:none;">Please Select Sector</small>

                            </div>
                    </div><!---->  

                      <div class="col-md-4"><!---->
                      <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                  Your LinkedIn URL
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                   <input type="text" name="linkedin_url" class="form-control linkedin_url" placeholder="https://...">

                                </div>
                                  <small class="linkedin_url_err" style="color:red; display:none;">Please provide your linkedin url</small>

                            </div>
                      </div><!---->   

                      <div class="col-md-4"><!---->
                      <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                  Have A Referral Code
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                   <input type="text" name="refer_code" class="form-control refer_code" placeholder="Have a Referral Code" maxlength="30">

                                </div>
                                  <small class="refer_code" style="color:red; display:none;">Please Select LinkedIn URL</small>

                            </div>
                      </div><!---->   


           <div class="col-md-12">  
                          <hr>
                      </div>                 

                   
                    <div class="col-md-4"></div><!---->  
                     <div class="col-md-4"></div><!---->

                        <div class="col-md-12"><!---->
                      <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                 About Your Customer
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                 <textarea name="about" id="about" class="form-control about" rows="3" cols="100" placeholder="About Your Customer" spellcheck="false" maxlength="300"></textarea>

                                </div>
                                <small class="about_txt"></small><br>
                                <small class="about_err" style="color:red; display:none;">This field is required</small>

                            </div>
                    </div><!---->   

                      <div class="col-md-12"><!---->
                       <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                   Linekedin URL Of Your Customer
                                </label>
                      </div>  </div> 



                     <div class="col-md-4"><!---->
                      <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                  Customer 1 LinkedIn URL
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                   <input type="text" name="linkedin_url1" class="form-control linkedin_url1" placeholder="https://...">
                                </div>
                            </div>
                    </div><!---->     
                    <div class="col-md-4"><!---->
                      <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                  Customer 2 LinkedIn URL
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                   <input type="text" name="linkedin_url2" class="form-control linkedin_url2" placeholder="https://...">
                                </div>
                            </div>
                    </div><!---->  

                    <div class="col-md-4"><!---->
                      <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                  Customer 3 LinkedIn URL
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                   <input type="text" name="linkedin_url3" class="form-control linkedin_url3" placeholder="https://...">
                                </div>
                            </div>
                    </div><!---->      

<div class="col-md-6"><!---->
<div class="form-group">
<!-- Label -->
<label class="pb-1">
Employee Range
</label>
<!-- Input group -->
<div class="input-group input-group-merge">

  <div class="form-check form-check-inline">
  <input class="form-check-input emp_range" name="emp_range" type="radio" id="inlineCheckbox1" value="0-50">
  <label class="form-check-label" for="inlineCheckbox1">0-50</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input emp_range" name="emp_range" type="radio" id="inlineCheckbox2" value="50-100">
  <label class="form-check-label" for="inlineCheckbox2">50-100</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input emp_range" name="emp_range" type="radio" id="inlineCheckbox3" value="100-250">
  <label class="form-check-label" for="inlineCheckbox3">100-250</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input emp_range" name="emp_range" type="radio" id="inlineCheckbox4" value="250-500">
  <label class="form-check-label" for="inlineCheckbox4">250-500</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input emp_range" name="emp_range" type="radio" id="inlineCheckbox5" value="500-5000">
  <label class="form-check-label" for="inlineCheckbox5">500-5000</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input emp_range" name="emp_range" type="radio" id="inlineCheckbox6" value="5000+">
  <label class="form-check-label" for="inlineCheckbox6">5000+</label>
</div>

<small class="emp_range_err" style="color:red; display:none;">Please Select Employee Range</small>

    </div>  
</div>
                    
</div>  <!---->    

    <div class="col-md-6"><!---->
    <div class="form-group">
    <!-- Label -->
    <label class="pb-1">
      Employee Role
    </label>
    <!-- Input group -->
    <div class="input-group input-group-merge">

      <div class="form-check form-check-inline">
      <input class="form-check-input role" type="radio" name="role" id="role1" value="HR">
      <label class="form-check-label" for="role1">HR</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input role" type="radio" name="role" id="role2" value="IT">
      <label class="form-check-label" for="role2">IT</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input role" type="radio" name="role" id="role3" value="Finance">
      <label class="form-check-label" for="role3">Finance</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input role" type="radio" name="role" id="role4" value="Sales">
      <label class="form-check-label" for="role4">Sales</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input role" type="radio" name="role" id="role5" value="Marketing">
      <label class="form-check-label" for="role5">Marketing</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input role" type="radio" name="role" id="role6" value="Product">
      <label class="form-check-label" for="role6">Product</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="role" id="role7" value="Operations">
      <label class="form-check-label" for="role7">Operations</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input role" type="radio" name="role" id="role8" value="C-Suite">
      <label class="form-check-label" for="role8">C-Suite</label>
    </div>

    </div>
   <small class="role_err" style="color:red; display:none;">Please select employee role</small>

</div>
</div><!---->    

<div class="col-md-12"><!---->
<div class="form-group">
<!-- Label -->
<label class="pb-1">
 Bio
</label>
<!-- Input group -->
<div class="input-group input-group-merge">
 <textarea name="message" id="message" class="form-control message" rows="7" cols="100" placeholder="Paste your LinkedIn About Section here" spellcheck="false" maxlength="500"></textarea>


</div>
<small class="bio_txt"></small><br>
<small class="message_err" style="color:red; display:none;">This field is requied</small>

</div>
</div><!---->   

<div class="col-md-12">
<div class="custom-control custom-checkbox mb-3">
<input type="checkbox" value="1" name="terms" class="custom-control-input terms" id="check-terms">
<label class="custom-control-label small-text" for="check-terms">I agree to the <a href="#">Terms &amp; Conditions</a></label>

</div>
<small class="agree_err" style="color:red; display:none;">Please Select Terms & Condition!</small>
</div>  

<div class="col-sm-12">
<small class="msg_inf" style="color:red; display:none;">Oops, something wasn't right!</small>
</div>

<div class="col-sm-12 mt-3 mb-5">
<input type="hidden" name="web" class="web" value="1">
<button type="button"  class="btn btn-brand-02 submitbtn" id="btnContactUs" style="pointer-events: all; cursor: pointer;">
Submit 
</button>
<img class="succ_gif" src="assets/right.gif" width="100px" style="display: none;">

</div>





</div><!--row-->

</form><!--form-->
            </div>
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
        function isValidEmailAddress(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
      };

     
        $('.about_txt').html('300' + '/300');

        $('.about').keyup(function() {
            var text_length = $('.about').val().length;
            var text_remaining = 300 - text_length;
            $('.about_txt').html(text_remaining + '/300');
        });

        $('.bio_txt').html('500' + '/500');

        $('.message').keyup(function() {
            var text_length1 = $('.message').val().length;
            var text_remaining1 = 500 - text_length1;
            $('.bio_txt').html(text_remaining1 + '/500');
        });



    </script>
    <script>
      $(document).ready(function() {

        $('.submitbtn').click(function(e){

            e.preventDefault();
            var fname         = $(".fname").val();
            var dob           = $(".dob").val();
            var username      = $(".username").val();
            var email         = $(".email").val();
            var password      = $(".password").val();
            var job_fun       = $(".job_fun").val();
            var sector        = $(".sector").val();
            var message       = $(".message").val();
            var terms         = $(".terms").val();
            var web           = $(".web").val();
            
            var linkedin_url    = $(".linkedin_url").val();
            var about           = $(".about").val();
            var linkedin_url1   = $(".linkedin_url1").val();
            var linkedin_url2   = $(".linkedin_url2").val();
            var linkedin_url3   = $(".linkedin_url3").val();
          
            var emp_range       = $(".emp_range:checked").val();
            var role            = $(".role:checked").val();
            var refer_code      = $(".refer_code").val();
            //alert(fname);
             if(fname.length == ''){
              
              $(".fname_err").show();
              $(".msg_inf").show();

             }else if(fname.length > 20){

              $(".fname_err").show();
              $(".fname_err").html('Please enter less than 20 letters');
              $(".msg_inf").show();
             }

             else if(dob.length == ''){
              $(".dob_err").show();
              $(".fname_err").hide();
              $(".msg_inf").show();

             }else if(username.length == ''){
              $(".username_err").show();
              $(".dob_err").hide();
              $(".fname_err").hide();
              $(".msg_inf").show();
               
             }else if(username.length > 20){
              $(".dob_err").hide();
              $(".fname_err").hide()
              $(".username_err").show();
              $(".username_err").html('Please enter less than 20 letters');
              $(".msg_inf").show();

             
             }else if(email.length == ''){
              $(".email_err").show();
              $(".username_err").hide();
              $(".dob_err").hide();
              $(".fname_err").hide();
              $(".msg_inf").show();


                
             }else if(!isValidEmailAddress(email)){
              $(".email_err").show();
              $(".email_err").html('Please enter valid email');
              $(".username_err").hide();
              $(".dob_err").hide();
              $(".fname_err").hide();
              $(".msg_inf").show();


             }else if(password.length == ''){
              $(".password_err").show();
              $(".email_err").hide();
              $(".username_err").hide();
              $(".dob_err").hide();
              $(".fname_err").hide();
              $(".msg_inf").show();
              

               
             }else if(password.length <= 5){
              $(".password_err").hide();
              $(".password_len").show();
              $(".email_err").hide();
              $(".username_err").hide();
              $(".dob_err").hide();
              $(".fname_err").hide();
              $(".msg_inf").show();
             }else if(job_fun == 'emp_jobf'){
              $(".password_len").hide();
              $(".job_fun_err").show();
              $(".password_err").hide();
              $(".email_err").hide();
              $(".username_err").hide();
              $(".dob_err").hide();
              $(".fname_err").hide();
              $(".msg_inf").show();


                
             }else if(sector == 'emp_sector'){
              $(".sector_err").show();
              $(".job_fun_err").hide();
              $(".password_err").hide();
              $(".password_len").hide();
              $(".email_err").hide();
              $(".username_err").hide();
              $(".dob_err").hide();
              $(".fname_err").hide();
              $(".msg_inf").show();


                
             }else if(linkedin_url.length == ''){
              $(".linkedin_url_err").show();
              $(".sector_err").hide();
              $(".job_fun_err").hide();
              $(".password_err").hide();
              $(".password_len").hide();
              $(".email_err").hide();
              $(".username_err").hide();
              $(".dob_err").hide();
              $(".fname_err").hide();
              $(".msg_inf").show();


                
             }else if(about.length == ''){
              $(".about_err").show();
              $(".linkedin_url_err").hide();
              $(".sector_err").hide();
              $(".job_fun_err").hide();
              $(".password_len").hide();
              $(".password_err").hide();
              $(".email_err").hide();
              $(".username_err").hide();
              $(".dob_err").hide();
              $(".fname_err").hide();
              $(".msg_inf").show();
                
             }
             else if(!$("input[name=emp_range]:checked").val()){
              $(".emp_range_err").show();
              $(".about_err").hide();
              $(".linkedin_url_err").hide();
              $(".sector_err").hide();
              $(".job_fun_err").hide();
              $(".password_err").hide();
              $(".password_len").hide();
              $(".email_err").hide();
              $(".username_err").hide();
              $(".dob_err").hide();
              $(".fname_err").hide();
              $(".msg_inf").show();


                
             }else if(!$("input[name=role]:checked").val()){
              $(".role_err").show();
              $(".emp_range_err").hide();
              $(".about_err").hide();
              $(".linkedin_url_err").hide();
              $(".sector_err").hide();
              $(".job_fun_err").hide();
              $(".password_err").hide();
              $(".password_len").hide();
              $(".email_err").hide();
              $(".username_err").hide();
              $(".dob_err").hide();
              $(".fname_err").hide();
              $(".msg_inf").show();


             }else if(message.length == ''){
              $(".message_err").show();
              $(".role_err").hide();
              $(".emp_range_err").hide();
              $(".about_err").hide();
              $(".linkedin_url_err").hide();
              $(".sector_err").hide();
              $(".job_fun_err").hide();
              $(".password_err").hide();
              $(".password_len").hide();
              $(".email_err").hide();
              $(".username_err").hide();
              $(".dob_err").hide();
              $(".fname_err").hide();
              $(".msg_inf").show();


                
             }else if ($('input[type=checkbox]:checked').length == 0) {
              
              $(".agree_err").show();
              $(".message_err").hide();
              $(".role_err").hide();
              $(".emp_range_err").hide();
              $(".about_err").hide();
              $(".linkedin_url_err").hide();
              $(".sector_err").hide();
              $(".job_fun_err").hide();
              $(".password_err").hide();
              $(".email_err").hide();
              $(".username_err").hide();
              $(".dob_err").hide();
              $(".fname_err").hide();
              $(".msg_inf").show();
              $(".password_len").hide();

              
              }else{
 
            $.ajax({type: "POST", url: "portal/controller/reg_json.php",dataType: "json",

            data: {
                fname         : fname,
                dob           : dob,
                username      : username,
                email         : email,
                password      : password,
                job_fun       : job_fun,
                sector        : sector,
                message       : message,
                web           : web,
                linkedin_url  : linkedin_url,
                linkedin_url1 : linkedin_url1,
                linkedin_url2 : linkedin_url2,
                linkedin_url3 : linkedin_url3,
                about         : about,
                emp_range     : emp_range,
                refer_code    : refer_code,
                role          : role
               

            },

            success : function(data){

            if (data.status=='success') {
           
            $("#myform")[0].reset();
            $(".err_msg").hide();
            $(".agree_err").hide();
            $('.success_msg1').show();
            $(".success_msg1").html("<b>"+data.response+"</b>");
            $(".msg_inf").hide();

            $(".message_err").hide();
            $(".role_err").hide();
            $(".emp_range_err").hide();
            $(".about_err").hide();
            $(".linkedin_url_err").hide();
            $(".sector_err").hide();
            $(".job_fun_err").hide();
            $(".password_err").hide();
            $(".email_err").hide();
            $(".username_err").hide();
            $(".dob_err").hide();
            $(".fname_err").hide();
            $(".password_len").hide();

            $(".succ_gif").show();
            $("html").animate({ scrollTop: 0 }, "slow");

            //window.location = 'sign-in.php';

            }
            else if(data.status=='already'){
                
                $(".agree_err").hide();
                $('.err_msg').show();   
                $(".err_msg").html(data.response);
                $(".msg_inf").show();

                $(".message_err").hide();
                $(".role_err").hide();
                $(".emp_range_err").hide();
                $(".about_err").hide();
                $(".linkedin_url_err").hide();
                $(".sector_err").hide();
                $(".job_fun_err").hide();
                $(".password_err").hide();
                $(".email_err").hide();
                $(".username_err").hide();
                $(".dob_err").hide();
                $(".fname_err").hide();
                $(".password_len").hide();

                
         
            }

            else{
                
                $(".agree_err").hide();
                $('.err_msg').show();   
                $(".err_msg").html(data.response);
                $(".msg_inf").show();

                $(".message_err").hide();
                $(".role_err").hide();
                $(".emp_range_err").hide();
                $(".about_err").hide();
                $(".linkedin_url_err").hide();
                $(".sector_err").hide();
                $(".job_fun_err").hide();
                $(".password_err").hide();
                $(".email_err").hide();
                $(".username_err").hide();
                $(".dob_err").hide();
                $(".fname_err").hide();
                $(".password_len").hide();

                
            }

                }

            });

            }



        });


    });

     </script>

</body>
</html>
</body>

</html>