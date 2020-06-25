<?php
ob_start();
?>
Profil
<?php
$title = ob_get_clean();

ob_start();
require "INCLUDE_headerC.php";
$header = ob_get_clean();

ob_start();

?>
<h1>Bienvenue sur votre espace personnel </h1> 
<p> </p>
<?php
// AFFICHER LES DONNEES
while ($donnees = $reponse->fetch())
{  
    echo'Pseudo :' .$donnees["pseudo"] . '<br>';
echo 'Adresse mail :' . $donnees["email"].'<br>';
    echo 'Inscrit le :'. $donnees["date_inscription"];
   
    echo'<br><br><br>';
    echo 'Avatar :'.'<img src="../public/avatar/'. $donnees['avatar'].'"id="logoprofil"/>';
  }
    ?>
  <h2>Modifiez votre avatar !</h2>
    <p> Et ouais t'as vue tout ce que 
    je peux faire en codant ! </p>

  <form method ="POST" enctype="multipart/form-data" action="index.php?action=profil">
    <input type="file" name="image"/>
    <input type ="submit" value ="Valider"/>
  </form>

  <h2>Modifier votre mot de pass !</h2>
  <a href="index.php?navigation=modifPass"> Cliquez ici pour modifier le mot de passe !</a>
<?php



$content = ob_get_clean();
 
  
   


ob_start();
 require "INCLUDE_footer.php"; 
$footer = ob_get_clean();

require 'template.html';