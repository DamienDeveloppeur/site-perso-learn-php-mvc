<?php
require 'model/Manager.php';
class Chat extends Manager 
{
       
    // AJOUTER UN MESSAGE
    function addMessage ($pseudoSession, $message)
    {
        
        $bdd = $this->dbConnect();
        $reponse = $bdd->prepare('INSERT INTO chat (pseudo, message, date_time) VALUES (?,?, NOW())');
        $reponse->execute(array($pseudoSession, $message));
       
    }
    // JOINTURE CHAT
    function jointureChat()
    {
        $bdd =  $this->dbConnect();
        $reponse = $bdd->query('SELECT chat.message, chat.pseudo, chat.date_time,
        membres.pseudo,  membres.avatar
        FROM chat
        LEFT JOIN membres 
        ON chat.pseudo = membres.pseudo
        ORDER BY date_time DESC LIMIT 0, 10
        ');
        return $reponse;
    }
}