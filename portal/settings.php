<?php 
include 'controller/cookie.php';
$uid = $_COOKIE['id'];
$getu = mysqli_query($con,"SELECT * FROM user WHERE user_id='$uid'");
$chk  = mysqli_fetch_array($getu);
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
    
<div class="tile mt-4">
<div class="row">
<div class="col-md-12">
  
  <form class="login-signup-form mt-2" id="">
                <div class="row">

                    <div class="col-md-4"><!---->
                      <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Fullname
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                   <input type="text" name="fname" class="form-control fname" value="<?php echo $chk['fname'];?>" placeholder="Fullname" maxlength="20">
                                </div>
                              <small class="fname_err" style="color:red; display:none;">Please Select Fullname</small>
                            </div>
                    </div><!---->    


                    <div class="col-md-4"><!---->
                      <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Date of Birth
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                   <input type="date" name="dob" class="form-control dob" value="<?php echo $chk['dob'];?>" max="2022-01-17" placeholder="Date of Birth">
                                    
                                </div>
                                <small class="dob_err" style="color:red; display:none;">Please Select Date of Birth</small>
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
                                   <input type="text" name="username" class="form-control username" value="<?php echo $chk['username'];?>" placeholder="Username" maxlength="20">
                                </div>
                                    <small class="username_err" style="color:red; display:none;">Please Select Username</small>

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
                                   <input type="email" name="email" class="form-control email" value="<?php echo $chk['email'];?>" placeholder="Email Address" readonly="">
                                </div>
                                   <small class="email_err" style="color:red; display:none;">Please Select Email Address</small>

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
                                        <option value="New Business" <?php echo ($chk['job_fun']== 'New Business') ?  "selected='selected'" : "" ;  ?>>New Business</option>
                                        <option value="Marketing" <?php echo ($chk['job_fun']== 'Marketing') ?  "selected='selected'" : "" ;  ?>>Marketing</option>
                                        <option value="Sales Development" <?php echo ($chk['job_fun']== 'Sales Development') ?  "checked" : "" ;  ?>>Sales Development</option>
                                        <option value="Sales Ops" <?php echo ($chk['job_fun']== 'Sales Ops') ?  "selected='selected'" : "" ;  ?>>Sales Ops</option>
                                        <option value="Account Management" <?php echo ($chk['job_fun']== 'Account Management') ?  "selected='selected'" : "" ;  ?>>Account Management</option>
                                        <option value="Exec" <?php echo ($chk['job_fun']== 'Exec') ?  "selected='selected'" : "" ;  ?>>Exec</option>
                                       
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
                                        <option value="<?php echo ($chk['sector']);?>"><?php echo ($chk['sector']);?></option>
                                        <option value="Commercial &amp; Professional Services" >Commercial &amp; Professional Services</option>
                                        <option value="Media">Media</option>
                                        <option value="Retail">Retail</option>
                                        <option value="Health Care">Health Care</option>
                                        <option value="Financial Services">Financial Services</option>
                                        <option value="Food, Beverage &amp; Tobacco">Food, Beverage &amp; Tobacco</option>
                                        <option value="Manufacturing">Manufacturing</option>
                                        <option value="Utilities">Utilities</option>
                                        <option value="Information Technology">Information Technology</option>
                                        <option value="Consumer Products">Consumer Products</option>
                                        <option value="Non profit">Non profit</option>
                                        <option value="Education">Education</option>
                                        <option value="Government Administration">Government Administration</option>
                                        <option value="Construction &amp; Engineering">Construction &amp; Engineering</option>
                                        <option value="Travel &amp; Tourism">Travel &amp; Tourism</option>
                                        <option value="Supply Chain &amp; Transportation">Supply Chain &amp; Transportation</option>
                                        <option value="Consumer Services">Consumer Services</option>
                                       
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
                                   <input type="text" name="linkedin_url" class="form-control linkedin_url" placeholder="https://..." value="<?php echo $chk['linkedin_url'];?>">

                                </div>
                                  <small class="linkedin_url_err" style="color:red; display:none;">Please Select LinkedIn URL</small>

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
                                 <textarea name="about" id="about" class="form-control about" rows="3" cols="100" placeholder="About Your Customer" spellcheck="false" maxlength="300"><?php echo $chk['about'];?></textarea>

                                </div>
                                <small class="about_txt"></small><br>

                                <small class="about_err" style="color:red; display:none;">Please Select About Your Customer</small>

                            </div>
                    </div><!---->   

                      <div class="col-md-12"><!---->
                       <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                   LinkedIn URL for an example customer
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
                                   <input type="text" name="linkedin_url1" class="form-control linkedin_url1" placeholder="https://..." value="<?php echo $chk['linkedin_url1'];?>">
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
                                   <input type="text" name="linkedin_url2" class="form-control linkedin_url2" placeholder="https://..." value="<?php echo $chk['linkedin_url2'];?>">
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
                                   <input type="text" name="linkedin_url3" class="form-control linkedin_url3" placeholder="https://..." value="<?php echo $chk['linkedin_url3'];?>">
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
  <input class="form-check-input emp_range" name="emp_range" type="radio" id="inlineCheckbox1" value="0-50" <?php echo ($chk['emp_range']== '0-50') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="inlineCheckbox1">0-50</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input emp_range" name="emp_range" type="radio" id="inlineCheckbox2" value="50-100" <?php echo ($chk['emp_range']== '50-100') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="inlineCheckbox2">50-100</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input emp_range" name="emp_range" type="radio" id="inlineCheckbox3" value="100-250" <?php echo ($chk['emp_range']== '100-250') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="inlineCheckbox3">100-250</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input emp_range" name="emp_range" type="radio" id="inlineCheckbox4" value="250-500" <?php echo ($chk['emp_range']== '250-500') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="inlineCheckbox4">250-500</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input emp_range" name="emp_range" type="radio" id="inlineCheckbox5" value="500-5000" <?php echo ($chk['emp_range']== '500-5000') ?  "checked" : "" ;  ?>>
  <label class="form-check-label" for="inlineCheckbox5">500-5000</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input emp_range" name="emp_range" type="radio" id="inlineCheckbox6" value="5000+" <?php echo ($chk['emp_range']== '5000+') ?  "checked" : "" ;  ?>>
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
      <input class="form-check-input role" type="radio" name="role" id="role1" value="HR" <?php echo ($chk['role']== 'HR') ?  "checked" : "" ;  ?>>
      <label class="form-check-label" for="role1">HR</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input role" type="radio" name="role" id="role2" value="IT" <?php echo ($chk['role']== 'IT') ?  "checked" : "" ;  ?>>
      <label class="form-check-label" for="role2">IT</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input role" type="radio" name="role" id="role3" value="Finance" <?php echo ($chk['role']== 'Finance') ?  "checked" : "" ;  ?>>
      <label class="form-check-label" for="role3">Finance</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input role" type="radio" name="role" id="role4" value="Sales" <?php echo ($chk['role']== 'Sales') ?  "checked" : "" ;  ?>>
      <label class="form-check-label" for="role4">Sales</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input role" type="radio" name="role" id="role5" value="Marketing" <?php echo ($chk['role']== 'Marketing') ?  "checked" : "" ;  ?>>
      <label class="form-check-label" for="role5">Marketing</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input role" type="radio" name="role" id="role6" value="Product" <?php echo ($chk['role']== 'Product') ?  "checked" : "" ;  ?>>
      <label class="form-check-label" for="role6">Product</label>
    </div>
   
   <div class="form-check form-check-inline">
     
      <input class="form-check-input role" type="radio" name="role" id="role9" value="Operations" <?php echo ($chk['role']== 'Operations') ?  "checked" : "" ;  ?>>
      <label class="form-check-label" for="role9">Operations</label>
    </div>

    <div class="form-check form-check-inline">
     
      <input class="form-check-input role" type="radio" name="role" id="role8" value="C-Suite" <?php echo ($chk['role']== 'C-Suite') ?  "checked" : "" ;  ?>>
      <label class="form-check-label" for="role8">C-Suite</label>
    </div>

    </div>
   <small class="role_err" style="color:red; display:none;">Please Select Role</small>

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
 <textarea name="message" id="message" class="form-control message" rows="7" cols="100" placeholder="Paste your LinkedIn About Section here" spellcheck="false" maxlength="500"><?php echo $chk['message'];?></textarea>


</div>
<small class="bio_txt"></small><br>

<small class="message_err" style="color:red; display:none;">Please Select Bio</small>

</div>
</div><!---->   


<div class="col-sm-12">
<small class="msg_inf" style="color:red; display:none;">Oops, something wasn't right!</small>
</div>

<div class="col-sm-12 mt-3 mb-5">
<input type="hidden" name="web" class="web" value="1">
<button type="button" class="btn btn-primary submitbtn" id="" style="pointer-events: all; cursor: pointer;">
Update 
</button>
<img class="succ_gif" src="../assets/right.gif" width="100px" style="display: none;"><br>
<p class="err_msg" style="color:red; display:none;"></p>
<p class="success_msg1" style="color:#69d065; display:none;"></p>


</div>





</div><!--row-->

</form>

</div>
</div>
</div>





       
     
    </main>

    <!------>
         <?php include 'include/footer.php';?>
    <!------>
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
            var job_fun       = $(".job_fun").val();
            var sector        = $(".sector").val();
            var message       = $(".message").val();
            var web           = $(".web").val();
            
            var linkedin_url    = $(".linkedin_url").val();
            var about           = $(".about").val();
            var linkedin_url1   = $(".linkedin_url1").val();
            var linkedin_url2   = $(".linkedin_url2").val();
            var linkedin_url3   = $(".linkedin_url3").val();
          
            var emp_range       = $(".emp_range:checked").val();
            var role            = $(".role:checked").val();
           
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
              $(".username_err").show();
              $(".username_err").html('Please enter less than 20 letters');
              $(".msg_inf").show();

              $(".fname_err").hide();
              $(".dob_err").hide();
             
             }else if(job_fun == 'emp_jobf'){
              $(".job_fun_err").show();
              $(".msg_inf").show();

              $(".fname_err").hide();
              $(".dob_err").hide();
              $(".username_err").hide();
                
             }else if(sector == 'emp_sector'){
              $(".sector_err").show();
              $(".msg_inf").show();

              $(".fname_err").hide();
              $(".dob_err").hide();
              $(".username_err").hide();
              $(".job_fun_err").hide();
              $(".message_err").hide();
                
             }else if(linkedin_url.length == ''){
             
              $(".linkedin_url_err").show();
              $(".msg_inf").show();

              $(".fname_err").hide();
              $(".dob_err").hide();
              $(".username_err").hide();
              $(".sector_err").hide();
              $(".job_fun_err").hide();
              $(".message_err").hide();

             


                
             }else if(about.length == ''){
              $(".about_err").show();
              $(".msg_inf").show();

                $(".fname_err").hide();
                $(".dob_err").hide();
                $(".username_err").hide();
                $(".sector_err").hide();
                $(".job_fun_err").hide();
                $(".linkedin_url_err").hide();
                $(".message_err").hide();
                

            
                
             }
             else if(!$("input[name=emp_range]:checked").val()){
                $(".emp_range_err").show();
                $(".msg_inf").show();

                $(".fname_err").hide();
                $(".dob_err").hide();
                $(".username_err").hide();
                $(".sector_err").hide();
                $(".job_fun_err").hide();
                $(".linkedin_url_err").hide();
                $(".about_err").hide();
                $(".message_err").hide();
                
             }else if(!$("input[name=role]:checked").val()){
             
                $(".role_err").show();
                $(".msg_inf").show();

                $(".fname_err").hide();
                $(".dob_err").hide();
                $(".username_err").hide();
                $(".sector_err").hide();
                $(".job_fun_err").hide();
                $(".linkedin_url_err").hide();
                $(".about_err").hide();
                $(".emp_range_err").hide();
                $(".message_err").hide();

             }else if(message.length == ''){
             
                $(".message_err").show();
                $(".msg_inf").show();
                $(".fname_err").hide();
                $(".dob_err").hide();
                $(".username_err").hide();
                $(".sector_err").hide();
                $(".job_fun_err").hide();
                $(".linkedin_url_err").hide();
                $(".about_err").hide();
                $(".emp_range_err").hide();
                $(".role_err").hide();
               
             }else{
 
            $.ajax({type: "POST", url: "controller/register_upd.php",dataType: "json",

            data: {
                fname         : fname,
                dob           : dob,
                username      : username,
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
                role          : role
               

            },

            success : function(data){

            if (data.status=='success') {
           
            $('.success_msg1').show();
            $(".success_msg1").html("<b>"+data.response+"</b>");
            $(".succ_gif").show();
           
            $(".msg_inf").hide();
            $(".err_msg").hide();
            $(".fname_err").hide();
            $(".dob_err").hide();
            $(".username_err").hide();
            $(".sector_err").hide();
            $(".job_fun_err").hide();
            $(".linkedin_url_err").hide();
            $(".about_err").hide();
            $(".emp_range_err").hide();
            $(".role_err").hide();
            $(".message_err").hide();
            //window.location = 'sign-in.php';

            }
            else if(data.status=='already'){
                
                $('.err_msg').show();   
                $(".err_msg").html(data.response);
                $(".msg_inf").show();

                $(".fname_err").hide();
                $(".dob_err").hide();
                $(".username_err").hide();
                $(".sector_err").hide();
                $(".job_fun_err").hide();
                $(".linkedin_url_err").hide();
                $(".about_err").hide();
                $(".emp_range_err").hide();
                $(".role_err").hide();
                $(".message_err").hide();
                
         
            }

            else{
                
                $('.err_msg').show();   
                $(".err_msg").html(data.response);
                $(".msg_inf").show();
                
                $(".fname_err").hide();
                $(".dob_err").hide();
                $(".username_err").hide();
                $(".sector_err").hide();
                $(".job_fun_err").hide();
                $(".linkedin_url_err").hide();
                $(".about_err").hide();
                $(".emp_range_err").hide();
                $(".role_err").hide();
                $(".message_err").hide();

            }

                }

            });

            }



        });


    });

     </script>

  </body>
</html>