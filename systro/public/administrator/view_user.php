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
<h1 class="display-4 text-center">Users data</h1>
<?php
$stmt = $conn->prepare("SELECT * FROM user;");
$stmt->execute();
?>
<div class="container-fluid">
<table class="table table-striped">
  <thead>
    <tr> 
      <th scope="col">user_id</th>
      <th scope="col">Username</th>
      <th scope="col">Name</th>
      <th scope="col">Date of birth</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Registration date</th>     
    </tr>
  </thead>
  <tbody>
    <tr>  
    <?php
        while($user_data=$stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
      <td><?php echo $user_data['user_id'] ?> </td>
      <td><?php echo $user_data['username'] ?> </td>
      <td><?php echo $user_data['first_name'] ?> <?php echo $user_data['last_name'] ?> </td>
      <td><?php echo $user_data['date_of_birth'] ?> </td>
      <td><?php echo $user_data['email'] ?> </td>
      <td><?php echo $user_data['phone'] ?> </td>
      <td><?php echo $user_data['user_registration_date'] ?> </td>
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
