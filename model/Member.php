<?php

require '../model/Manager.php';
class Member extends Manager 
{


    //DECONNEXION
  public  function sessionDestroy ()
    {
        if (isset($_SESSION["id"]) && isset($_SESSION["pseudo"]) )
        {
        session_start();
        
        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

        // Suppression des cookies de connexion automatique
        setcookie('login', '');
        setcookie('pass_hache', '');
                echo '<br><br>';
                echo 'Vous êtes déconnecté';
                echo '<br><br>';
                echo '<a href="./index.php">Retourner à l\'index</a>';
        }
    }
    // LIRE DONNEES MEMBRE
   public function lireDonneesMembre ($sessionPseudo)
    {
        $bdd = $this->dbConnect();
        $reponse = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
        $reponse->execute(array($sessionPseudo));
        return $reponse;
    }
    // ENVOYER UN AVATAR OU UN FICHIER
   public function envoiFichier ($sessionID) // $_SESSION["id"]
    {
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0)
                {
                    echo 'Envoi bien réussi ! <br>';
                    $error = 1;
                    if ($_FILES['image']['size'] <= 3000000)
                    {           
                        $informationsImage = pathinfo($_FILES['image']['name']);
        
                        $extensionImage = $informationsImage['extension'];
        
                        $extensionsArray = array('png', 'gif', 'jpg', 'jpeg');
        
                            if(in_array($extensionImage, $extensionsArray))
                            {
                                $adress = './public/avatar/' . $sessionID .'.'.$extensionImage;
                                $adress1 = $_SESSION["id"].'.'.$extensionImage;
                                move_uploaded_file($_FILES['image']['tmp_name'],
                                $adress);
                                    echo 'Envoi bien réussi ! <br>';
                                $error = 0;   
                                var_dump($extensionImage);
                                var_dump($adress1);   
                                return $adress1;   
                            }
                            else
                            {
                                echo ' L\'EXTENSION N\'EST PAS BONNE';
                            }
                    }
                    else 
                    {
                        echo 'La taille est trop grande';
                    }
                }
        
    }
    // UPDATE UN AVATAR
   public function updateAvatar ($adress1, $sessionID) // $adress1 = $_SESSION["id"].'.'.$extensionImage;
    {
        
            $bdd = $this->dbConnect();
            $req = $bdd->prepare('UPDATE membres SET avatar = ?
            WHERE id = ?');
            $req->execute(array($adress1, $sessionID));
    
            $req->closeCursor(); 
    
    }

    public function updatePass($pseudoConnexion, $expass, $newpass)
    {
      
        $bdd = $this->dbConnect();

        $req = $bdd->prepare('SELECT ID, pass FROM membres
        WHERE pseudo = ?');

        $req->execute(array($pseudoConnexion));
        $resultat = $req->fetch();

        $isPasswordCorrect = password_verify
        ($expass, $resultat['pass']);   
       

        $pass_hache = password_hash($_POST["newpass"], PASSWORD_DEFAULT);
        
        $newpass = $pass_hache;
      
        if ($isPasswordCorrect)
        {
           
            $req = $bdd->prepare('UPDATE membres SET pass = ? WHERE pseudo = ?');
            $req->execute(array($newpass, $pseudoConnexion));

            $req->closeCursor();
            ?>
            <script>
                alert("Votre mot de passe à était modifié avec succés");
                </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Erreur dans le changement de mot de passe");
                </script>
            <?php
        }
       
     
    }


}