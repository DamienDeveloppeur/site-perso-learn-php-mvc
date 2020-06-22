<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./public/CSS/include.css">
    <link rel="stylesheet" media="screen and (max-width: 1350px)" href="../public/CSS/stylesonepage.css" />
    <link rel="stylesheet" media="screen and (max-width: 600px)"  href="../public/CSS/stylesonepage.css" />
    <meta charset="utf-8" />
    <title>Chat en ligne</title>
</head>
<body>
<div id="minichat">
        <?php
if (isset($_SESSION["id"]) && isset($_SESSION["pseudo"]))
    {
    require "./include/header1C.php";

    ?>
    <form method="POST" action="http://localhost/sitePersoMVC/index.php?action=addMessage">  
            <label>Votre message</label>
            <input type="text" name="message"/>
            <input type="submit" value="Envoyer"/> 
    </form>
        <h1>Bienvenue à vous sur le chat de mon site personnel</h1>
        
        <?php

        while ($donnees = $reponse ->fetch())
        {
            
        ?>
        <div id="messagechat">
             <?php
        echo  '<img src="./public/avatar/'. $donnees['avatar'].'"id="logoprofil"/>' 
        . '<p>'. $donnees['pseudo'].' dit: '. $donnees["message"] . '(' . $donnees["date_time"] . ')'. '</p>' ;
            ?>
          
        </div>
    <?php
   
    }     
      
    $reponse->closeCursor(); 
    ?>
        
    <?php
    include("./include/footer.php"); 
    }
    else
    {
    echo 'Veuillez vous connecter en cliquant <a href="http://localhost/sitePersoMVC/view/connexion.php" >ici
    </a> ou t\'inscrire par <a href="http://localhost/sitePersoMVC/view/inscription.php" >là
    </a> si ce n\'est pas déjà fait pour accéder au chat';
    ?>
    <?php
        }

    ?>
</div>
</body>
</html>