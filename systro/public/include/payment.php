<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/include/connection.php"; 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(isset($_POST['payment']))//all the data are directly taken from session and cookies so users can't change it.
{
    
    
    if (isset($_SESSION['userloggedin']) == true)//only if logged in.
    { 
        $username = $_SESSION['username'];
    }
    else
    {
        $username="GUEST";
    }
    $date= date("Y-m-d");



    if(isset($_COOKIE["shopping_cart"]))
    {
    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
    $cart_data = json_decode($cookie_data, true);
    foreach($cart_data as $keys => $values)//each loop the varray is converted into a value then inserted so all product can be inseted from the kart individually.
    {

        $item_id=$values['item_id'];
        $item_name=$values['item_name'];
        $item_quantity=$values['item_quantity'];
        $item_price=$values['item_price'];
        $insert_user = "insert into sale (username, product_id, product_name, quantity, price, date)
        values ('$username', '$item_id', '$item_name', '$item_quantity', '$item_price', '$date');";
        $new_user = $conn->prepare($insert_user);
        $new_user->execute();

    }

    } 
    header('Location: payment_result.php?pay=success');
}    
else
{
    header('Location: ../index.php');
}
?>




