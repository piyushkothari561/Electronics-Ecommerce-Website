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
<h1 class="display-4 text-center">Sales DATA</h1>

<div class="container-fluid">
<table class="table table-striped">
  <thead>
    <tr> 
      <th scope="col">Sale ID</th>
      <th scope="col">Username</th>
      <th scope="col">Product ID</th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>  
      <th scope="col">Total price</th> 
      <th scope="col">Date of purchase</th> 
    </tr>
  </thead>
  <tbody>
    <tr>  
<?php
$stmt = $conn->prepare("SELECT * FROM sale;");
$stmt->execute();
$user_data_check=$stmt->fetch(PDO::FETCH_ASSOC);
if (!empty($user_data_check)) {
while ($user_data=$stmt->fetch(PDO::FETCH_ASSOC))

    {

?>
      <td><?php echo $user_data['sale_id'] ?> </td>
      <td><?php echo $user_data['username'] ?> </td>
      <td><?php echo $user_data['product_id'] ?> </td>
      <td><?php echo $user_data['product_name'] ?></td>
      <td><?php echo $user_data['quantity'] ?></td>
      <td><?php echo $user_data['price'] ?></td>
      <td><?php echo $user_data['date'] ?></td>

    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
<!------------------------------------------------------------------------------------------------------------------------------------------>
              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>

<?php
   }
    else
    {
?>
            </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>
     <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-12">
          <div class="p-4 text-center">
                <h3>No Orders</h3>
          </div>
        </div>
      </div>
<?php     
    }
?>
    </div>
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