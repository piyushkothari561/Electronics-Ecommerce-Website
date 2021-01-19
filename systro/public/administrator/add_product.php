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
 <h1 class="display-4 text-center ">Add products</h1> 
</div>
<?php
	$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if (strpos($fullUrl, "product=added") == true)  
	{
      echo "<div class=\"alert alert-success alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>Product added to the database.</strong></div>";
    }
	
	?>
<div class="container bg-secondary rounded mx-auto my-2">

				<form action="add_product.inc.php" class="form-inline" role="form" enctype="multipart/form-data" method="post">

				<div class="col-12 form-group text-left mx-2 my-2">
					<label class="col-12 text-white" >Product Visibility</label>
					<select class="col-12 form-control" id="product" name="product_hide_value" required>
		                    	<option value="1" selected="">Visible</option >
								<option value="0" >Hidden</option >
					</select>
		         </div>

                	<!------------------------------------------------------------------------------------------------>
				<div class="col-12 form-group mx-2 my-2">
		                    <label class="col-12 text-white" for="category">Categories</label>
		                <select class="col-12 form-control" id="category" name="category" required>
		                    	<option value="" selected="" disabled="">Select category</option >
								<?php
    $stmt = $conn->prepare('select * from category;');
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
                    <input type="text" class="form-control col-12" name="product_name"  placeholder="Enter name" required>
		         </div>
                 <div class="col-12 form-group mx-2 my-2">
		            <label class="col-12 text-white" >Brand</label>
                    <input type="text" class="form-control col-12" name="product_brand" placeholder="Enter Brand" required>
		         </div>
                 <div class="col-12 form-group mx-2 my-2">
		            <label class="col-12 text-white" >Price</label>
                    <input type="number" onchange="setTwoNumberDecimal" min="0" max="50000" step="0.01" value="" placeholder="0.00" class="form-control col-12" name="product_price" placeholder="Enter Price" required>
		         </div>
                 <div class="col-12 form-group mx-2 my-2">
		            <label class="col-12 text-white" >Description</label>
                    <textarea type="text" class="form-control col-12" name="product_description" rows="5" placeholder="Enter Description" required></textarea>
		         </div>
                 <div class="col-12 form-group mx-2 my-2">
		            <label class="col-12 text-white" for="category">Can add upto three images</label>
                        <div class="custom-file mx-2 my-2">
                            <input class="col-12 mx-2 my-2 text-white" type="file"  name="image_1">
                        </div>
                        <div class="custom-file mx-2 my-2">
                            <input class="col-12 mx-2 my-2 text-white" type="file"  name="image_2">
                        </div>
                        <div class="custom-file mx-2 my-2">
                            <input class="col-12 mx-2 my-2 text-white" type="file"  name="image_3">
                        </div>
                        
		         </div>
                 <div class="col-12 form-group mx-2 my-3">
				<button name="submit" type="submit" class="btn btn-primary col-12 mb-2">Add product</button>
				</div>
                
                

		        </form>
			
			<!------------------------------------------------------------------------------------------------>


    

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


					
		