<main>
	<?php 
	if (isset($log)) {
		echo $log;
	}
	 ?>
	<form action="<?= WEBROOT ?>user/logIn" method="POST">
		<label for="email">Email</label>
		<input type="email" id="email" name="email" placeholder="Entrez votre email">
		<label for="password">Password</label>
		<input type="password" id="password" name="password" placeholder="Entrez votre password">
		<input type="submit">
	</form>
</main>