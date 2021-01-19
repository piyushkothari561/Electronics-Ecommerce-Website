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
  
 

if (isset($_POST['add_category'])) {
$category_name=$_POST['category_name'];
$category_hide_value=(int)$_POST['category_hide_value'];

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO category (category_name, category_hide_value)
VALUES ('$category_name', $category_hide_value)";
$conn->exec($sql);

header("location:/administrator/add_category.php?category=added");
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
