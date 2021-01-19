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

<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/header.php" ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/image_carousel.php" ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/banner_ads.php" ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/product.php" ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/footer.php" ?>

<!--All HTML Codes must be above this---------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php } } ?>