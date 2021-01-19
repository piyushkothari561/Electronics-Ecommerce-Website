<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Checkout</title>
    <script src="js/form-validation.js"></script>
  </head>
  <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/connection.php"; 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(isset($_COOKIE["shopping_cart"]))
    {
    $total = 0;
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);
    
    }

?>
  <body class="bg-dark text-dark">

    <div class="container">
      <div class="py-5 text-center">
        <h2 class="text-white">Checkout</h2>
      </div>
      <?php
      if (isset($_SESSION['userloggedin']) == true) {
      ?>
<!-----------------------------User form begin--------------------------------------------------->

<div class="row col-md-8 text-white">
</div>
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
          </h4>
          <ul class="list-group mb-3">
          <?php
              foreach($cart_data as $keys => $values)
              {
          ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div class="col-12">
                <h6 class="my-0" style="width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $values["item_name"]; ?></h6>
                <small class="text-muted">quantity : <strong><?php echo $values["item_quantity"]; ?></strong><br>Price : <strong class="text-info">$<?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></strong></small>
              </div>
              <span class="text-muted"></span>
            </li>
            <?php
            $total = $total + ($values["item_quantity"] * $values["item_price"]);
              }
          ?>
            <li class="list-group-item d-flex justify-content-between">
              <span class="text-dark">Total</span>
              <strong class="text-success">$<?php echo number_format($total, 2); ?></strong>
            </li>
  
          </ul>

          
        </div>
        <?php
        $loggedin_username = $_SESSION['username'];
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = '$loggedin_username';");
        $stmt->execute();
        $user_data=$stmt->fetch(PDO::FETCH_ASSOC);
        ?>

        <div class="col-md-8 order-md-1 text-white">
          <h4 class="mb-3">Billing address</h4>
          <form action="include/payment.php" method="POST" class="needs-validation" novalidate>
          <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" id="username" value="<?php echo $user_data['username'] ?>" name="add_username" readonly required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" value="<?php echo $user_data['first_name'] ?>" id="firstName" name="add_first_name" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" value="<?php echo $user_data['last_name'] ?>" id="lastName" name="add_last_name" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="date_of_birth">Date of birth</label>
              <input id="date_of_birth" class="form-control" type="date" value="<?php echo $user_data['date_of_birth'] ?>" name="add_date_of_birth" max="2010-01-01" min="1920-01-01" required>
              <div class="invalid-feedback">
              Enter a valid Date of birth.
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" value="<?php echo $user_data['email'] ?>" name="add_email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
            <div class="row">
            <div class="col-md-5 mb-3">
              <label for="phone">Phone no</label>
              <input name="add_phone" name type="number" class="form-control" value="<?php echo $user_data['phone'] ?>" pattern=".{4,15}" id="phone" required>
              <div class="invalid-feedback">
                Please enter your Phone no.
              </div>
            </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <textarea name="add_address" class="form-control" id="address" rows="5" required><?php echo $user_data['address'] ?></textarea>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>



            <div class="row">
              
              <div class="col-md-4 mb-3">
                <label for="pin">PIN</label>
                <input type="number" class="form-control" name="add_pin" value="<?php echo $user_data['pin'] ?>" pattern="{3,10}" id="pin" placeholder="" required>
                <div class="invalid-feedback">
                  PIN code required.
                </div>
              </div>
            </div>

            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
            </div>
            <div class="custom-control p-3">
            <!-- PayPal Logo -->
<img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppppcmcvdam.png" alt="Pay with PayPal, PayPal Credit or any major credit card" />
<!-- PayPal Logo -->
</div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button name="payment" class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>
<!----------------------------------------------USER form END---------------------------------------------------->
<?php
      }
      else
      {
?>
<!---------------------------------------------Guest form begin--------------------------------------------------->
<div class="row col-md-8 text-white">
<p class="ml-auto pt-3 text-center">Already a member? <a href="login.php">Sign in</a></p>
<p class="ml-auto pt-3 text-center">Not a member? <a href="user_registration_.php">Register</a></p>
</div>
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
          </h4>
          <ul class="list-group mb-3">
          <?php
              foreach($cart_data as $keys => $values)
              {
          ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div class="col-12">
                <h6 class="my-0" style="width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $values["item_name"]; ?></h6>
                <small class="text-muted">quantity : <strong><?php echo $values["item_quantity"]; ?></strong><br>Price : <strong class="text-info">$<?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></strong></small>
              </div>
              <span class="text-muted"></span>
            </li>
            <?php
            $total = $total + ($values["item_quantity"] * $values["item_price"]);
              }
          ?>
            <li class="list-group-item d-flex justify-content-between">
              <span class="text-dark">Total</span>
              <strong class="text-success">$<?php echo number_format($total, 2); ?></strong>
            </li>
  
          </ul>

          
        </div>

        <div class="col-md-8 order-md-1 text-white">
          <h4 class="mb-3">Billing address</h4>
          <form action="include/payment.php" method="POST" class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control"  id="firstName" name="add_first_name" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control"  id="lastName" name="add_last_name" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="date_of_birth">Date of birth</label>
              <input id="date_of_birth" class="form-control" type="date"  name="add_date_of_birth" max="2010-01-01" min="1920-01-01" required>
              <div class="invalid-feedback">
              Enter a valid Date of birth.
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="add_email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
            <div class="row">
            <div class="col-md-5 mb-3">
              <label for="phone">Phone no</label>
              <input name="add_phone" name type="number" class="form-control"  pattern=".{4,15}" id="phone" required>
              <div class="invalid-feedback">
                Please enter your Phone no.
              </div>
            </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <textarea name="add_address" class="form-control" id="address" rows="5" required></textarea>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>



            <div class="row">
              
              <div class="col-md-4 mb-3">
                <label for="pin">PIN</label>
                <input type="number" class="form-control" name="add_pin"  pattern="{3,10}" id="pin" placeholder="" required>
                <div class="invalid-feedback">
                  PIN code required.
                </div>
              </div>
            </div>

            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
            </div>
            <div class="custom-control p-3">
            <!-- PayPal Logo -->
<img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppppcmcvdam.png" alt="Pay with PayPal, PayPal Credit or any major credit card" />
<!-- PayPal Logo -->
</div>
             <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button name="payment" class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>
<!----------------------------------------------Guest form END----------------------------------------------------------------->
<?php
      }
?>
<!----------------------------------------------------------------------------------------------------------------------------->
      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">Systro</p>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
