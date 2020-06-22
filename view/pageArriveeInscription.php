<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<link rel="stylesheet" href="../CSS/styles_police.css"> 
      <link rel="stylesheet" href="../CSS/include.css">
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