<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
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
    <link rel="stylesheet" href="../public/CSS/include.css">
   

    


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
	<div id="connexion">
		<?php

if (isset($_SESSION['id']) && isset($_SESSION["pseudo"]))
    {
     echo 'Vous êtes déjà connecté !';
	} 
else 
    {
			include("C:/wamp64/www/sitePersoMVC/include/header1.php");
			?>
		
			<p>L'inscription s'est bien réali-troll </p>
				<?php include("C:/wamp64/www/sitePersoMVC/include/footer.php"); 
	}
?>
</div>
		</body>
	</html>