<?php
include_once("verif_session.php");
include_once("inc_bdd.php");
include_once("navbar.php");
    $session = $_SESSION['username'];
		$sql = 'SELECT * FROM account WHERE username = ?';

		$req = $bdd -> prepare($sql);
		$req -> execute([$session]);

        $data = $req -> fetch();
        if ($data) 
        {		 
?>
<!DOCTYPE html>
<html>
<head>
	<title> Mon profil </title>
	<link rel="stylesheet" type="text/css" href="GBAF.css">
</head>
<body>
	<div class="intro">
     <h2>Modifier le profil</h2>
     <form action="profil_up.php" method="post">
     	<label for="nom">Votre nom </label><input type="text" name="nom" placeholder="<?php echo $data['nom']; ?>"><br>
     	<label for="prenom">Votre prénom : </label><input type="text" name="prenom" placeholder="<?php echo $data['prenom']; ?>"><br>
     	<label for="question">Votre question secrète : </label><input type="text" name="question" placeholder="<?php echo $data['question']; ?>"><br>
     	<label for="reponse">Votre réponse secrète : </label><input type="text" name="reponse" placeholder="<?php echo $data['reponse']; ?>"><br><br>
     	<input type="submit" name="valider" value="confirmer les modifications">
     </form>
    </div>
</body>
</html>
<?php } ?>

