<main>
	<?php 
	if (isset($user)) {
		echo '<pre>';
		var_dump($user);
		echo '</pre>';
	}
	 ?>
	<form action="<?= WEBROOT ?>user/signIn" method="POST">
		<label for="email">Email</label>
		<input type="email" id="email" name="email" placeholder="Entrez votre email">
		<label for="password">Password</label>
		<input type="password" id="password" name="password" placeholder="Entrez votre password">
		<label for="nom">Nom</label>
		<input type="text" id="nom" name="nom" placeholder="Entrez votre nom">
		<label for="prenom">Prenom</label>
		<input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom">
		<input type="submit">
	</form>
</main>