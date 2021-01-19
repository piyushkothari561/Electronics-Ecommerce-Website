<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if (isset($_SESSION['userloggedin']) == true) {
?>
<!------------------------------------------------------------------------------------------------------------------------------>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/user_header.php";


if (isset($_GET['product_id']))
{
  $product_id=$_GET['product_id'];
  $stmt = $conn->prepare("SELECT * FROM product WHERE product_id = $product_id;");
  $stmt->execute();
  $product_data=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container pt-4">
<div class="jumbotron bgcolor">
<div class="container">
<div class="row">
<div class="col-md-5">
<div id="product_image_carousel" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
<?php
 if (""== trim($product_data['image_location_1']) AND ""== trim($product_data['image_location_2']) AND ""== trim($product_data['image_location_3']))
 {//If none the product doesn't have any preview images, a deafault image saying preview will be shown.
?>
<div class="carousel-item active imagear">
  <img src="images/default.png" alt="No image found">
</div>
</div>
<?php
 }
 if(""!== trim($product_data['image_location_1']) AND ""!== trim($product_data['image_location_2']) AND ""!== trim($product_data['image_location_3']))
 {// if all the three previews exist and all three product will be shown product
?>
<div class="carousel-item active imagear">
<img src="images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_1']; ?>" alt="First image">
</div>
<div class="carousel-item imagear">
<img src="images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_2']; ?>" alt="Second image">
</div>
<div class="carousel-item imagear">
<img src="images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_3']; ?>" alt="Third image">
</div>
</div>
<a class="carousel-control-prev" href="#product_image_carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#product_image_carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
<?php
 }
  if(""== trim($product_data['image_location_1']) AND ""!== trim($product_data['image_location_2']) AND ""!== trim($product_data['image_location_3']))
  {// only second and third product image is shown.
?>
<div class="carousel-item active imagear">
<img src="images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_2']; ?>" alt="Second image">
</div>
<div class="carousel-item imagear">
<img src="images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_3']; ?>" alt="Third image">
</div>
</div>
<a class="carousel-control-prev" href="#product_image_carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#product_image_carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
<?php
 }if(""!== trim($product_data['image_location_1']) AND ""== trim($product_data['image_location_2']) AND ""!== trim($product_data['image_location_3']))
 {// only first and third product image shown
?>
<div class="carousel-item active imagear">
<img src="images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_1']; ?>" alt="First image">
</div>
<div class="carousel-item imagear">
<img src="images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_3']; ?>" alt="Third image">
</div>
</div>
<a class="carousel-control-prev" href="#product_image_carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#product_image_carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
<?php
 }if(""!== trim($product_data['image_location_1']) AND ""!== trim($product_data['image_location_2']) AND ""== trim($product_data['image_location_3']))
 {// only first and second product image is shown
?>
<div class="carousel-item active imagear">
<img src="images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_1']; ?>" alt="First image">
</div>
<div class="carousel-item imagear">
<img src="images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_2']; ?>" alt="Second image">
</div>
</div>
<a class="carousel-control-prev" href="#product_image_carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#product_image_carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
<?php
 }if(""!== trim($product_data['image_location_1']) AND ""== trim($product_data['image_location_2']) AND ""== trim($product_data['image_location_3']))
 {// only first product image is shown
?>
<div class="carousel-item active imagear">
<img src="images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_1']; ?>" alt="First image">
</div>
</div>
<?php
 }if(""== trim($product_data['image_location_1']) AND ""!== trim($product_data['image_location_2']) AND ""== trim($product_data['image_location_3']))
 {// only second product image is shown
?>
<div class="carousel-item active imagear">
<img src="images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_2']; ?>" alt="Second image">
</div>
</div>
<?php
 }if(""== trim($product_data['image_location_1']) AND ""== trim($product_data['image_location_2']) AND ""!== trim($product_data['image_location_3']))
 {// only third product image is shown
?>
<div class="carousel-item active imagear">
<img src="images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_3']; ?>" alt="Third image">
</div>
</div>
<?php
 }
?>
</div>
</div>
<div class="col-md-7">
<h2 class="font-weight-bold text-break"><?php echo $product_data['product_name'] ?></h2>
<a >by <?php echo $product_data['product_brand'] ?></a>

<hr>
<div class="col-12"><h4 class="text-success sen700">Price: $<?php echo $product_data['product_price'] ?></h4></div>
<hr>
<h5 class="col-12 font-weight-bold">Shipping details <span class="fas fa-shipping-fast"></span></h5>
<p class="col-12">Ships worldwide <span class="fas fa-globe"></span></p>
<p class="col-12">Ships within 2-4 business days</p>
<p class="col-12"><b>Estimated delivery time: </b></p>
<p class="col-12">8-14 days from the date of shipment.</p>
<hr>
<!----------------------------------------------->
<form method="post" action="cart.php" >
<div class="col-12 py-2">
<button  type="submit" name="add_to_cart" class="btn btn-success btn-md" value="Add to cart">Add to cart<span class="fas fa-cart-plus"></button>
</div>
<div class="col-12">
<label class="col-8" >Quantity</label>
<input class="form-control col-4" type="number" name="quantity" value="1">
<input type="hidden" name="hidden_name" value="<?php echo $product_data['product_name'] ?>">
<input type="hidden" name="hidden_price" value="<?php echo $product_data['product_price'] ?>">
<input type="hidden" name="hidden_id" value="<?php echo $product_data['product_id'] ?>">
</div>
</form>
<!----------------------------------------------->
<hr>
</div>
<hr>
</div>
<hr>
<!-------------------CART MESSAGES---------------------------->
<?php
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($fullUrl, "review=added") == true)  
    {
        echo "<div class=\"alert alert-success alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>Review submitted</strong>";
    }
    if (strpos($fullUrl, "review=updated") == true)  
    {
        echo "<div class=\"alert alert-success alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>Review Updated</strong>";
    }
    if(isset($_GET["success"]))
    {
      echo '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Item Added into Cart</div>';
    }
?>
</div>

<hr>
  <!-- Nav tabs -->
<div class="container">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#product_details">Product details</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#reviews_rating">Reviews & Rating</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#Leave_review">Leave a review</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="product_details" class="container tab-pane active"><br>
      <ul>
        <li><?php echo $product_data['product_description'] ?></li>
       
    </ul>
    </div>
     <!-- Tab panes -->
    <div id="reviews_rating" class="container tab-pane fade"><br>

  <!--REVIEW BEGIN-->   
  <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">All Reviews</h6>
<?php
$stmt = $conn->prepare("SELECT * FROM review WHERE product_id = '$product_id' ;");
$stmt->execute();
while ($review_display_data=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0">
          <strong class="text-gray-dark">@<?php echo $review_display_data['username'] ?></strong>
          <p class="text-gray-dark">User rating <?php echo $review_display_data['rating'] ?>/5</p>
          </p>
        </div>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <?php echo $review_display_data['comment'] ?>
          </p>
        </div>
<?php
}
?>
      </div>
  <!--REVIEW END-->      
  </div>    
   <!-- Tab panes -->

    <div id="Leave_review" class="container tab-pane"><br>

<!-------------------------------------------------------->


<div class="container rounded">

<?php

$stmt = $conn->prepare("SELECT * FROM review WHERE product_id = '$product_id' AND username = '$loggedin_username';");
$stmt->execute();
$review_data=$stmt->fetch(PDO::FETCH_ASSOC);
if("1"== ($review_data['exist']))
{
?>
<form action="include/add_review.inc.php" method="POST">
      <div class="form-group row">
      <label class="col-sm-2 col-form-label">@ <?php echo $loggedin_username ?></label>
      <div class="col-sm-10">
        <textarea class="form-control" type="textarea" name="comment" required rows="3"><?php echo $review_data['comment']; ?></textarea>
        <input type="hidden" value="<?php echo $product_data['product_id'] ?>" name="product_id" >
        
      </div>
      </div>
   
  	<div class="form-group row col-12">
  <select class="col-5 custom-select custom-select-sm" name="rating" required>
  <option value="<?php echo $review_data['rating']; ?>" name="rating" selected>Rating given <?php echo $review_data['rating']; ?></option>
  <option value="1" name="rating" >1</option>
  <option value="2" name="rating" >2</option>
  <option value="3" name="rating" >3</option>
  <option value="4" name="rating" >4</option>
  <option value="5" name="rating" >5</option>
</select>
  	  <button type="submit" class="ml-auto btn btn-info" name="update_review">Update review</button>
  	</div>
    </form>
<?php
}
else
{
?>
<form action="include/add_review.inc.php" method="POST">
      <div class="form-group row">
      <label class="col-sm-2 col-form-label">@ <?php echo $loggedin_username ?></label>
      <div class="col-sm-10">
        <textarea class="form-control" type="textarea" name="comment" required rows="3"></textarea>
        <input type="hidden" value="<?php echo $product_data['product_id'] ?>" name="product_id" >
        <input type="hidden" value="1" name="exist">
      </div>
      </div>
   
  	<div class="form-group row col-12">
  <select name="rating" class="col-5 custom-select custom-select-sm" required>
  <option value="" name="rating" selected>Rating</option>
  <option value="1" name="rating" >1</option>
  <option value="2" name="rating" >2</option>
  <option value="3" name="rating" >3</option>
  <option value="4" name="rating" >4</option>
  <option value="5" name="rating" >5</option>
</select>
  	  <button type="submit" class="ml-auto btn btn-info" name="add_review">Submit review</button>
  	</div>
    
</form>
    <?php
    
    } 
    
    
    ?>


</div>

<!------------------------------------------------------------->


    </div>
     <!-- Tab panes -->

</div>
</div>
</div>
</div>
</div>
<?php
    
   }
   else
   {
     header("location:index.php");
   }
  
  
  ?>

<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/footer.php" ?>
<!------------------------------------------------------------------------------------------------------------------------------>
<?php
}
else
 {
   header("location:../login.php");
 }
 ?>
