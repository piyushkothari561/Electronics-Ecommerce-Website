<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if (isset($_SESSION['userloggedin']) == true) {
?>
<!------------------------------------------------------------------------------------------------------------------------------>
  <!-- Site footer -->
  <footer class="site-footer bg-dark">
      <div class="container ">
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center padding">
            <h6>Social media</h6>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 social text-center padding">
           <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
           <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
           <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
           <a href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a>
           <hr>
        </div>
          <div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
            <h6>About</h6>
            <p class="text-justify">We can help you get all the Electronic supply you need to enjoy a connected life </p>
          </div>

         

          <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
            <h6>Contact Us</h6>
            <ul class="footer-links">
            <li ><b>Email :</b><a href="mailto:support@systro.com"> support@systro.com</a></li>
        <li><b>Phone No :</b> +65 8765 4321</li>
        <li><b>Address :</b> 5A Straits View, Marina One, Singapore 018935</li>
        
            </ul>
        
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
          <?php
            

            echo "<p class=" . "copyright-text" . ">Copyright &copy; " . date("Y") . " Systro</p>";
        ?>
    </div>
          </div>
         
  
        </div>
      </div>
</footer>




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
<!------------------------------------------------------------------------------------------------------------------------------>
<?php
}
else
 {
   header("location:../login.php");
 }
 ?>