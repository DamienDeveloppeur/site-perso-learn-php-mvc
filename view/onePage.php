<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./public/CSS/stylesonepage.css">
    <link rel="stylesheet" href="./public/CSS/styles_police.css">
    <link rel="stylesheet" media="screen and (max-width: 1350px)" href="./public/CSS/stylesonepage.css" />
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="./public/CSS/stylesonepage.css" />
    <link rel="stylesheet" media="screen and (max-width: 1900px)" href="./public/CSS/stylesonepage.css" />
    <meta charset="utf-8" />
    <title>Site personnel</title>
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
