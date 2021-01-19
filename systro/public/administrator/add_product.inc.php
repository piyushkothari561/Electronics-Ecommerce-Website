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
  
 

if (isset($_POST['submit'])) {
$category_id=(int)$_POST['category'];
$product_name=$_POST['product_name'];
$product_brand=$_POST['product_brand'];
$product_price=(int)$_POST['product_price'];
$product_description=$_POST['product_description'];
$image_location_1=$_FILES["image_1"]["name"];
$image_location_2=$_FILES["image_2"]["name"];
$image_location_3=$_FILES["image_3"]["name"];
$product_date= date("Y-m-d");
$product_hide_value=(int)$_POST['product_hide_value'];

$image_folder ="../images/uploads/";
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO product (product_name, product_brand, product_price, product_description, category_id, product_date, image_location_1, image_location_2, image_location_3,product_hide_value)
VALUES ('$product_name', '$product_brand', $product_price, '$product_description', $category_id, '$product_date', '$image_location_1','$image_location_2' ,'$image_location_3', $product_hide_value)";

$conn->exec($sql);
mkdir($image_folder .DIRECTORY_SEPARATOR. $conn->lastInsertId());
move_uploaded_file($_FILES["image_1"]["tmp_name"],"../images/uploads/" . $conn->lastInsertId() . "/" . $image_location_1);	
move_uploaded_file($_FILES["image_2"]["tmp_name"],"../images/uploads/" . $conn->lastInsertId() . "/" . $image_location_2);	
move_uploaded_file($_FILES["image_3"]["tmp_name"],"../images/uploads/" . $conn->lastInsertId() . "/" . $image_location_3);	



header("location:/administrator/add_product.php?product=added");
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
