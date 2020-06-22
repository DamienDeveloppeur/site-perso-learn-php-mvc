<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="./public/css/bootstrap-grid.css">
    <link rel="stylesheet" href="./public/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="./public/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="./public/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="./public/css/bootstrap.css">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/flexslider.css">
    <link rel="stylesheet" href="./public/css/animate.css">
    <link rel="stylesheet" href="./public/css/magnific-popup.css">
    
   


    <!-- 
    <link rel="stylesheet" media="screen and (max-width: 1350px)" href="./public/CSS/stylesonepage.css" />
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="./public/CSS/stylesonepage.css" />
    <link rel="stylesheet" media="screen and (max-width: 1900px)" href="./public/CSS/stylesonepage.css" />
-->
    <meta charset="utf-8" />
    <title>Site personnel</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <script src="./public/css/vendor/jquery.min.js"></script>
  
    <script src="./public/css/vendor/popper.min.js"></script>
    <script src="./public/css/vendor/bootstrap.min.js"></script>
    
    <script src="./public/css/vendor/jquery.easing.1.3.js"></script>
    <script src="./public/css/vendor/jquery.stellar.min.js"></script>
    <script src="./public/css/vendor/jquery.waypoints.min.js"></script>
    <script src="./public/css/vendor/custom.js"></script>


    </head>
    <body>
    <div id="onepage">
        <?php
if (isset($_SESSION["id"]) && isset($_SESSION["pseudo"]))
    {
    require "./include/headerC.php";
    require "./include/accueil.php";
   
     require "./include/footer.php"; ?>
    
   
    
    </div>
    </body>
    </html>
   <?php 
    }
else {
        ?>
    <!--HEADER FLOTTANT-->
   <?php include("./include/header.php"); 


    include("./include/accueil.php"); ?>

<!-- FOOTER -->

<?php require "./include/footer.php"; 


}
?>
</div>
</body>
</html>
