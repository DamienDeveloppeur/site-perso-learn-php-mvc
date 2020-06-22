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
      	
        <?php
if (isset($_SESSION['id']) && isset($_SESSION["pseudo"]))
{
     require 'headerC.php';
     echo 'Mais, vous êtes déjà inscrit, comment êtes vous arrivez ici ?';  
     echo 'WTF ?';     
}
else 
{

        require 'header.php';
      ?>
        <section class="grandediv white" style="background-image: url(../public/images/photography-of-night-sky-733475.jpg);" data-stellar-background-ratio="0.5">
      

      <div id="formulaireI" class="marginTop marginBottom" >
      <div class="h1center inscriptionTitle">	
      <h1>Inscription</h1>
        </div>
		<form method="POST" action="http://localhost/sitePersoMVC/index.php">   
            <label>Votre pseudo</label>  
            <input autofocus autocomplete = off type="text" name="pseudo" class="input1">
                        <br>
            <label>Votre mot de passe<br> (entre trois et huit lettres ou chiffres)</label>

            <input autocomplete = off type="password" name="pass" class='input1'>
                      
            <br>    
        <label>Répétez votre mot de passe</label>
                      
                        
            <input autocomplete = off type="password" name="pass1" class="input1">
                       
                               <br>
                  
                        
            <label>Votre email</label>
                       
                       
            <input autocomplete = off type="text" name="email" class="input1">
                         <br>
                        
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
    
  
    
    </section>
      <p>
       
      </p> 
  <?php
}
  ?>

	</body>
</html>