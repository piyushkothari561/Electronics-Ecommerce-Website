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
 <h1 class="display-4 text-center ">Modify category</h1> 
</div>
<?php
	$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if (strpos($fullUrl, "category=modified") == true)  
	{
      echo "<div class=\"alert alert-warning alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>Category modified in the database.</strong></div>";
    }
    if (strpos($fullUrl, "category=deleted") == true)  
	{
      echo "<div class=\"alert alert-danger alert-dismissable\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><strong>category deleted from database.</strong></div>";
      ?>
      <div class="container bg-secondary rounded mx-auto my-2 text-center">
      <a href="view_category.php" class="btn btn-secondary">Go back to category selection.</a>
      </div>
      <?php
    }else
    {

	?>
<div class="container bg-secondary rounded mx-auto my-2">

<?php
if(isset($_GET['category_id']))
{
  $category_id=$_GET['category_id'];
}else
{
  $category_id=$_POST['category_id'];
}

$stmt = $conn->prepare("SELECT * FROM category WHERE category_id = '$category_id';");
$stmt->execute();
$category_data=$stmt->fetch(PDO::FETCH_ASSOC);
?>


				<form action="modify_category.inc.php" class="form-inline" role="form" enctype="multipart/form-data" method="post">


                


                	<!------------------------------------------------------------------------------------------------>
                  <div class="col-12 form-group mx-2 my-2">
                <label class="col-12 text-white" >Category name</label>
                <input type="hidden" class="form-control col-12" name="category_id" value="<?php echo $category_data['category_id'] ?>" required>
                    <input type="text" class="form-control col-12" name="category_name" value="<?php echo $category_data['category_name'] ?>" required>
		         </div>
		       	<!------------------------------------------------------------------------------------------------> 
		    	<!------------------------------------------------------------------------------------------------> 
          <div class="col-12 form-group mx-2 my-2">
					<label class="col-12 text-white" >Category Visibility</label>
					<select class="col-12 form-control" id="category" name="category_hide_value" required>
                        <?php
                        $category_hide_value=$category_data['category_hide_value'];
                        if($category_hide_value>0)
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
          

                 <div class="col-12 form-group mx-2 my-3">
                <button name="modify_category" type="submit" class="btn btn-warning col-12 mb-2">Modify category</button>
                <button class="btn btn-danger col-12 mb-2" type="button"  data-toggle="modal" data-target="#delete_warning_modal" >Delete category</button>

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
        <h3 class="text-danger text-center" >The selected category will be deleted.</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button name="delete_category" type="submit" class="btn btn-danger">Delete</button>
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


					
		