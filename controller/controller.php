<?php

function chargerClasse($classe)
{
  require './model/'. $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
}
spl_autoload_register('chargerClasse'); 

// GETTEUR VIEW //
//~~~~~~~~~~~~~~~~~~~~//

// AFFICHER ONEPAGE
function getOnePage ()
{
    require_once('view/onePage.php');
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
    $register = new Register();
  $registers = $register->entryDonneesRegister($pseudoRegister, $passRegister, $emailRegister, $IDgroupeRegister);
   include("view/connexion.php");
}

//CONNEXION
function connexion ($passConnexion, $pseudoConnexion)
{
    $connexion = new Register();
    $connex = $connexion->verifyPass($pseudoConnexion, $passConnexion);
       
        require "view/onePage.php";
   
}

//DECONNEXION
function deconnexion()
{
    session_destroy();
    $deconnexion = new Member();
    //sessionDestroy();
    require'view/onePage.php';
}





// PAGE DE PROFIL
//~~~~~~~~~~~~~~~~~~~~//

//LIRE DONNEES MEMBRE
function showDonneesMembre($sessionPseudo)
{
    $showDonneesMembre = new Member();
    $reponse = $showDonneesMembre->lireDonneesMembre ($sessionPseudo);
    require_once "view/profil.php";
}

// CHANGER AVATAR
function changeAvatar ($adress1, $sessionID)
{
    $changeAvatar = new Member();
   $adress1 =  $changeAvatar->envoiFichier ($sessionID);
   $adress1 =  $changeAvatar->updateAvatar ($adress1, $sessionID);
}
// change pass
function modifPass( $pseudoConnexion, $expass, $newpass)
{
   
    $changePass = new Member();
    $passChange = $changePass->updatePass( $pseudoConnexion, $expass, $newpass);
    
    showDonneesMembre($_SESSION["pseudo"]);
    
}





// CHAT //
//~~~~~~~~~~~~~~~~~~~~//
//ENTRER ET AFFICHER LE MESSAGE
function messageChat($pseudoSession, $message)
{
    $messageChat = new Chat();
   $addmessage = $messageChat->addMessage($pseudoSession, $message);
    
    
}
function showMessageChat()
{
    $showMessageChat = new Chat();
    $reponse =  $showMessageChat->jointureChat();
    require "view/chat.php";
}

// LIVRE D'OR //
//~~~~~~~~~~~~~~~~~~~~//
function messageLivredor()
{
    $messageLivredor = new MessageManager();
    $reponse = $messageLivredor->showMessageLivredor();
    
    require 'view/livredor.php';
}
function addMessageLivredor($pseudolivredor, $messagelivredor)
{
    $addMessageLivredor = new MessageManager();
    $addMessageLivredor->addMessageLivredor($pseudolivredor, $messagelivredor);
    
}