<?php require $_SERVER["DOCUMENT_ROOT"] . "/include/connection.php";
      if(!isset($_SESSION)) 
      { 
          session_start(); 
      } 
$username = $_SESSION['username'];
if (isset($_POST['add_review'])) {
$product_id=(int)$_POST['product_id'];
$comment=$_POST['comment'];
$rating=(int)$_POST['rating'];
$exist=$_POST['exist'];

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO review (username, product_id, comment, rating, exist) VALUES ('$username', $product_id, '$comment',$rating, $exist);";
$conn->exec($sql);

header("location:../user_view_product.php?review=added&product_id=$product_id");
}
if (isset($_POST['update_review'])) {
    $product_id=(int)$_POST['product_id'];
    $comment=$_POST['comment'];
    $rating=(int)$_POST['rating'];

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE `review` SET `comment` = '$comment', `rating` = '$rating' WHERE (`product_id` = '$product_id' AND `username` = '$username');";
    $conn->exec($sql);
    header("location:../user_view_product.php?review=updated&product_id=$product_id");
}




?>