<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./public/CSS/include.css">
    <link rel="stylesheet" href="./public/CSS/bootstrap.css">
    
    <link rel="stylesheet" href="../public/CSS/include.css">
    <link rel="stylesheet" href="./public/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="./public/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="./public/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="./public/css/bootstrap.css">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/flexslider.css">
    <link rel="stylesheet" href="./public/css/animate.css">
    <link rel="stylesheet" href="./public/css/magnific-popup.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    
    <meta charset="utf-8" />
    <title> </title>
</head>
<body>
<div id="">
        <?php
if (isset($_SESSION["id"]) && isset($_SESSION["pseudo"]))
    {
    require "C:/wamp64/www/sitePersoMVC/include/header.php";
    

    
 require "C:/wamp64/www/sitePersoMVC/include/footer.php";


}
else
{

}
?>
</div>
</body>
</html>