<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Site personnel</title>
<meta charset="utf-8" />

    <link rel="stylesheet" href="../public/css/bootstrap.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/flexslider.css">
    <link rel="stylesheet" href="../public/css/animate.css">
    <link rel="stylesheet" href="../public/css/magnific-popup.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>




    </head>
    <body>
    <div id="onepage">
        <?php
if (isset($_SESSION["id"]) && isset($_SESSION["pseudo"]))
    {
    require "INCLUDE_headerC.php";
    require "accueil.php";
   
     require "INCLUDE_footer.php"; ?>
    
   
    
    </div>
    </body>
    </html>
   <?php 
    }
else {
       
   
   include("INCLUDE_header.php"); 


    include("accueil.php");



 require "INCLUDE_footer.php"; 


}
?>
</div>
<script src="../public/css/vendor/jquery.min.js"></script>
  
  <script src="../public/css/vendor/popper.min.js"></script>
  <script src="../public/css/vendor/bootstrap.min.js"></script>
  
  <script src="../public/css/vendor/jquery.easing.1.3.js"></script>
  <script src="../public/css/vendor/jquery.stellar.min.js"></script>
  <script src="../public/css/vendor/jquery.waypoints.min.js"></script>
  <script src="../public/css/vendor/custom.js"></script>
</body>
</html>
