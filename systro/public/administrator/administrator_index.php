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
 <div class="container">
<p>
This is the administrator area. This is where the administrator is capable of doing all the activities regairding the maintenance of the site.
</p>
<p>
All the fuctions can be accessed by the administrator from the side bar on the left. Administrator functions are explained below.
</p>
<h1 class="display-4">Administrator functions.</h1>
<ul>
<li>
<h3>Products</h3>
            <ul>
                <li>
                    Administrator is capable of adding new products to the website where the product can be given a name, brand, price, category,
                    description etc. The product details can also be updated and deleted.
                </li>
            </ul>
</li>
<li>
<h3>Categories</h3>
            <ul>
                <li>
                    Categories can be viewed and be modified and can be deleted. If a category is deleted all the products in that category will be transferred tp Others (Which cannot be deleted.).
                </li>
            </ul>
</li>

<li>
<h3>Users</h3>
            <ul>
                <li>
                        Administrator is capable of viewing all the users registered to the site and all the reviews of the users.
                </li>
                <li>
                        Will be able to see all the customers sales data.
                </li>
            </ul>
</li>
</ul>
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

 