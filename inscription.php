<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<h1> Inscription à l'espace membre :<br /></h1>
	<form action="inscription_bdd.php" method="post">
		<label for="nom">Nom</label> : <input type="text" name="nom" id="nom" size="25" /><br /><br />
        <label for="prenom">Prénom</label> :  <input type="text" name="prenom" id="prenom" size="25" maxlength="50" /><br /><br />
        <label for="username">Pseudo</label> : <input type="text" name="username" id="username" size="25" maxlength="50" /><br /><br />
        <label for="password">Mot de passe</label> : <input type="password" name="password" id="password" size="25" /><br /><br />
        <label for="question">Question secrète</label> : <input type="text" name="question" id="question" size="150" /><br /><br />
        <label for="reponse">Réponse secrète</label> : <input type="text" name="reponse" id="reponse" size="150" /><br /><br />
        <input type="submit" name="validation" value="Envoyer" />		
	</form>
</body>
</html>