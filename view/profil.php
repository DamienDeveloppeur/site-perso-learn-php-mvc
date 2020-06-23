<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
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
    <meta charset="utf-8" />
    <title>Site personnel</title>
</head>
<body>

<?php
        if (isset($_SESSION["id"]) && isset($_SESSION["pseudo"]))
    {
    require "headerC.php";
    ?>
    <section class="grandediv white" style="background-image: url(./public/images/photography-of-night-sky-733475.jpg)"data-stellar-background-ratio="0.5">
      <div id="profil" class=" marginTop text-center">

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

      <form method ="POST" enctype="multipart/form-data" action="index.php?action=profil">
        <input type="file" name="image"/>
        <input type ="submit" value ="Valider"/>
      </form>

      <h2>Modifier votre mot de pass !</h2>
      <a href="index.php?navigation=modifPass"> Cliquez ici pour modifier le mot de passe !</a>
    <?php



 require "footer.php"; ?>

<?php
}
?>
</div>
</div>
</body>
</html>