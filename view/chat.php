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
    <title>Chat en ligne</title>
</head>
<body>
<div id="minichat" class="backgroundCommun">
        <?php
if (isset($_SESSION["id"]) && isset($_SESSION["pseudo"]))
    {
    require "headerC.php";

    ?>
   
        <section class="grandediv white" style="background-image: url(./public/images/photography-of-night-sky-733475.jpg)"data-stellar-background-ratio="0.5">
        <div id="minichat" class="marginTop text-center">

        
    <form method="POST" action="index.php?action=addMessage">  
            <label>Votre message</label>
            <input type="text" name="message"/>
            <input type="submit" value="Envoyer"/> 
    </form>
        <h1>Bienvenue à vous sur le chat de mon site personnel</h1>
        <script> 
  
  function getMessages(){
  // 1. Elle doit créer une requête AJAX pour se connecter au serveur, et notamment au fichier handler.php
  const requeteAjax = new XMLHttpRequest();
  requeteAjax.open("GET", "./model/Chat.php");

  // 2. Quand elle reçoit les données, il faut qu'elle les traite (en exploitant le JSON) et il faut qu'elle affiche ces données au format HTML
  requeteAjax.onload = function(){
    const resultat = requeteAjax.responseText;
    alert(resultat);
    const html = resultat.reverse().map(function(message){
      return `
        <div class="message">
          <span class="date">${message.created_at.substring(11, 16)}</span>
          <span class="author">${message.author}</span> : 
          <span class="content">${message.content}</span>
        </div>
      `
    }).join('');

    const messages = document.querySelector('#messagechat');

    messages.innerHTML = html;
    messages.scrollTop = messages.scrollHeight;
  }

  // 3. On envoie la requête
  requeteAjax.send();
}
     
</script>
        <?php

        while ($donnees = $reponse ->fetch())
        {
            
        ?>
        <div id="messagechat">
     
             <?php
/*
        echo  '<img src="./public/avatar/'. $donnees['avatar'].'"id="logoprofil"/>' 
        . '<p>'. $donnees['pseudo'].' dit: '. $donnees["message"] . '(' . $donnees["date_time"] . ')'. '</p>' ;
*/
            ?>
          
        </div>
    <?php
    
        }     
        
        $reponse->closeCursor(); 
        ?>
            
        <?php
        include("footer.php"); 
        }
        else
        {
        echo 'Veuillez vous connecter en cliquant <a href="connexion.php" >ici
        </a> ou t\'inscrire par <a href="inscription.php" >là
        </a> si ce n\'est pas déjà fait pour accéder au chat';
        ?>
        <?php
            }

    ?>
    </div>
  
</div>

<script src="./public/JS/main.js">  </script>
       
</body>
</html>