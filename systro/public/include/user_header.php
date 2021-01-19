<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if (isset($_SESSION['userloggedin']) == true) {
  $loggedin_username = $_SESSION['username'];
?>
<!------------------------------------------------------------------------------------------------------------------------------>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<title>Systro</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Oxygen&family=Quicksand&family=Sen:wght@400;700&display=swap" rel="stylesheet">
<script defer src="https://kit.fontawesome.com/da3faa99bb.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/image_carousel.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/test.css">
<script src="js/form-validation.js"></script>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/connection.php" ?>


 

</head>
<body>


<!--------------NAVBAR--------------------->

<nav class="navbar  navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand text-success" href="user_index.php">Systro</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
 <!-- Home button -->
 <li class="nav-item">
        <a class="nav-link" href="user_index.php"><span class="fa fa-home"></span></i> Home</a>
      </li>
<!-- Dropdown button -->
      <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php     
   $stmt = $conn->prepare("SELECT * FROM category WHERE category_hide_value=1;");
   $stmt->execute();
   while ($category_data=$stmt->fetch(PDO::FETCH_ASSOC))
   {
      ?>  <form action="user_product_search.php" role="form" method="post">
          <input type="hidden" name="filter_search">
          <input type="hidden" name="product_search">
          <input type="hidden" name="category_search" value="<?php echo $category_data['category_id'] ?>">
          <button class="dropdown-item" type="submit" name="submit"> <?php echo $category_data['category_name'] ?></button>
          </form>
      <?php
        }
      ?>
      </li>
   </ul>
<?php
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($fullUrl, "product_search") == false)  {
echo "<form action=\"user_product_search.php\" role=\"form\" method=\"post\">\n";
echo "<div class=\"form-inline my-2 my-lg-0\">\n";
echo "<input name=\"product_search\" class=\"form-control mr-sm-2\" type=\"search\" placeholder=\"Search\" aria-label=\"Search\">\n";
echo "<input type=\"hidden\" name=\"category_search\" >\n";
echo "<input type=\"hidden\" name=\"filter_search\" >\n";
echo "<button class=\"btn btn-outline-secondary my-2 my-sm-0\" name=\"submit\" type=\"submit\">Search</button>\n";
echo "</div>\n";
echo "</form>";
}
?>
   <ul class="nav navbar-nav">
            <li class="nav-item text-center" id="signup-btn">
                <a href="user_profile.php" class="nav-link" ><span class="fa fa-user"></span><span class="d-none d-sm-inline d-xl-block px-1"><?php echo $loggedin_username ?></span></a>
            </li>
            <li class="nav-item text-center" id="login-btn">
                <a href="logout.php" class="nav-link" ><span class="fa fa-sign-in"></span><span class="d-none d-sm-inline d-xl-block px-1">Log out</span></a>
            </li>
            <li class="nav-item text-center" id="login-btn">
                <a href="cart.php?path=direct_click" class="nav-link" ><span class="fa fa-shopping-cart"></span><span class="d-none d-sm-inline d-xl-block px-1">Cart</span></a>
            </li>
        </ul>
  

 

  </div>
</nav>
<!------------------------------------------------------------------------------------------------------------------------------>
<?php
}
else
 {
   header("location:../login.php");
 }
 ?>