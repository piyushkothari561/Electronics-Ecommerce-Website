<?php  require_once $_SERVER["DOCUMENT_ROOT"] . "/include/connection.php"; 
if(isset($_POST["add_to_cart"]))//checks weather add to cart have been pressed
{       if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    $return_id=$_POST["hidden_id"];
    if(isset($_COOKIE["shopping_cart"]))
    {  
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true);
    }
    else
    {
        $cart_data = array();
    }

    $item_id_list = array_column($cart_data, 'item_id');

    if(in_array($_POST["hidden_id"], $item_id_list))
    {
        foreach($cart_data as $keys => $values)
        {
            if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
                {
                    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
                }
        }
    }
    else
    {
    $product_id=$_POST["hidden_id"];
    $item_array = array(
    'item_id'   => $_POST["hidden_id"],
   'item_name'   => $_POST["hidden_name"],
   'item_price'  => $_POST["hidden_price"],
   'item_quantity'  => $_POST["quantity"]
    );//all the data obtained from post are stored in an array
    $cart_data[] = $item_array;
    }
    $item_data = json_encode($cart_data);//converts PHP string into json.
    setcookie('shopping_cart', $item_data, time() + (86000 * 30));//expires cookies in 1 day.
    if (isset($_SESSION['userloggedin']) == true)
    {
        header("location:user_view_product.php?success=1&product_id=$return_id");
    }else{
        header("location:view_product.php?success=1&product_id=$return_id");
    }
        
}
if(isset($_GET["action"]))
{
 if($_GET["action"] == "delete")
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);
  $cart_data = json_decode($cookie_data, true);
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]['item_id'] == $_GET["id"])
   {
    unset($cart_data[$keys]);
    $item_data = json_encode($cart_data);
    setcookie("shopping_cart", $item_data, time() + (86400 * 30));
    header("location:cart.php?remove=1");
   }
  }
 }
 if($_GET["action"] == "clear")
 {
  setcookie("shopping_cart", "", time() - 3600);
  header("location:cart.php?clearall=1&");
 }
}
?>
<!--------------------------------------------------------------------------------------------------------------------------------------------------------->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script defer src="https://kit.fontawesome.com/da3faa99bb.js" crossorigin="anonymous"></script>
    <title>CART</title>
  </head>
  <body class="bg-dark">
<!--------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="px-4 px-lg-0">
  <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
        <div class="table-responsive">
        <!-- Alert -->
        <?php //Alert below will be shown in the cart if all the product was cleared.
           if(isset($_GET["clearall"]))
           {
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Your Shopping Cart has been cleared
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php
           }
        ?>
        <?php //The below alert will be shown if only one item is removed from the cart
           if(isset($_GET["remove"]))
           {
        ?>
        <div  class="alert alert-warning alert-dismissible fade show" role="alert">
        Item removed from Shopping Cart
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php
           }
        ?>
        <!-- Alert END --> 
        <div class="col-12 p-2">
          <a type="button" onclick="history.back();" class="col-2 btn btn-dark text-white">Go Back</a>
          <a href="index.php" class="float-right col-2 btn btn-dark text-white">Homepage</a>
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
                    <div class="py-2 text-uppercase"><a href="cart.php?action=clear" class="btn btn-danger rounded-pill py-2 btn-block">Remove all</a></div>
                  </th>
                </tr>
              </thead>
              <tbody>
<!------------------------------------------------------------------------------------------------------------------------------------------>
<?php
    if(isset($_COOKIE["shopping_cart"]))
    {
    $total = 0;
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);
    foreach($cart_data as $keys => $values)
    {

?>
                <tr>
                  <th scope="row">
                    <div class="p-2">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <p href="#" class="text-dark d-inline-block align-middle"><?php echo $values["item_name"]; ?></p></h5>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong>$ <?php echo $values["item_price"]; ?></strong></td>
                  <td class="border-0 align-middle"><strong><?php echo $values["item_quantity"]; ?></strong></td>
                  <td class="border-0 align-middle"><strong>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></strong></td>
                  <td class="border-0 align-middle text-center"><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>" class="text-danger"><strong><i class="fa fa-trash"></i> REMOVE</strong></a></td>
                </tr>
<?php
    $total = $total + ($values["item_quantity"] * $values["item_price"]);
    }
?>
<!------------------------------------------------------------------------------------------------------------------------------------------>
              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>

      <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-12">
          <div class="p-4">
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><h4 class="font-weight-bold">Total</h4>
                <h5 class="font-weight-bold">$ <?php echo number_format($total, 2); ?></h5>
              </li>
            </ul>
<form method="post" action="checkout.php" >
            <button type="submit" name="checkout" value="$ <?php echo number_format($total, 2); ?>" class="btn btn-info rounded-pill py-2 mb-2 btn-block">Proceed to checkout</button>
</form>
            <a href="index.php" class="btn btn-outline-success
             rounded-pill py-2 btn-block">Continue Shopping</a>


          </div>
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
                <h3>No items in the cart</h3>
          </div>
        </div>
      </div>
<?php     
    }
?>
    </div>
  </div>
</div>


<!--------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>