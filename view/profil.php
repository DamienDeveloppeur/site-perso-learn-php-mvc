<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./public/CSS/include.css">
    <link rel="stylesheet" media="screen and (max-width: 1350px)"
     href="ordiPortable.css" />
    <link rel="stylesheet" media="screen and (max-width: 600px)" 
    href="../CSS/stylesonepage.css" />
    <meta charset="utf-8" />
    <title>Site personnel</title>
</head>
<body>

<?php
        if (isset($_SESSION["id"]) && isset($_SESSION["pseudo"]))
    {
    require "C:/wamp64/www/sitePersoMVC/include/header1C.php";
    ?>
    <h1>Bienvenue sur votre espace personnel gros troll </h1> 
<p> Alors on est venu ici pour troller OKLM ? </p>
<?php
    // AFFICHER LES DONNEES
    while ($donnees = $reponse->fetch())
    {  
        echo'Pseudo :' .$donnees["pseudo"] . '<br>';
    echo 'Adresse mail :' . $donnees["email"].'<br>';
        echo 'Inscrit le :'. $donnees["date_inscription"];
        echo'<br><br><br>';
        echo 'Avatar :'.'<img src="./public/avatar/'. $donnees['avatar'].'"id="logoprofil"/>';
      }
        ?>
      <h2>Modifier votre avatar !</h2>
        <p> Et ouais maggle t'as vue tout ce que 
        je peux faire en codant ! </p>

        	<form method ="POST" enctype="multipart/form-data">
		<input type="file" name="image"/>
		<input type ="submit" value ="Valider"/>
	</form>
    <?php



 require "C:/wamp64/www/sitePersoMVC/include/footer.php"; ?>

<?php
}
?>
</div>
</body>
</html>