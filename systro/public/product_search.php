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
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/header.php"?>
<!----------------------------------------------------------------------------------------------------------------------------->
<?php
$filter_by_text='';
$category_id ="0";
$product_search='';
if (isset($_POST['submit']))
{
     $filter_by=$_POST['filter_search'];
     if("recently" == trim( $filter_by)){
         $filter_by_text='Most recent';
     }if("low_to_high" == trim( $filter_by)){
        $filter_by_text='Low to high';
    }if("high_to_low" == trim( $filter_by)){
        $filter_by_text='High to low';
    }
     $category_id=(int)$_POST['category_search'];
     $product_search=$_POST['product_search'];
}
?>
<div class="jumbotron">
 <div class="container rounded">
    <form action="product_search.php" role="form" class="form-inline" method="post">
    <div class="form-inline col-md-9 pb-3">
<?php
if (isset($_POST['submit']))
{
    ?>
 <input type="text" value="<?php echo $product_search ?>" class="form-control col-12" name="product_search" placeholder="Search for products">
<?php
}else {
?>
<input type="text" value="" class="form-control col-12" name="product_search" placeholder="Search for products">
<?php  } ?>
    </div>
    <div class="form-inline col-md-3 pb-3">
    <button name="submit" type="submit" class="btn btn-primary col-12">Search</button>
    </div>
    <div class="form-inline col-6">
    <select class="form-control col-12" id="category" name="category_search">
    <?php
    if ($category_id>0)
    {
        $stmt = $conn->prepare("select * from category where category_id=$category_id;");
        $stmt->execute();
        $category_data_for_search=$stmt->fetch(PDO::FETCH_ASSOC);
        $cat_name=$category_data_for_search["category_name"];
    echo "<option value='$category_id' >$cat_name (last search)</option>";


    }
    ?>
    <option value="" >Filter by category</option>
    <?php
    $stmt = $conn->prepare('select * from category where category_hide_value=1;');
    $stmt->execute();
    while ($category_data=$stmt->fetch(PDO::FETCH_ASSOC))
    {
        echo "<option id='".$category_data['category_id']."' value='".$category_data['category_id']."'>".$category_data['category_name']."</option>";
    }
    ?>
	</select>
    </div>
    <div class="form-inline col-6">
    <select class="form-control col-12" id="category" name="filter_search">
    <?php
    if (isset($_POST['submit']))
    { 
    if($filter_by_text == "")
    {
        echo '<option value="" >Filter by</option>';
    }else {

      echo "<option value='$filter_by'>$filter_by_text (last search)</option>";
    }
    }
    ?>
    <option value="" >Filter by</option>
    <option value="recently" >Most recent</option>
    <option value="low_to_high" >Low to high</option>
    <option value="high_to_low" >High to low</option>
    
     
    </select>
    </div>
   </form>
   </div>
</div>

<div class="container bgcolor">
<div class="row p-3">
<div class="col-4 text-center">
<?php
if($category_id>0){
?>
<h3 class="col-12 bg-light"><?php echo $cat_name ?></h3>
<?php
} else {
?>
<h3 class="col-12 bg-light">No Category chosen</h3>
<?php } ?>
</div>
<div class="col-4 text-center">
<?php
if($product_search == NULL){
?>
<h3 class="col-12 bg-light"></h3>
<?php
} else {
?>
<h3 class="col-12 bg-light"><?php echo $product_search ?></h3>
<?php } ?>
</div>
<div class="col-4 text-center">
<?php
if($filter_by_text == ""){
?>
<h3 class="col-12 bg-light">No filter chosen</h3>
<?php
} else {
?>
<h3 class="col-12 bg-light"><?php echo $filter_by_text ?></h3>
<?php } ?>
</div>
</div>

<div class="row">

<!-- Product  -->
<?php

// This entire if and else statements are used to for the filtering of products by category and also allows searching of products using name , or filter dropdown in the right.
// Any combination of the filtering can be used on the search page and it will show the relevent result.
                               

                                    if (isset($_POST['submit']))
                               {

                                   if("" == trim($_POST['product_search']))
                                   {
                                       if ("" == trim($_POST['filter_search']) AND "" == trim($_POST['category_search']))
                                       {
                                        $stmt = $conn->prepare("SELECT * FROM product WHERE product_hide_value=1 ORDER BY RAND();");
                                        // no data from searchbar, filter or category. Random product is shown everytime search bar is clicked.
                                       }
                                       if ("" !== trim($_POST['filter_search']) AND "" !== trim($_POST['category_search']))
                                       {
                                           if ("recently"== trim($_POST['filter_search']))
                                           {
                                            $stmt = $conn->prepare("SELECT * FROM product WHERE category_id = $category_id AND product_hide_value=1 ORDER BY product_date ASC;");
                                            // no data from searchbar will show the product based on its date.
                                           }
                                           if ("low_to_high"== trim($_POST['filter_search']))
                                           {
                                            $stmt = $conn->prepare("SELECT * FROM product WHERE category_id = $category_id AND product_hide_value=1 ORDER BY product_price ASC;");
                                            // no data from searchbar product will be arraged using price, from low to high
                                           }
                                           if ("high_to_low"== trim($_POST['filter_search']))
                                           {
                                            $stmt = $conn->prepare("SELECT * FROM product WHERE category_id = $category_id AND product_hide_value=1 ORDER BY product_price DESC;");
                                            // no data from searchbar product will be arraged using price, from low to high
                                           }
                                       }
                                       if ("" == trim($_POST['filter_search']) AND "" !== trim($_POST['category_search']))
                                       {
                                           $stmt = $conn->prepare("SELECT * FROM product WHERE category_id = $category_id AND product_hide_value=1 ORDER BY product_name ASC;");
                                        // no data from searchbar no filter data only category selected.
                                       }
                                       if ("" !== trim($_POST['filter_search']) AND "" == trim($_POST['category_search']))
                                       {
                                           if ("recently"== trim($_POST['filter_search']))
                                           {
                                            $stmt = $conn->prepare("SELECT * FROM product WHERE product_hide_value=1 ORDER BY product_date ASC;");
                                            // no searchbar data. no category selected. product ordered from date
                                           }
                                           if ("low_to_high"== trim($_POST['filter_search']))
                                           {
                                            $stmt = $conn->prepare("SELECT * FROM product WHERE product_hide_value=1 ORDER BY product_price ASC;");
                                            // no searchbar data. no category selected. product ordered by price low to high.
                                           }
                                           if ("high_to_low"== trim($_POST['filter_search']))
                                           {
                                            $stmt = $conn->prepare("SELECT * FROM product WHERE product_hide_value=1 ORDER BY product_price DESC;");
                                            // no searchbar data. no category selected. product ordered by price high to low
                                           }
                                       }
                                   }
                                   else
                                   {
                                       if ("" == trim($_POST['filter_search']) AND "" == trim($_POST['category_search']))
                                       {
                                           $stmt = $conn->prepare("SELECT * FROM product WHERE product_name LIKE '%$product_search%' AND product_hide_value=1 ORDER BY product_name ASC;");
                                           // text from searchbar. no data from filter or category. product will be ordered by name.
                                       }
                                       if ("" !== trim($_POST['filter_search']) AND "" !== trim($_POST['category_search']))
                                       {
                                           if ("recently"== trim($_POST['filter_search']))
                                           {
                                            $stmt = $conn->prepare("SELECT * FROM product WHERE product_name LIKE '%$product_search%' AND product_hide_value=1 AND category_id = $category_id ORDER BY product_date ASC;");
                                            // text from searchbar. category was selected and filter was selected as recenly.
                                           }
                                           if ("low_to_high"== trim($_POST['filter_search']))
                                           {
                                            $stmt = $conn->prepare("SELECT * FROM product WHERE product_name LIKE '%$product_search%' AND product_hide_value=1 AND category_id = $category_id ORDER BY product_price ASC;");
                                            // text from searchbar. category was selected and filter was selected as low to high, products will be ordered that way.
                                           }
                                           if ("high_to_low"== trim($_POST['filter_search']))
                                           {
                                            $stmt = $conn->prepare("SELECT * FROM product WHERE product_name LIKE '%$product_search%' AND product_hide_value=1 AND category_id = $category_id ORDER BY product_price DESC;");
                                            // text from searchbar. category was selected and filter was selected as high to low, products will be ordered that way.
                                           }
                                       }
                                       if ("" == trim($_POST['filter_search']) AND "" !== trim($_POST['category_search']))
                                       {
                                           $stmt = $conn->prepare("SELECT * FROM product WHERE product_name LIKE '%$product_search%' AND product_hide_value=1 AND category_id = $category_id ORDER BY product_name ASC;");
                                           // text from searchbar. No filter was selected only selected products from category will be shown.
                                       }
                                       if ("" !== trim($_POST['filter_search']) AND "" == trim($_POST['category_search']))
                                       {
                                           if ("recently"== trim($_POST['filter_search']))
                                           {
                                            $stmt = $conn->prepare("SELECT * FROM product WHERE product_name LIKE '%$product_search%' AND product_hide_value=1 AND category_id = $category_id ORDER BY product_date ASC;");
                                            
                                            // text from searchbar. No category was selected and filter was selected as recenly.
                                           }
                                           if ("low_to_high"== trim($_POST['filter_search']))
                                           {
                                            $stmt = $conn->prepare("SELECT * FROM product WHERE product_name LIKE '%$product_search%' AND product_hide_value=1 AND category_id = $category_id ORDER BY product_price ASC;");
                                            // text from searchbar. No category was selected as low to high, products will be ordered that way.
                                           }
                                           if ("high_to_low"== trim($_POST['filter_search']))
                                           {
                                            $stmt = $conn->prepare("SELECT * FROM product WHERE product_name LIKE '%$product_search%' AND product_hide_value=1 AND category_id = $category_id ORDER BY product_price DESC;");
                                            // text from searchbar. No category was selected as high to low, products will be ordered that way.
                                           }
                                       }
                                   }
                                $stmt->execute();
                                if($stmt->fetch(PDO::FETCH_ASSOC)>0){
                                while ($product_data=$stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                   


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
                        <a class="productdetail btn"  type="submit" href="view_product.php?product_id=<?php echo $product_data['product_id'] ?>" >View Product</a>
						</div>
                    </a >
			    </div>
				<h5 class="font-weight-bold pt-3 text-truncate "><?php echo $product_data['product_name'] ?></h5>
				<h5 class="text-center text-success sen700">$<?php echo $product_data['product_price'] ?></h5>
			</div>

         <?php
          } //while loop end bracket.
        }elseif($product_search == NULL){
            echo "<h4 class=\"col-12 p-5 text-center \" >No result found.</h4>";
        }else{
            echo "<h4 class=\"col-12 p-5 text-center \" >No result found for <strong>$product_search</strong></h4>";
        }
    }
  else
                {
                    echo "<h4 class=\"col-12 p-5 text-center \" >Search a product</h4>"; 
                } 
         ?>
		



		</div>

</div>
<!----------------------------------------------------------------------------------------------------------------------------->
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/footer.php"?>
<!--All HTML Codes must be above this---------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php } } ?>
