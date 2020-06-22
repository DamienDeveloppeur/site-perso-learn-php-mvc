<?php
if(!isset($_SESSION)){
  session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Index de l'espace membre</title>
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
      	<div id="indexEM">
        <?php
if (isset($_SESSION['id']) && isset($_SESSION["pseudo"]))
{
     require '../include/headerC.php';
     echo 'Mais, vous êtes déjà inscrit, comment êtes vous arrivez ici ?';  
     echo 'WTF ?';     
}
else 
{
        require '../include/header.php';
      ?>
        <div class="h1center">	
      <h1>Inscription</h1>
        </div>
	<p></p>
      
      <div id="formulaireI">
		<form method="POST" action="http://localhost/sitePersoMVC/index.php">
                        <div class="label">
            <label>Votre pseudo</label>
                        </div>
                        <div class="input">
            <input autofocus autocomplete = off type="text" name="pseudo" class="input1">
                        </div>
                  
                        <br>
                        <div class="label">
            <label>Votre mot de passe<br> (entre trois et huit lettres ou chiffres)</label>
                        </div>
                        <div class="input">
            <input autocomplete = off type="password" name="pass" class='input1'>
                        </div> 
            <br>
                 
                        <div class="label">
        <label>Répétez votre mot de passe</label>
                        </div>
                        <div class="input">
            <input autocomplete = off type="password" name="pass1" class="input1">
                        </div>
                               <br>
                  
                        <div class="label">
            <label>Votre email</label>
                        </div>
                        <div class="input">
            <input autocomplete = off type="text" name="email" class="input1">
                         <br>
                         </div>
                        <br>
                       <label>Votre statut : </label>
            <select name="groupe">
      <option value="1">Visiteur</option>
      <option value="2">Collégue</option>
      <option value="3">Formateur</option>
      <option value="3">Maitre de stage</option>
            </select>
            <br>
            <br>
            <input type="submit" value="Valider" class="buttonvalider"/>
		</form>
      </div> 
      
      <p>
       
      </p> 
  <?php
}
  ?>
  </div>
	</body>
</html>