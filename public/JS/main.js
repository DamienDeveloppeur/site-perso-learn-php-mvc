/*
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

function test()
{
    alert("test");
}*/