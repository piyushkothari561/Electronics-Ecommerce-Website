<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/connection.php"; 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Checkout</title>
    <script src="js/form-validation.js"></script>
  </head>

<body class="bg-dark text-light">

<div class="container">
<?php
if(isset( $_GET['pay']))
{

 ?>   

<div style="width: 100%; height: 200px;"></div>

<div class="col-12 p-3 text-center">
<img class="image-fluid" src="../images/success.png" alt="Payment success">
</div>
<div class="col-12 p-3 text-center">
<h3>Payment successful</h3>
</div>
<?php
if (isset($_SESSION['userloggedin']) == true)//only if logged in.
{ 
?>
<div class="col-12 p-3 text-center">
<a href ="../user_order.php" class="col-4 btn btn-success">Go to Orders</a>
</div>
<?php
}
else// if the order is placed by a guest
{
?>
<div class="col-12 p-3 text-center">
<a href ="../index.php" class="col-4 btn btn-success">Go Home</a>
</div>
<?php
}
?>

<?php  
    }else
    {
     header('Location: ../index.php');
    }

?>
 

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
