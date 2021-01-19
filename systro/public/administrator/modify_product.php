<?php 
require $_SERVER["DOCUMENT_ROOT"] . "/include/connection.php";
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if (isset($_SESSION['administratorloggedin']) == true) {
?>
<!------------------------------------------------------------------------------------------------------------------------------>
<?php require $_SERVER["DOCUMENT_ROOT"] . "/administrator/include/administrator_header.php"?>
<?php require $_SERVER["DOCUMENT_ROOT"] . "/administrator/include/administrator_sidebar.php"?>
<?php require $_SERVER["DOCUMENT_ROOT"] . "/include/connection.php"?>

<div class="container">
 <div class="jumbotron">
 <h1 class="display-4 text-center ">Modify products</h1> 
</div>
<?php
	$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if (strpos($fullUrl, "product=modified") == true)  
	{
      echo "<div class=\"alert alert-warning alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>Product modified in the database.</strong></div>";
    }
    if (strpos($fullUrl, "product=deleted") == true)  
	{
      echo "<div class=\"alert alert-danger alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>Product deleted from database.</strong></div>";
    }else
    {

	?>
<div class="container bg-secondary rounded mx-auto my-2">

<?php

$product_id=$_GET['product_id'];
$stmt = $conn->prepare("SELECT * FROM product WHERE product_id = '$product_id';");
$stmt->execute();
$product_data=$stmt->fetch(PDO::FETCH_ASSOC);
$selected_category_id=$product_data['category_id'];
$stmt = $conn->prepare("SELECT * FROM category WHERE category_id = '$selected_category_id';");
$stmt->execute();
$selected_category_data=$stmt->fetch(PDO::FETCH_ASSOC);

?>


				<form action="modify_product.inc.php" class="form-inline" role="form" enctype="multipart/form-data" method="post">

                <div class="col-12 form-group mx-2 my-2">
		            <label class="col-12 text-white" >Product ID</label>
                    <input type="number"  value="<?php echo $product_data['product_id'] ?>" class="form-control col-12" name="product_id" placeholder="Enter Price" readonly required>
                 </div>
                 <div class="col-12 form-group mx-2 my-2">
		            <label class="col-12 text-white" >Product Date</label>
                    <input type="date" class="form-control col-12" name="product_date"  value="<?php echo $product_data['product_date'] ?>" required>
		         </div>
				<div class="col-12 form-group text-left mx-2 my-2">
					<label class="col-12 text-white" >Product Visibility</label>
					<select class="col-12 form-control" id="category" name="product_hide_value" required>
                        <?php
                        $product_hide_value=$product_data['product_hide_value'];
                        if($product_hide_value>0)
                        {
		                    echo '<option value="1" selected="1">Visible</option>';
                            echo '<option value="0"  >Hidden</option>';
                        }
                        else
                        {
                             echo '<option value="0" selected="1">Hidden</option>';
                             echo '<option value="1">Visible</option>';
                        }
                        ?>

					</select>
		         </div>

                	<!------------------------------------------------------------------------------------------------>
				<div class="col-12 form-group mx-2 my-2">
		                    <label class="col-12 text-white" for="category">Categories</label>
		                <select class="col-12 form-control" id="category" name="category" required>
		                    	<option value="<?php echo $product_data['category_id'] ?>" selected="1"><?php echo $selected_category_data['category_name'] ?></option >
								<?php
    $stmt = $conn->prepare('select * from category where category_hide_value=1;');
    $stmt->execute();
    while ($category_data=$stmt->fetch(PDO::FETCH_ASSOC))
    {
        echo "<option name='".$category_data['category_id']."' id='".$category_data['category_id']."' value='".$category_data['category_id']."'>".$category_data['category_name']."</option>";
    }
    ?> 
	</select>
		                
		         </div>
		       	<!------------------------------------------------------------------------------------------------> 
		    	<!------------------------------------------------------------------------------------------------> 
						
          
                <div class="col-12 form-group mx-2 my-2">
		            <label class="col-12 text-white" >Name</label>
                    <input type="text" class="form-control col-12" name="product_name"  value="<?php echo $product_data['product_name'] ?>" required>
		         </div>
                 <div class="col-12 form-group mx-2 my-2">
		            <label class="col-12 text-white" >Brand</label>
                    <input type="text" class="form-control col-12" name="product_brand" value="<?php echo $product_data['product_brand'] ?>" required>
		         </div>
                 <div class="col-12 form-group mx-2 my-2">
		            <label class="col-12 text-white" >Price</label>
                    <input type="number" onchange="setTwoNumberDecimal" min="0" max="50000" step="0.01" value="<?php echo $product_data['product_price'] ?>" class="form-control col-12" name="product_price" placeholder="Enter Price" required>
		         </div>
                 <div class="col-12 form-group mx-2 my-2">
		            <label class="col-12 text-white" >Description</label>
                    <textarea type="text" class="form-control col-12" name="product_description" rows="5" required><?php echo $product_data['product_description'] ?></textarea>
		         </div>
                 <div class="col-12 form-group mx-2 my-2">
                    <label class="col-12 text-white" >First image</label>
                    <?php
                    if(""== trim($product_data['image_location_1']))
                    {
                    ?>
                    <div  class="col-12 imagear py-5 my-3"><img class="image-fluid" src="../images/default.png"></div>
                    <?php
                    }
                    else
                    {
                    ?>
					<div  class="col-12 imagear py-5 my-3"><img class="image-fluid" src="../images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_1']; ?>"></div>
                    <?php
                    }
                    ?>
                        <div class="custom-file mx-2 my-2">
                            <input class="col-12 mx-2 my-2 text-white" type="file"  name="image_1">
                        </div>
                        <label class="col-12 text-white" >Second image</label>
                        <?php
                    if(""== trim($product_data['image_location_2']))
                    {
                    ?>
                    <div  class="col-12 imagear py-5 my-3"><img class="image-fluid" src="../images/default.png"></div>
                    <?php
                    }
                    else
                    {
                    ?>
					<div  class="col-12 imagear py-5 my-3"><img class="image-fluid" src="../images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_2']; ?>"></div>
                    <?php
                    }
                    ?>
                        <div class="custom-file mx-2 my-2">
                            <input class="col-12 mx-2 my-2 text-white" type="file"  name="image_2">
                        </div>
                        <label class="col-12 text-white" >Third image</label>
                        <?php
                    if(""== trim($product_data['image_location_3']))
                    {
                    ?>
                    <div  class="col-12 imagear py-5 my-3"><img class="image-fluid" src="../images/default.png"></div>
                    <?php
                    }
                    else
                    {
                    ?>
					<div  class="col-12 imagear py-5 my-3"><img class="image-fluid" src="../images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_3']; ?>"></div>
                    <?php
                    }
                    ?>
                        <div class="custom-file mx-2 my-2">
                            <input class="col-12 mx-2 my-2 text-white" type="file"  name="image_3">
                        </div>
                        
		         </div>
                 <div class="col-12 form-group mx-2 my-3">
                <button name="modify_product" type="submit" class="btn btn-warning col-12 mb-2">Modify product</button>
                <button class="btn btn-danger col-12 mb-2" type="button"  data-toggle="modal" data-target="#delete_warning_modal" >Delete product</button>

<div class="modal fade" id="delete_warning_modal" tabindex="-1" role="dialog" aria-labelledby="delete_warning_modal_title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="delete_warning_modal_title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 class="text-danger text-center" >The selected product will be deleted.</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button name="delete_product" type="submit" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>






				</div>
		        </form>
			
			<!------------------------------------------------------------------------------------------------>

<?php
}
?>


	</div>
</div>
<?php require $_SERVER["DOCUMENT_ROOT"] . "/administrator/include/administrator_footer.php"?>
<!------------------------------------------------------------------------------------------------------------------------------>
<?php
}

else
 {
   header("location: ../login.php");
 }

 ?>


					
		