<?php

	include_once("inc_bdd.php");


	if(isset($_POST['username']) && $_POST['username'] && isset($_POST['reponse']) && $_POST['reponse'])
	{
		$sql = 'SELECT id_account FROM account WHERE username = ? AND reponse = ?';

		$req = $bdd -> prepare($sql);

		$req -> execute([
			$_POST['username'],
			$_POST['reponse']
		]);

		$data = $req -> fetch();

		if ($data)
		{
?>
				<!DOCTYPE html>
				<html>
				<head>
					<title>Index</title>
					<meta charset="utf-8">
					<link rel="stylesheet" type="text/css" href="GBAF.css">
				</head>
				<body>
					<header class="header">
						<p>
							<img src="\travaux\Projet3_fullstack/logo_GBAF_mini.png" alt="logo de la GBAF"/>
						</p>
					</header>
					<DIV class="intro">
					<h1>Bienvenue sur l'extranet de GBAF</h1>
					<p>
						 Veuillez changer votre mot de passe :
					</p>
					<form action="mdp_4.php" method="post">
					 <input type="hidden" name="username" value="<?php echo $_POST['username'] ?>">
					 <label for="password">Mot de passe ==></label> : <input type="password" name="password" value=""><br>
					 <label for="passwordv">confirmation ==></label> : <input type="password" name="passwordv" value=""><br>
					 <input type="submit" name="valider" value="Valider"> 
					</form>
					</DIV>
				</body>
				</html>
			<?php
		}
		else
		{
			$erreur = 'Mauvaise réponse !' ;echo $erreur ;
			echo "<br /><a href=\"index.php\">Index</a>";exit();
		}
	}
	else
	{
		echo "L'username n'est pas valide ! <br> <a href='index.php'>Retour à la connexion</a>";
	}