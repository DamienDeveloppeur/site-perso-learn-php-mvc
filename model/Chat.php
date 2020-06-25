<?php

class Chat
{
       
    // AJOUTER UN MESSAGE
    function addMessage ($pseudoSession, $message)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=espacemembres;
        charset=utf8', 'root', '');
        
        $reponse = $bdd->prepare('INSERT INTO chat (pseudo, message, date_time) VALUES (?,?, NOW())');
        $reponse->execute(array($pseudoSession, $message));
       
    }
    // JOINTURE CHAT
    function jointureChat()
    {
        $bdd = new PDO('mysql:host=localhost;dbname=espacemembres;
        charset=utf8', 'root', '');
        
        $reponse = $bdd->query('SELECT chat.message, chat.pseudo, chat.date_time,
        membres.pseudo,  membres.avatar
        FROM chat
        LEFT JOIN membres 
        ON chat.pseudo = membres.pseudo
        ORDER BY date_time DESC LIMIT 0, 10
        ');

        // on convertie en format json
        $messages = $reponse->fetchAll();
       echo json_encode($messages);


      
    }
}