<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
    <link rel="stylesheet" href="./public/CSS/styles_police.css"> 
      <link rel="stylesheet" href="../public/CSS/include.css">
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
			include("./include/header1.php");
			?>
		
			<h1>Connexion</h1>
			<div id="connexionF">
				<p>Veuiller entrer votre pseudo et votre mot de passe pour vous connecter</p>
				  <form method="POST" action="http://localhost/sitePersoMVC/index.php">
				
				<label>Votre pseudo</label><input type="text" name="pseudo">
					  <br>
				<label>Votre mot de passe</label><input type="password" name="pass">
					  <br>
				<input type="submit" value="connexion"/>
				  </form>
				</div>
				<?php include("C:/wamp64/www/sitePersoMVC/include/footer.php"); 
			}
	?>
	</div>
		</body>
	</html>