<!DOCTYPE html>
<html>
<head>
	<title></title>
        <link rel="stylesheet" href="../CSS/styles_police.css"> 
      <link rel="stylesheet" href="../public/CSS/include.css">
</head>
	<body>
        <?php include("C:/wamp64/www/sitePersoMVC/include/header1.php"); ?>
        
        <?php 
    session_start();
  	
    // Suppression des variables de session et de la session
    $_SESSION = array();
    session_destroy();

    // Suppression des cookies de connexion automatique
    setcookie('login', '');
    setcookie('pass_hache', '');
            echo '<br><br>';
            echo 'Vous êtes déconnecté';
            echo '<br><br>';
            echo '<a href="./index.php">Retourner à l\'index</a>';


        ?>
       
    </body>
</html>