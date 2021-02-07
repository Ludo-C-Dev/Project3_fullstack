<?php

	include_once("inc_bdd.php");


	if(isset($_POST['username']) && $_POST['username'] && isset($_POST['password']) && $_POST['password'] && isset($_POST['passwordv']) && $_POST['passwordv'] && $_POST['password'] === $_POST['passwordv'])
	{
		$sql = 'UPDATE account SET password = ? WHERE username = ?';

		$req = $bdd -> prepare($sql);

		$req -> execute([
			password_hash($_POST['password'],PASSWORD_DEFAULT),
			$_POST['username']
		]);

		
		$erreur = 'Mot de passe modifié !' ;echo $erreur ;
		echo "<br /><a href=\"index.php\">Index</a>";exit();
	}
	else
	{
		echo "L'username n'est pas valide ! <br> <a href='index.php'>Retour à la connexion</a>";
	}