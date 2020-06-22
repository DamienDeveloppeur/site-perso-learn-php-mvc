<?php
include('./model/model.php');
// GETTEUR VIEW //
//~~~~~~~~~~~~~~~~~~~~//

// AFFICHER ONEPAGE
function getOnePage ()
{
    require('view/onePage.php');
}
// AFFICHE LE FORMULAIRE D'INSCRIPTION
function getIndexEspaceMembre()
{
    require('view/inscription.php');
}
// INSCRIPTION / CONNEXION / DECONNEXION
//~~~~~~~~~~~~~~~~~~~~//
// REGISTER
function register ($pseudoRegister, $passRegister, $emailRegister, $IDgroupeRegister)
{
   $register = entryDonneesRegister($pseudoRegister, $passRegister, $emailRegister, $IDgroupeRegister);
   include("view/connexion.php");
}

//CONNEXION
function connexion ($passConnexion, $pseudoConnexion)
{
    $isPasswordCorrect = verifyPass($pseudoConnexion, $passConnexion);
       
        include("view/onePage.php");
}

//DECONNEXION
function deconnexion ()
{
    sessionDestroy ();
}
// PAGE DE PROFIL
//~~~~~~~~~~~~~~~~~~~~//

//LIRE DONNEES MEMBRE
function showDonneesMembre($sessionPseudo)
{
    $reponse = lireDonneesMembre ($sessionPseudo);
    require "view/profil.php";
}

// CHANGER AVATAR
function changeAvatar ($adress1, $sessionID)
{
    envoiFichier ($sessionID);
    updateAvatar ($adress1, $sessionID);
}

// CHAT //
//~~~~~~~~~~~~~~~~~~~~//
//ENTRER ET AFFICHER LE MESSAGE
function messageChat($pseudoSession, $messageChat)
{
    $reponse = addMessage ($pseudoSession, $messageChat);
    require "view/chat.php";
    
}
function showMessageChat()
{
    $reponse = jointureChat();
    require "view/chat.php";
}