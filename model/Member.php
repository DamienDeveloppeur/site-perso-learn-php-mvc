<?php

require 'model/Manager.php';
class Member extends Manager 
{

    // VERIFIER LE PSEUDO
   public function pseudoVerify ($pseudoRegister)
    {
        $listpseudo = array();
        $bdd =  $this->dbConnect();
        $reponse = $bdd->query("SELECT pseudo FROM membres ");
            while ($donnees = $reponse->fetch())
            {
            $listpseudo[] = $donnees["pseudo"];
            }
            return $listpseudo;
    }
    // VERIFIER LEMAIL
    public function emailVerify($emailRegister)
    {
        
        $bdd = $this->dbConnect();
        $listmail = array();
        $req = $bdd->query ("SELECT email FROM membres");
        while ($donnees = $req->fetch())
        {
            $listmail[] = $donnees["email"];
        }
        return $listmail;
    }
    //PASS_HACHE
   public function passHache ($passRegister)
    {
        $pass_hache = password_hash($passRegister, PASSWORD_DEFAULT);  
    }
    // INSCRIPTION
    public function entryDonneesRegister ($pseudoRegister, $passRegister, $emailRegister, $IDgroupeRegister)
    {
        $control = 0;
        $pseudo = $_POST["pseudo"];
        $pass = $_POST["pass"];
        $email = $_POST["email"];

    
        $bdd = $this->dbConnect();
        $listpseudo = $this-> pseudoVerify ($pseudoRegister);
        $listmail   = $this-> emailVerify($emailRegister);

            if (preg_match('#^[a-z0-9._-]{1,30}@[a-z0-9._-]{1,20}\.[a-z]{2,4}$#', $email))             
            {
            if ($_POST["pass"] == $_POST["pass1"])
            {
                if (preg_match('#^[a-z0-9]{3,8}$#', $pass))
                {
                    // VERIFIER QUE L'EMAIL N'A PAS ETAIT UTILISE
                    if ($solution1 = array_search($email, $listmail))
                    {
                            echo 'Adresse email déjà utilisée';
                    }
                    else
                        {
                            if ($solution = array_search($pseudo, $listpseudo))
                            {
                            echo 'pseudo déjà utilisé recommence sale troll ! <br>';
                            }
                                else
                                {
        
                                    $bdd = $this-> dbConnect();
                                $pass_hache = password_hash($_POST["pass"], PASSWORD_DEFAULT);  
                                    $passRegister = $pass_hache;
                                // INSERTION DANS LA BASE DE DONNES
                                $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email,  ID_groupe, date_inscription )
                                VALUES (?,?,?,?, NOW())');

                                $req->execute(array($pseudoRegister, $passRegister, $emailRegister, $IDgroupeRegister));
                                            echo'çamarchelol';
                                            
                                            $control = 1;
                                                $req->closeCursor(); 
            }
        }   
        }
        else
            {
                echo 'Veuillez entrer entre trois et huit caractéres, uniquement des chiffres ou des lettres !';
            }    
        }
        else {
                echo 'Les mots de passe correspondent pas !';
                echo '<a href="./index.php"> Réessayez en cliquant ici </a>';
            }
            }
                else
                {
                    echo 't\'es trop debile pour rentrer une adresse mail au bon format ? <br> Degage de mon site !';
                }
    }

    //verifierMotDePass
   public function verifyPass ($passConnexion, $pseudoConnexion)
    {
        $dbb = $this->dbConnect();
        $req = $dbb->prepare('SELECT ID, pass FROM membres
        WHERE pseudo = ?');
                
        $req->execute(array($pseudoConnexion));
        $resultat = $req->fetch();

        $isPasswordCorrect = password_verify
        ($passConnexion, $resultat['pass']);   
        
        if (!$isPasswordCorrect)
        {
        echo 'Mauvais identifiant ou mot de passe !';
        }   
        else
        {
            if ($isPasswordCorrect)
            {
                
                $_SESSION['id'] = $resultat['ID'];
                $_SESSION['pseudo'] = $pseudoConnexion;
                
                
            }
            else
            {
                echo 'Mauvais identifiant ou mot de passe !';
            }
        }
    }
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
                            }
                            else
                            {
                                echo 'MDR DE TURBO LOL L\'EXTENSION N\'EST PAS BONNE';
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



}