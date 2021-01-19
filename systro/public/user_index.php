<?php
  if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
if (isset($_SESSION['userloggedin']) == true) {
?>
<!------------------------------------------------------------------------------------------------------------------------------>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/user_header.php" ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/image_carousel.php" ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/banner_ads.php" ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/product.php" ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/user_footer.php" ?>
<!------------------------------------------------------------------------------------------------------------------------------>
<?php
}
else
 {
   header("location:../login.php");
 }
?>