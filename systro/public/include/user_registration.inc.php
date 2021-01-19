<?php require $_SERVER["DOCUMENT_ROOT"] . "/include/connection.php";
  
 

        
       if(isset($_POST["register_user"])){
        $add_user = filter_input(INPUT_POST,'add_user');
        $add_username = filter_input(INPUT_POST,'add_username');
        $add_password = filter_input(INPUT_POST,'add_password');
        $add_first_name = filter_input(INPUT_POST,'add_first_name');
        $add_last_name = filter_input(INPUT_POST,'add_last_name');
        $add_date_of_birth = filter_input(INPUT_POST,'add_date_of_birth');
        $add_email = filter_input(INPUT_POST,'add_email');
        $add_address = filter_input(INPUT_POST,'add_address');
        $add_pin = filter_input(INPUT_POST,'add_pin');
        $add_phone = filter_input(INPUT_POST,'add_phone');
        $dateTime = date("Y-m-d h:m:s");
        $hashed_password = password_hash($add_password, PASSWORD_DEFAULT);//HASHES THE PASSWORD FOR MUCH BETTER ENCRYPTION.

        $user_check = $conn->prepare('select count(*) from user where username=:add_username');
        $user_check->bindParam(':add_username',$add_username);
        $user_check->execute();
        $user_exist = $user_check->fetchColumn();
        
        if($user_exist>0){
            header("Location: /user_registration.php?username=unavailable");
            exit();
        }
        else 
        {
            $insert_user = "insert into user (username,password,first_name,last_name,date_of_birth,email,address,pin,phone,user_registration_date)
                            values ('$add_username','$hashed_password','$add_first_name','$add_last_name','$add_date_of_birth','$add_email','$add_address','$add_pin','$add_phone','$dateTime')";
            $new_user = $conn->prepare($insert_user);
            $new_user->execute();
            header("Location: ../login.php?user=registered");
        }
        
    }else{
        header("Location: ../user_registration.php?user=failed");
    }
  
 ?>