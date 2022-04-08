<?php

require_once ('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')

{

    $email_address      = $_POST['email'];
    $password           = $_POST['password'];
    
   
   
    $sqls    = "SELECT * FROM user WHERE email='$email_address' AND password='$password'";

    $results = mysqli_query($con,$sqls);

    $rows    = mysqli_fetch_array($results,MYSQLI_ASSOC);

    $count   = mysqli_num_rows($results);

    // make sure data is not empty

   $product  = array(

    'user_id'    =>$rows['user_id'], 

    'fname'      =>$rows['fname'], 

    'username'   =>$rows['username'] , 

    'email'      =>$rows['email']



    );



   if(empty($email_address)){

        

         $response = array(



            "status" => "error",



            "response" => "Email is Empty!"



             );

        }



    else if(empty($password)){



         $response = array(



            "status" => "error",



            "response" => "Password is Empty!"



             );

        }
        
    



else{ 

     if($count == '1'){
         
         
        $uid           = $rows['user_id'];
        $username      = $rows['username'];
        $email         = $rows['email'];
        $fullname      = $rows['fname'];

        setcookie('id', $uid, time()+(86400 * 7), '/');
        setcookie('username', $username, time()+(86400 * 7), '/');
        setcookie('user', $email, time()+(86400 * 7), '/');
        setcookie('fname', $fullname, time()+(86400 * 7), '/');

        $response = array(

        "status" => "success",

        "data" => $product,

        "response" => "Successfully Logged-In!"

         );

        }

    else{

         $response = array(

            "status" => "error",

            "response" => "Email or Password Does not Match!"

             );

        }


   }   

  }


else{

     $response = array(

        "status" => "error",

        "response" => "Access Denied Method Not Allowed!"

         );

   }

//Json decode

echo json_encode($response);

?>



