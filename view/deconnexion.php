<!DOCTYPE html>
<html>
<head>
	<title>Deconnexion</title>
    <link rel="stylesheet" href="../public/CSS/include.css">
  <link rel="stylesheet" href="../public/CSS/bootstrap-grid.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap-reboot.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../public/CSS/style.css">
    <link rel="stylesheet" href="../public/CSS/flexslider.css">
    <link rel="stylesheet" href="../public/CSS/animate.css">
    <link rel="stylesheet" href="../public/CSS/magnific-popup.css">
    
   

    


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <script src="../public/css/vendor/jquery.min.js"></script>
  
    <script src="../public/css/vendor/popper.min.js"></script>
    <script src="../public/css/vendor/bootstrap.min.js"></script>
    
    <script src="../public/css/vendor/jquery.easing.1.3.js"></script>
    <script src="../public/css/vendor/jquery.stellar.min.js"></script>
    <script src="../public/css/vendor/jquery.waypoints.min.js"></script>
    <script src="../public/css/vendor/custom.js"></script>
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