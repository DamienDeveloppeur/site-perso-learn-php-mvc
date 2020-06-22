<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../public/CSS/include.css">
    <link rel="stylesheet" media="screen and (max-width: 1350px)" href="../public/CSS/stylesonepage.css" />
    <link rel="stylesheet" media="screen and (max-width: 600px)"  href="../public/CSS/stylesonepage.css" />
    <meta charset="utf-8" />
    <title> </title>
</head>
<body>
<div id="">
        <?php
if (isset($_SESSION["id"]) && isset($_SESSION["pseudo"]))
    {
    require "C:/wamp64/www/sitePersoMVC/include/header1C.php";
    

    
 require "C:/wamp64/www/sitePersoMVC/include/footer.php";


}
else
{

}
?>
</div>
</body>
</html>