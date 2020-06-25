<?php
	ob_start();
	?>
	Chat
	<?php
  $title = ob_get_clean();
  ob_start();
	require "INCLUDE_headerC.php";
  $header = ob_get_clean();
  ob_start();
  ?>
        <div id="minichat" class="marginTop text-center">

        
    <form method="POST" action="index.php?action=addMessage">  
            <label>Votre message</label>
            <input type="text" name="message"/>
            <input type="submit" value="Envoyer"/> 
    </form>
        <h1>Bienvenue à vous sur le chat de mon site personnel</h1>
        
        <?php

        while ($donnees = $reponse ->fetch())
        {
            
        ?>
        <div id="messagechat">
             <?php
        echo  '<img src="./public/avatar/'. $donnees['avatar'].'"id="logoprofil"/>' 
        . '<p>'. $donnees['pseudo'].' dit: '. $donnees["message"] . '(' . $donnees["date_time"] . ')'. '</p>' ;
            ?>
          
        </div>
    <?php
    
        }     
        
        $reponse->closeCursor(); 
      $content = ob_get_clean();

        ob_start();
        require "INCLUDE_footer.php"; 
       $footer = ob_get_clean();
       


    ?>
    </div>
  
</div>
<script src="../public/JS/main">  </script>
       
</body>
</html>