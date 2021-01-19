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
  
 
if (isset($_POST))
{
if (isset($_POST['modify_product']))
{
$product_id=$_POST['product_id'];
$category_id=(int)$_POST['category'];
$product_name=$_POST['product_name'];
$product_brand=$_POST['product_brand'];
$product_price=$_POST['product_price'];
$product_description=$_POST['product_description'];

//Checks whether new files to be uploaded have been choosen
$stmt = $conn->prepare("SELECT * FROM product WHERE product_id = '$product_id';");
$stmt->execute();
$product_data=$stmt->fetch(PDO::FETCH_ASSOC);
//first
if(""== trim($_FILES["image_1"]["name"]))
{
    $image_location_1=$product_data['image_location_1'];
}
elseif(""!== trim($_FILES["image_1"]["name"]))
{
    $image_location_1=$_FILES["image_1"]["name"];
    unlink("../images/uploads/" . $product_id . "/" . $product_data['image_location_1']);
    move_uploaded_file($_FILES["image_1"]["tmp_name"],"../images/uploads/" . $product_id . "/" . $image_location_1);
}//second
if(""== trim($_FILES["image_2"]["name"]))
{
    $image_location_2=$product_data['image_location_2'];
}
elseif(""!== trim($_FILES["image_2"]["name"]))
{
    $image_location_2=$_FILES["image_2"]["name"];
    unlink("../images/uploads/" . $product_id . "/" . $product_data['image_location_2']);
    move_uploaded_file($_FILES["image_2"]["tmp_name"],"../images/uploads/" . $product_id . "/" . $image_location_2);	
}//Third
if(""== trim($_FILES["image_3"]["name"]))
{
    $image_location_3=$product_data['image_location_3'];
}
elseif(""!== trim($_FILES["image_3"]["name"]))
{
    $image_location_3=$_FILES["image_3"]["name"];
    unlink("../images/uploads/" . $product_id . "/" . $product_data['image_location_3']);
    move_uploaded_file($_FILES["image_3"]["tmp_name"],"../images/uploads/" . $product_id . "/" . $image_location_3);
}

$product_date=$_POST['product_date'];
$product_hide_value=(int)$_POST['product_hide_value'];



$insert_update = "UPDATE `product` SET `product_name` = '$product_name', `product_brand` = '$product_brand', `product_price` = $product_price, `product_description` = '$product_description', `category_id` = '$category_id', `product_date` = '$product_date', `image_location_1` = '$image_location_1', `image_location_2` = '$image_location_2', `image_location_3` = '$image_location_3', `product_hide_value` = '$product_hide_value' WHERE (`product_id` = '$product_id');";
$updated_product = $conn->prepare($insert_update);
$updated_product->execute();


header("location:/administrator/modify_product.php?product=modified&product_id=$product_id");
}
if (isset($_POST['delete_product']))
{
    $product_id=$_POST['product_id'];
    $product_name=$_POST['product_name'];
    $delete_product = "DELETE FROM `product` WHERE (`product_id` = '$product_id');";
    $deleted_product = $conn->prepare($delete_product);
    $deleted_product->execute();
    header("location:/administrator/modify_product.php?product=deleted&product_name=$product_name");
}
}else{
    header("location:../administrator_index.php");
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


