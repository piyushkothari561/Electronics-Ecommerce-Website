<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<div class="container bgcolor">
		<h2 class="text-center col-12 py-5">Take a look at our products</h1>
		<div class="row">
		<div class="container bgcolor">
<div class="row">

<!-- Product  -->
<?php
                $stmt = $conn->prepare("SELECT * FROM product WHERE product_hide_value=1 ORDER BY RAND() LIMIT 24;");
                $stmt->execute();
                while ($product_data=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                     $product_id=$product_data['product_id']
                                   


?>


			<div class="col-md-3 col-6  product-grid">
			    <div class="image imagear">

                    <a>      
                    <?php 
                    if(""!== trim($product_data['image_location_1']))
                    {
                    ?>
					<img src="images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_1']; ?>" class="img img-fluid full-width">
                    <?php  
                    }  
                    ?>
                    <?php 
                    if(""== trim($product_data['image_location_1']) AND ""!== trim($product_data['image_location_2']))
                    {
                    ?>
					<img src="images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_2']; ?>" class="img img-fluid full-width">
                    <?php  
                    }  
                    ?>
                    <?php 
                    if(""== trim($product_data['image_location_1']) AND ""== trim($product_data['image_location_2']) AND ""!== trim($product_data['image_location_3']))
                    {
                    ?>
					<img src="images/uploads/<?php echo $product_data['product_id'] ?>/<?php echo $product_data['image_location_3']; ?>" class="img img-fluid full-width">
                    <?php  
                    }  
                    ?>
                    <?php
                    if(""== trim($product_data['image_location_1']) AND ""== trim($product_data['image_location_2']) AND ""== trim($product_data['image_location_3']))
                    {
                    ?>
                    <img src="images/default.png" class="img img-fluid full-width">
                    <?php  
                    }  
                    ?>
						<div class="imagearoverlay">

                        <?php 
                        if (isset($_SESSION['userloggedin']) == true) 
                        {
                        ?>
<!---------------------------------------------ONLY IF LOGGED IN AS USER--------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <a class="productdetail btn"  type="submit" href="user_view_product.php?product_id=<?php echo $product_data['product_id'] ?>" >View Product</a>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
                        <?php
                        }
                        else
                        {
                        ?>
                        <a class="productdetail btn"  type="submit" href="view_product.php?product_id=<?php echo $product_data['product_id'] ?>" >View Product</a>
                        <?php
                        }
                        ?>
                        </div>
                    </a >
			    </div>
				<h5 class="font-weight-bold pt-3 text-truncate "><?php echo $product_data['product_name'] ?></h5>
				<h5 class="text-center text-success sen700">$<?php echo $product_data['product_price'] ?></h5>
			</div>

         <?php
          } //while loop end bracket.
         ?>
		</div>

</div>


		</div>

</div>
