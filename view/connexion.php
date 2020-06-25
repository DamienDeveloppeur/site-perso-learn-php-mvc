	<?php
	ob_start();
	?>
	Connexion
	<?php
	$title = ob_get_clean();

	ob_start();
	require "INCLUDE_header.php";
	$header = ob_get_clean();

	ob_start();
		?>
			<div id="connexionF" class="marginTop" >
			<h1>Connexion</h1>
				<p>Veuiller entrer votre pseudo et votre mot de passe pour vous connecter</p>
				  <form method="POST" action="index.php?action=connexion">
				
				<label>Votre pseudo</label><input type="text" name="pseudo">
					  <br>
				<label>Votre mot de passe</label><input type="password" name="pass">
					  <br>
				<input type="submit" value="connexion"/>
				  </form>
				</div>


<?php 
		
	
$content = ob_get_clean();

ob_start();
 require "INCLUDE_footer.php"; 
$footer = ob_get_clean();

require 'template.html';