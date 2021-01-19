<?php
session_start();
if (isset($_SESSION['administratorloggedin'])  == true)
{
    header("location:/administrator/administrator_index.php"); 
}
else 
    {
    if (isset($_SESSION['userloggedin']) == true) 
        {   
        header("location:/user/user_index.php");
        }   
        else
        {
?>
<!--All HTML coding must be below this------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/header.php"?>
<div class="container my-3" style="background-color: #eaeaea" >
    <a class="mr-auto btn btn-secondary btn-sm mt-3" href="index.php" role="button"><span class="fa fa-home"></span> Go back home</a>
        <p class="ml-auto pt-3 text-center">Already a member? <a href="login.php">Sign in</a></p>

        <div class="col-md-12 order-md-1">
          <h4 class="mb-3 text-center">User registration</h4>
          <div class="mb-3">
          <?php 
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($fullUrl, "database=notconnected") == true) 
             {
                echo "<div class=\"alert alert-danger alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>Database is unavailable</strong>";
              }
              if (strpos($fullUrl, "user=failed") == true)
              {
                  echo "<div class=\"alert alert-danger alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>Registration failed.</strong>";
              }
            ?>
            </div>
          <form action="include/user_registration.inc.php" method="POST" class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" name="add_first_name" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" name="add_last_name" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" id="username" name="add_username" placeholder="Username" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>
            <div class="mb-3">
            <?php 
            if (strpos($fullUrl, "username=unavailable") == true)
                {
                    echo "<div class=\"alert alert-danger alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>Username is already taken.</strong>";
                }

            ?>
            </div>

            <div class="mb-3">
              <label for="password">Password</label>
              <input type="password" pattern=".{8,20}" class="form-control" id="password" name="add_password" placeholder="Must be 8-20 characters long." required>
              <div class="invalid-feedback">
              Must be 8-20 characters long.
              </div>
            </div>

            <div class="mb-3">
              <label for="date_of_birth">Date of birth</label>
              <input id="date_of_birth" class="form-control" type="date" name="add_date_of_birth" max="2010-01-01" min="1920-01-01" required>
              <div class="invalid-feedback">
              Enter a valid Date of birth.
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="add_email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
            <div class="row">
            <div class="col-md-5 mb-3">
              <label for="phone">Phone no</label>
              <input name="add_phone" name type="number" class="form-control" pattern=".{4,15}" id="phone" required>
              <div class="invalid-feedback">
                Please enter your Phone no.
              </div>
            </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <textarea name="add_address" class="form-control" id="address" rows="5" required></textarea>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>



            <div class="row">
              
              <div class="col-md-3 mb-3">
                <label for="pin">PIN</label>
                <input type="number" class="form-control" name="add_pin" pattern="{3,10}" id="pin" placeholder="" required>
                <div class="invalid-feedback">
                  PIN code required.
                </div>
              </div>
            </div>
            
    
            <hr class="mb-4  my-3">

            <button name="register_user" type="submit" class="btn btn-success btn-lg btn-block" >Register</button>
          </form>
        </div>
      </div>
    </div>


<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/footer.php"?>
<!--All HTML Codes must be above this---------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php } } ?>