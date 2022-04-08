<?php

//method check

if ($_SERVER['REQUEST_METHOD'] == 'POST')

{

    //connection setup//

    require_once ('config.php');

    //getting input//

    $fname          = htmlspecialchars($_POST['fname']);
    $dob            = htmlspecialchars($_POST['dob']);
    $username       = htmlspecialchars($_POST['username']);
    $email          = htmlspecialchars($_POST['email']);
    $password           = $_POST['password'];
    $job_fun        = htmlspecialchars($_POST['job_fun']);
    $sector         = htmlspecialchars($_POST['sector']);
    $message        = htmlspecialchars($_POST['message']);
    $terms          = htmlspecialchars($_POST['terms']);
    
    
    

    //check count value//

    $sql_user        = "SELECT * FROM user WHERE email='$email'";
    $get_result_user = mysqli_query($con,$sql_user);
    $row_get_user    = mysqli_fetch_array($get_result_user,MYSQLI_ASSOC);
    $count_user      = mysqli_num_rows($get_result_user);

    //require_once ('controller/verify.php');

    //empty data check//

    if (empty($fname))

    {

        $response = array(

            "status" => "error",

            "response" => "Enter Your Full Name"

        );

    }
    
     elseif (empty($dob))

    {  
       
        $response = array(

            "status" => "error",

            "response" => "Enter Your DOB "

        );

    }

    elseif (empty($username))

    {  
       
        $response = array(

            "status" => "error",

            "response" => "Enter Your Username"

        );

    }

    elseif (empty($email))

    {

        $response = array(

            "status" => "error",

            "response" => "Enter Your E-mal"

        );

    }



    elseif (empty($password))

    {

        $response = array(

            "status" => "error",

            "response" => "Enter Your Password"

        );

    }
    
    elseif (empty($job_fun))

    {

        $response = array(

            "status" => "error",

            "response" => "Select Job Function"

        );

    }
    
    elseif (empty($sector))

    {

        $response = array(

            "status" => "error",

            "response" => "Select Sector"

        );

    }
    
    elseif (empty($message))

    {

        $response = array(

            "status" => "error",

            "response" => "Enter Bio"

        );

    }
    
    // elseif ($terms != '1')

    // {

    //     $response = array(

    //         "status" => "error",

    //         "response" => "Select Terms & Conditions"

    //     );

    // }
    

    elseif ($count_user == '1')

    {

        $response = array(

            "status" => "error",

            "response" => "E-mail is already exists"

        );

    }

    else

    {

        //insert query run here//

        $user_id        = uniqid();
        //$password       = md5($_POST['password']);
        
        date_default_timezone_set("America/New_York");  
        $date =  date('Y-m-d');
        $time =  date('H:i');
        
      


        $insert = "INSERT INTO `user`(`fname`, `dob`, `username`, `email`, `password` , `job_fun`, `sector`, `message`, `terms`, `user_id`, `create_date`, `create_time`) VALUES  ('" . $fname . "','" . $dob . "','" . $username . "','" . $email . "' ,'" . $password . "','" . $job_fun . "','" . $sector . "','" . $message . "','" . $terms . "','" . $user_id . "','" . $date . "','" . $time . "')";

        $query = mysqli_query($con, $insert);

        //response//
        $response = array(

                    "status" => "success",

                    "response" => "Register Successfully!"

                );

        


        }

}

else

{

    //method check error represent

    $response = array(

        "status" => "error",

        "response" => "Access Denied Method Not Allowed"

    );

}



//Json decode

echo json_encode($response);



