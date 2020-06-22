<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<link rel="stylesheet" href="./public/CSS/include.css">
  <link rel="stylesheet" href="./public/CSS/bootstrap-grid.css">
    <link rel="stylesheet" href="./public/CSS/bootstrap-grid.min.css">
    <link rel="stylesheet" href="./public/CSS/bootstrap-reboot.css">
    <link rel="stylesheet" href="./public/CSS/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="./public/CSS/bootstrap.css">
    <link rel="stylesheet" href="./public/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="./public/CSS/style.css">
    <link rel="stylesheet" href="./public/CSS/flexslider.css">
    <link rel="stylesheet" href="./public/CSS/animate.css">
    <link rel="stylesheet" href="./public/CSS/magnific-popup.css">
    
   

    


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
			include("header.php");
			?>
		<section class="grandediv whitee" style="background-image: url(./public/images/photography-of-night-sky-733475.jpg)"data-stellar-background-ratio="0.5">
			
			<div id="connexionF" class="marginTop" >
			<h1>Connexion</h1>
				<p>Veuiller entrer votre pseudo et votre mot de passe pour vous connecter</p>
				  <form method="POST" action="index.php">
				
				<label>Votre pseudo</label><input type="text" name="pseudo">
					  <br>
				<label>Votre mot de passe</label><input type="password" name="pass">
					  <br>
				<input type="submit" value="connexion"/>
				  </form>
				</div>
				<?php include("footer.php"); 
			}
	?>
	</div>
		</body>
	</html>