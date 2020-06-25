<?php 
require '../model/Manager.php';

class Register extends Manager 
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
                            echo 'pseudo déjà utilisé  ! <br>';
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
                    echo 'Le format de l\'adresse mail n\'est pas bon';
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

}