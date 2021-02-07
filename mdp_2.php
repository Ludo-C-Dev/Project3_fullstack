<?php

	include_once("inc_bdd.php");
	if(isset($_POST['username']) && $_POST['username'])
	{
		$sql = 'SELECT question FROM account WHERE username = ?';

		$req = $bdd -> prepare($sql);

		$req -> execute([$_POST['username']]);

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
						 Veuillez répondre à votre question :
					</p>
					<form action="mdp_3.php" method="post">
					 <input type="hidden" name="username" value="<?php echo $_POST['username'] ?>">
					 <label for="reponse"><?php echo $data['question'] ?> ==></label> : <input type="text" name="reponse" value=""><br>
					 <input type="submit" name="valider" value="Valider"> 
					</form>
					</DIV>
				</body>
				</html>
			<?php
		}
		else
		{
			$erreur = 'Pseudo non reconnu !' ;echo $erreur ;
			echo "<br /><a href=\"index.php\">Index</a>";exit();
		}
	}
	else
	{
		echo "L'username n'est pas valide ! <br> <a href='index.php'>Retour à la connexion</a>";

	}