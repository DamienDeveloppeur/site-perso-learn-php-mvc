<?php

require 'model/Manager.php';
class MessageManager extends Manager
{
    public function showMessageLivredor()
    {
        $bdd =  $this->dbConnect();
        $reponse = $bdd->query("SELECT * FROM livredor");  
        return $reponse;
    }
    
    public function addMessageLivredor($pseudolivredor, $messagelivredor)
    {
        $bdd = $this->dbConnect();
        $reponse = $bdd->prepare('INSERT INTO livredor (pseudo, post) VALUES (?,?)');
        $reponse->execute(array($pseudolivredor, $messagelivredor));
    }
}