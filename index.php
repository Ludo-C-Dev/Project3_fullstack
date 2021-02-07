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
		 Avant toutes choses, veuillez vous connectez :
	</p>
	<form action="connexion.php" method="post">
	 <label for="username">Pseudo ==></label> : <input type="text" name="username" value=""><br />
	 <label for="password">Mot de passe ====></label> : <input type="password" name="password">
	 <input type="submit" name="connexion" value="connexion"> 
	</form>
	<a href="inscription.php">s'inscrire</a> - <a href="mdp_1.php">Mot de passe oublie ?</a>
	</DIV>
</body>
</html>