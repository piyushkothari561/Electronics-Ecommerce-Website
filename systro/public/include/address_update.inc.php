<?php require $_SERVER["DOCUMENT_ROOT"] . "/include/connection.php";
  
 

  
        $update_user = filter_input(INPUT_POST,'update_user');
        if(isset($update_user)){
        $username = filter_input(INPUT_POST,'update_username');
        $update_address = filter_input(INPUT_POST,'update_address');
        $update_pin = filter_input(INPUT_POST,'update_pin');

            $insert_update = "UPDATE user SET `address` = '$update_address', `pin` = '$update_pin' WHERE (`username` = '$username');";
            $updated_user = $conn->prepare($insert_update);
            $updated_user->execute();
            header("Location: ../user_profile.php?address=updated");
        }
        else 
        {
            header("Location: ../user_profile.php?address=notupdated");
        }
        
    
  
 ?>