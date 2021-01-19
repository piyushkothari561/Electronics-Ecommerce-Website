<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if (isset($_SESSION['userloggedin']) == true)
{ 

  
?>
<!------------------------------------------------------------------------------------------------------------------------------>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/user_header.php" ?>


<?php
$loggedin_username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT * FROM user WHERE username = '$loggedin_username';");
$stmt->execute();
$user_data=$stmt->fetch(PDO::FETCH_ASSOC);
?>






<div class="container mt-4 pt-4 rounded" style="background-color: #eaeaea">
<a class="btn btn-warning btn-lg col-12" href="user_order.php" role="button"><span class="fa fa-shopping-bag"></span> View Orders</a>
<div class="container pt-2">
<?php
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($fullUrl, "database=notconnected") == true)  {
      echo "<div class=\"alert alert-danger alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>Database is unavailable</strong>";
    }
      elseif (strpos($fullUrl, "address=updated") == true)
      {
        echo "<div class=\"alert alert-success alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>Address Updated</strong>";
      }
      elseif (strpos($fullUrl, "address=notupdated") == true)
      {
        echo "<div class=\"alert alert-danger alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>Address was not Updated</strong>";
      }
      else{
        echo "<div class=\"alert alert-info\"><a href=\"#\" ></a><strong>You can change your address.</strong>";
      }
  
?>
</div>
</div>
<!--Registration form Begin-->
<form action="include/address_update.inc.php" method="POST">
 
      <!--form-group-->
      <div class="form-group row pt-3">
      <label class="col-sm-2 col-form-label">Username</label>
      <div class="col-sm-10">
  	  <input class="form-control" value="<?php echo $user_data['username'] ?>" type="text" name="update_username" readonly>
      </div>
      </div>
      <!--form-group-->
      <div class="form-group row">
      <label class="col-sm-2 col-form-label">First name</label>
      <div class="col-sm-10">
  	  <input class="form-control" value="<?php echo $user_data['first_name'] ?>" type="text" readonly>
      </div>
      </div>
      <!--form-group-->
      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Last name</label>
      <div class="col-sm-10">
  	  <input class="form-control" value="<?php echo $user_data['last_name'] ?>" type="text" readonly>
      </div>
      </div>
      <!--form-group-->
      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Date of birth</label>
      <div class="col-sm-10">
  	  <input class="form-control" value="<?php echo $user_data['date_of_birth'] ?>" type="date" readonly>
      </div>
      </div>
      <!--form-group-->
      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
  	  <input class="form-control" value="<?php echo $user_data['email'] ?>" type="text" readonly>
      </div>
      </div>
      <!--form-group-->
      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Phone no</label>
      <div class="col-sm-10">
  	  <input class="form-control" value="<?php echo $user_data['phone'] ?>" type="text" readonly>
      </div>
      </div>
      <!--form-group-->
      <div class="form-group row">
      <label class="col-sm-2 col-form-label">Address</label>
      <div class="col-sm-10">
  	  <textarea class="form-control" placeholder="<?php echo $user_data['address'] ?>" type="textarea" name="update_address" rows="3" required></textarea>
      </div>
      </div>
      <!--form-group-->
      <div class="form-group row">
      <label class="col-sm-2 col-form-label" pattern=".{1,10}">PIN</label>
      <div class="col-sm-10">
  	  <input class="form-control" placeholder="<?php echo $user_data['pin'] ?>"  type="number" name="update_pin" required>
      </div>
      </div>
      <!--Button-->
  	<div class="form-group row px-2 py-2">
  	  <button type="submit" class="form-control btn btn-info" name="update_user">Click here to apply change to address</button>
  	</div>
    
    
  </form>
  <!--Registration form End-->

</div><!--container end div tag-->


<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/user_footer.php" ?>
<!------------------------------------------------------------------------------------------------------------------------------>
<?php

} 
else
 {
   header("location:../login.php");
 }
 ?>