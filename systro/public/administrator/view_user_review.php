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
<h1 class="display-4 text-center">User Reviews</h1>
<?php
$stmt = $conn->prepare("SELECT * FROM review;");
$stmt->execute();
?>
<div class="container-fluid">
<table class="table table-striped">
  <thead>
    <tr> 
      <th scope="col">Review ID</th>
      <th scope="col">Username</th>
      <th scope="col">Comment</th>
      <th scope="col">Rating</th>  
    </tr>
  </thead>
  <tbody>
    <tr>  
    <?php
        while($review_data=$stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
      <td><?php echo $review_data['review_id'] ?> </td>
      <td><?php echo $review_data['username'] ?> </td>
      <td><?php echo $review_data['comment'] ?> </td>
      <td><?php echo $review_data['rating'] ?>/5</td>

    </tr>
    <?php } ?>
  </tbody>
</table>
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
