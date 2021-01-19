<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
     

            <div class="sidebar-header">
                <h3>Systro</h3>
            </div>

            <ul class="list-unstyled components">
                <a href="administrator_index.php" ><p class="heading font-weight-bold" >Administrator functions</p></a>
                <!--dropdown menu start-->
                <li>
                    <a href="#productSubmenu" data-toggle="collapse" aria-expanded="false">Products</a>
                    <ul class="collapse list-unstyled" id="productSubmenu">
                        <li>
                            <a href="../administrator/add_product.php">Add new product</a>
                        </li>
                        <li>
                            <a href="../administrator/administrator_view_product.php">View products</a>
                        </li>
                    </ul>
                </li>
                <!--dropdown menu stop-->
                <!--dropdown menu start-->
                <li>
                    <a href="#categorySubmenu" data-toggle="collapse" aria-expanded="false">Categories</a>
                    <ul class="collapse list-unstyled" id="categorySubmenu">
                        <li>
                            <a href="../administrator/add_category.php">Add category</a>
                        </li>
                        <li>
                            <a href="../administrator/view_category.php">View category</a>
                        </li>
                    </ul>
                </li>
                <li>
                <!--dropdown menu start-->
                <li>
                    <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false">Users</a>
                    <ul class="collapse list-unstyled" id="userSubmenu">
                        <li>
                            <a href="../administrator/view_user.php">View users detail</a>
                        </li>
                        <li>
                            <a href="../administrator/view_user_review.php">View users review</a>
                        </li>
                        <li>
                            <a href="../administrator/sale.php">View all sales</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="list-unstyled CTAs">
                <li>
                    <a href="../../logout.php" class="logout">LOGOUT</a>
                </li>
            </ul>


        </nav>
        <!--Navbar for top-->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                    <i class="fas fa-bars"></i>
                    </button>
                            <h3 class="ml-auto text-center">ADMINISTRATOR PAGE</h3>
                        
                    <div class="ml-auto ">
                                <a href="../logout.php">LOGOUT</a>
                    </div>
                </div>
            </nav>
            
