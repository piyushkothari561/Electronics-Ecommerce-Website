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
 <h1 class="display-4 text-center ">Select a category</h1>  
</div>
<div class="container bg-secondary rounded mx-auto my-2">
<form action="modify_category.php" method="POST">
	<?php
	    $stmt = $conn->prepare('select * from category where category_id !=1');
		$stmt->execute();
	?>
		    
	

			<!------------------------------------------------------------------------------------------------>
				<div class="col-12 form-group mx-2 my-2 text-center">
		                    <label class="col-12 text-white" for="category">Categories</label>
		                    <select class="col-12 form-control" id="category" name="category_id" required>
							<option value="">Choose a category</option>
    <?php
    while ($category_data=$stmt->fetch(PDO::FETCH_ASSOC))
    {
        echo "<option name='category_id' id='".$category_data['category_id']."' value='".$category_data['category_id']."'>".$category_data['category_name']."</option>";
    }
    ?> 
	</select>
		         </div>
		       	<!------------------------------------------------------------------------------------------------> 
		    	<!------------------------------------------------------------------------------------------------> 
						<div class="col-12 form-group mx-2 my-2">
				<button  class="btn btn-primary col-12 mb-2">Click to modify selected category</button>
				</form>
				</div>
		     
			
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


					
		