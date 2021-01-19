<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if (isset($_SESSION['userloggedin']) == true)
{ 

  
?>
<!------------------------------------------------------------------------------------------------------------------------------>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/user_header.php" ?>

<div class="px-4 px-lg-0">
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
        <div class="table-responsive">
        <!-- Alert -->
        <!-- Alert END --> 
        <div class="col-12 p-2">
          <a href="user_profile.php" class="float-center col-2 btn btn-dark text-white">Back to profile</a>
        </div>
          <!-- Back Button Behavior END -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Total</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Date of purchase</div>
                  </th>
                </tr>
              </thead>
              <tbody>
<!------------------------------------------------------------------------------------------------------------------------------------------>
<?php
$loggedin_username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT * FROM sale WHERE username = '$loggedin_username';");
$stmt->execute();
$user_data_check=$stmt->fetch(PDO::FETCH_ASSOC);
if (!empty($user_data_check)) {
while ($user_data=$stmt->fetch(PDO::FETCH_ASSOC))

    {

?>
                <tr>
                  <th scope="row">
                    <div class="p-2">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <p href="#" class="text-dark d-inline-block align-middle"><?php echo $user_data["product_name"]; ?></p></h5>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong>$<?php echo $user_data["price"]; ?></strong></td>
                  <td class="border-0 align-middle"><strong><?php echo $user_data["quantity"]; ?></strong></td>
                  <td class="border-0 align-middle"><strong>$<?php echo number_format($user_data["quantity"] * $user_data["price"], 2);?></strong></td>
                  <td class="border-0 align-middle"><strong><?php echo $user_data["date"]; ?></strong></td>
                </tr>
<?php
    }
?>
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

<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/user_footer.php" ?>
<!------------------------------------------------------------------------------------------------------------------------------>
<?php

} 
else
 {
   header("location:../login.php");
 }
 ?>