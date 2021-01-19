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
 <h1 class="display-4 text-center ">Add a category</h1>  
</div>
<?php
	$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if (strpos($fullUrl, "category=added") == true)  
	{
      echo "<div class=\"alert alert-success alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>New category added to the database.</strong></div>";
    }
?>
<div class="container bg-secondary rounded mx-auto my-2">
	
		    
				<form action="add_category.inc.php" class="form-inline" role="form" method="post" action="">
				<div class="col-12 form-group text-left mx-2 my-2">
					<label class="col-12 text-white" >Category Visibility</label>
					<select class="col-12 form-control" id="category" name="category_hide_value" required>
		                    	<option value="1" selected="">Visible</option >
								<option value="0" >Hidden</option >
					</select>
		         </div>
			<!------------------------------------------------------------------------------------------------>
            <div class="col-12 form-group mx-2 my-2">
		            <label class="col-12 text-white" >New category name.</label>
                    <input type="text" class="form-control col-12" name="category_name"  placeholder="Enter category name" required>
		         </div>
		       	<!------------------------------------------------------------------------------------------------> 
		    	<!------------------------------------------------------------------------------------------------> 
						<div class="col-12 form-group mx-2 my-2">
				<button name="add_category" type="submit" class="btn btn-primary col-12 mb-2">Click to add new category</button>
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


					
		