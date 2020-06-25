<?php

include ("../controller/controller.php");
// SI LA SESSION N'EXISTE PAS => ON LA CREE
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// NAVIGATION
if (isset($_GET["navigation"]))
{
    if ($_GET["navigation"] == "inscription")
    {
    require "../view/inscription.php";
    }

    if ($_GET["navigation"] == "connexion")
    {
    require "../view/connexion.php";
    }
    if ($_GET["navigation"] == "apropos")
    {
    require "../view/onePage.php";
    }
    if ($_GET["navigation"] == "chat")
    {
          $reponse = showMessageChat();
    }
    if ($_GET["navigation"] == "profil")
    {
        showDonneesMembre($_SESSION["pseudo"]);
    }
    if ($_GET["navigation"] == "modifPass")
    {

       require "../view/modifPass.php";
    }
}
// EXECUTION PAR DEFAUT
else if (!isset($_GET["navigation"]) && (!isset($_GET["action"])))
{

    getOnePage ();
}


// CONNEXION


// DONNEES TRANSMISES PAR URL
//~~~~~~~~~~~~~~~~~~~~//
    if (isset($_GET["action"]))
    {
        // INSCRIPTION
        if ($_GET["action"] == "inscription")
        {
            if (isset($_POST["pseudo"]) && isset($_POST["pass"])
            && isset($_POST["pass1"])&& isset($_POST["email"]) && isset($_POST["groupe"]))
            {
            register($_POST["pseudo"], $_POST["pass"], $_POST["email"], $_POST["groupe"]);  
            
            }
      
        }
    if ($_GET["action"] == "connexion")
    {
        if (isset($_POST["pseudo"]) && isset($_POST["pass"]))
        {
        
            connexion ($_POST["pseudo"], $_POST["pass"]);
        
        }
    }
    // PROFIL / CHANGER AVATAR
    if ($_GET["action"] == "profil")
    {
     
        showDonneesMembre($_SESSION["pseudo"]);
        changeAvatar ($_SESSION["id"].'.'. $extensionImage, $_SESSION["id"]);
        
    }   
    // CHAT
    if ($_GET["action"] == 'chat')
    {   
        $reponse = showMessageChat();

    }
    if ($_GET["action"] == 'addMessage')
    {
        if (isset($_POST["message"]) && isset($_SESSION["pseudo"]))
            {
                messageChat($_SESSION["pseudo"], $_POST["message"]);
                $reponse = showMessageChat();
               
            }  
        }
    if ($_GET["action"] == 'deco')
    {
      
        deconnexion();
    }
    if ($_GET["action"] == 'newpass')
    {
        if (isset($_POST["expass"]) && isset($_POST["newpass"]))
            {
              modifPass($_SESSION["pseudo"], $_POST["expass"], $_POST["newpass"]);
               
            }  
    }
}   




   
    

  