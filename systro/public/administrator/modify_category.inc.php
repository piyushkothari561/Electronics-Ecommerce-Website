<?php 
require $_SERVER["DOCUMENT_ROOT"] . "/include/connection.php";
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if (isset($_SESSION['administratorloggedin']) == true) {
?>
<!------------------------------------------------------------------------------------------------------------------------------>
<?php require $_SERVER["DOCUMENT_ROOT"] . "/include/connection.php";
  
 

if (isset($_POST['modify_category']))
{
$category_id=(int)$_POST['category_id'];
$category_name=$_POST['category_name'];
$category_hide_value=(int)$_POST['category_hide_value'];



$insert_update = "UPDATE `category` SET `category_name` = '$category_name', `category_hide_value` = '$category_hide_value' WHERE (`category_id` = '$category_id');";
$updated_category = $conn->prepare($insert_update);
$updated_category->execute();


header("location:/administrator/modify_category.php?category=modified&category_id=$category_id");
}
if (isset($_POST['delete_category']))
{
    $category_id=$_POST['category_id'];
    //puts all the products in other category
    $insert_update = "UPDATE `product` SET `category_id` = '1' WHERE (`category_id` = '$category_id');";
    $updated_category = $conn->prepare($insert_update);
    $updated_category->execute();   





    $delete_category = "DELETE FROM `category` WHERE (`category_id` = '$category_id');";
    $deleted_category = $conn->prepare($delete_category);
    $deleted_category->execute();
    header("location:/administrator/modify_category.php?category=deleted&category_name=$category_name");
}






?>
<!------------------------------------------------------------------------------------------------------------------------------>
<?php
}

else
 {
   header("location: ../login.php");
 }

 ?>


