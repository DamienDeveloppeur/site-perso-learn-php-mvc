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

        // on convertie en format json
        $messages = $reponse->fetchAll();
        echo json_encode($messages);


      
    }
}
?>
<script> 
function getMessages()
{
// connexion au serveur pour requête ajax
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open("GET", "index.php");
   
   // ../../model/Chat.php
//../../view/chat.php


    requeteAjax.onload = function()
    {
        const resultat = JSON.parse(requeteAjax.responseText);
        alert(resultat);
   // const html = resultat.map(function(message)
  //  {
  //  return '<div class="message"> <span class="date">${message.created_at.substring(11,16)}</span> <span class="author">${message.author}</span> :<span class="content">${message.content}</span> </div>'

   // }).join('');
   // const message = document.querySelector('#messagechat');

   // getMessages.innerHTML = html;
  //  getMessages.scrollTop = messages.scrollHeight;
      
    }

  // on envoie la requête
  requeteAjax.send();  

}
</script>
<?php