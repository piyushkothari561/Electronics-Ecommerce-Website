<?php
require $_SERVER["DOCUMENT_ROOT"] . "/include/connection.php";
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$fullUrl = null;


    if (isset($_SESSION['administratorloggedin']) && $_SESSION['administratorloggedin'] == true) 
        {
                header("Location: ../administrator/administrator_index.php");
        }
        elseif (isset($_SESSION['userloggedin']) && $_SESSION['userloggedin'] == true) 
            {
                header('location: ../login.php');
            }
            elseif (isset($_POST['submit']))
                {
                        $pre_login = $conn->prepare('select * from administrator where username=:check_username');
                        $pre_login->bindValue(':check_username',$_POST['check_username']);
                        $pre_login->execute();
                        $check_login = $pre_login->fetch(PDO::FETCH_ASSOC);
                        
                    if ($_POST['check_username'] == $check_login['username'])
                    {
                        $password_check = password_verify($_POST['check_password'], $check_login['password']);
                        if($password_check>0)
                         {
                            $_SESSION['administratorloggedin'] = $check_login['username'] == true;
                           
                            header("Location: ../administrator/administrator_index.php");
                            exit();
                            
                         }
                        else
                        {
                            header("Location: ../login.php?password=notcorrect");
                            exit();
                        }
                    }
                         elseif (isset($_POST['submit']))
                        {
                                $pre_login = $conn->prepare('select * from user where username=:check_username');
                                $pre_login->bindValue(':check_username',$_POST['check_username']);
                                $pre_login->execute();
                                $check_login = $pre_login->fetch(PDO::FETCH_ASSOC);
                                
                            if ($_POST['check_username'] == $check_login['username'])
                            {
                                $password_check = password_verify($_POST['check_password'], $check_login['password']);
                                if($password_check>0)
                                 {
                                    $_SESSION['userloggedin'] = $check_login['username'] == true;
                                    $_SESSION['username'] = $check_login['username'];
                                    header("Location: ../user_index.php");
                                    exit(); 
                                 }
                                else
                                {
                                    header("Location: /login.php?password=notcorrect");
                                    exit();
                                }
                            }
                        else
                            {
                                header("Location: /login.php?username=notcorrect");
                                exit();
                            }
                         
                        }
                    
                }else{
                    header("Location: /login.php?detail=nothing");
                    exit();
                }
                
                
        
    


   
            
?>
