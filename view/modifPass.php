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
    <title>Modif du pass</title>
</head>
<body>

<?php
        if (isset($_SESSION["id"]) && isset($_SESSION["pseudo"]))
    {
    require "headerC.php";
    ?>
    <section class="grandediv white backgroundCommun" style="background-image: url(./public/images/photography-of-night-sky-733475.jpg)" data-stellar-background-ratio="0.5">
      <div id="profil" class=" marginTop text-center">

    <h1>Bienvenue sur la page pour modifier votre mot de passe</h1> 
  
    <form method="POST" action="index.php?action=newpass">
				
        <label>Votre ancien mot de passe</label><br>	
        <input name="expass" type="text"> <br>		
        <label>Votre mot de passe</label>
        <input type="password" name="newpass"> <br>
					
				<input type="submit" value="connexion"/>
				  </form>
  <?php
 

 require "footer.php"; ?>

<?php
}
?>
</div>
</div>
</body>
</html>