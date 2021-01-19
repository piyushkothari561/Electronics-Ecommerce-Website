<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if (isset($_SESSION['administratorloggedin'])  == true)
{
    header("location:/administrator/administrator_index.php"); 
}
else 
    {
    if (isset($_SESSION['userloggedin']) == true) 
        {   
        header("location:/user_index.php");
        }   
        else
        {
?>
<!--All HTML coding must be below this------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <!-- form card login -->
                    <div class="card rounded shadow shadow-sm">
                        <div class="card-header">
                            <h3 class="text-center">LOGIN<a href="/index.php" ><span class="float-right far fa-window-close red-close-button"></span><a></h3>
                        </div>
                        <div class="card-body">
                        <div class="container">
                             <?php
                            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            if (strpos($fullUrl, "database=notconnected") == true)  {
                                echo "<div class=\"alert alert-danger alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>Database is unavailable</strong>";
                              }
                            if (strpos($fullUrl, "detail=nothing") == true)  {
                                echo "<div class=\"alert alert-danger alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>Form is not filled in.</strong>";
                            }
                            if (strpos($fullUrl, "password=notcorrect") == true)
                                {
                                    echo "<div class=\"alert alert-danger alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>Password is not correct</strong>";
                                }
                                if (strpos($fullUrl, "username=notcorrect") == true)
                                    {
                                        echo "<div class=\"alert alert-danger alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>Username is not correct.</strong>";
                                    }
                                    if (strpos($fullUrl, "user=registered") == true)
                                    {
                                         echo "<div class=\"alert alert-success alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>Successfully registered</strong>";
                                    }
                                    else
                                    {
                                        echo "<div>";
                                    }
?>

                             </div>
                            </div>
                            <form action="include/login.inc.php" class="form" role="form" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="check_username"required>
                                
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" name="check_password" required autocomplete="new-password">
                                   
                                </div>
                                <div>
                               
                                <p class="ml-auto pt-3 text-center">Not registered ?<a href="user_registration.php"> Sign up</a></p>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success btn-md col-12" >LOGIN <span class="fas fa-sign-in-alt"></span></button>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->

                </div>


            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/footer.php"?>
<!--All HTML Codes must be above this---------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php } } ?>