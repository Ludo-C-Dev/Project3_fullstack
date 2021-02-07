<?php
	include_once("verif_session.php");
	include_once("inc_bdd.php");
	$session = $_SESSION['username'];

	if(isset($_GET['id']) AND $_GET['id'] != NULL AND $_GET['id'] > 0)
	{
		$id = $_GET['id'];

		$sql = "SELECT * FROM acteurs WHERE id_acteur = ?";
		$query = $bdd -> prepare($sql);
		$query -> execute(array($id));

		$likes = $bdd->prepare('SELECT vote FROM vote WHERE id_acteur = ? AND vote = 1');
		$likes->execute(array($id));
		$likes = $likes->rowCount();

		$dislikes = $bdd->prepare('SELECT vote FROM vote WHERE id_acteur = ? AND vote = 0');
		$dislikes->execute(array($id));
		$dislikes = $dislikes->rowCount();

		$acteur = $query -> fetch();
		if($acteur == NULL)
		{
			header("Location: Accueil.php");
		}
		?>
			<!DOCTYPE html>
			<html>
			<head>
				<title><?= $acteur["acteur"] ?></title>
				<meta charset="utf-8">
				<link rel="stylesheet" type="text/css" href="GBAF.css">
			</head>
			<body>
				<?php include("navbar.php") ?>
				<DIV class="intro">
				<p>
					<img src="\travaux\Projet3_fullstack\Acteurs-Partenaires/<?= $acteur["logo"] ?>" alt="Logo de DSA France.">
				</p>
				<p>
					<?= $acteur["description"] ?>
				</p>
				<p>
					aimez vous cet acteur ? <a class="specA" href="oui.php?&id=<?= $id ?>">oui (<? echo $likes ?>)</a> <a class="specA" href="non.php?&id=<?= $id ?>">non(<? echo $dislikes ?>)</a>
				</p>
				</DIV>
				<form action="commentaires_post.php" method="post">
			        <p>
				        <label for="message">Message de <?php echo $session ?></label> :  <input type="text" name="message" id="message" size="100" /><input type="hidden" name="id_acteur" value="<?php echo $id ?>"><br />
				        <input type="submit" value="Envoyer" />  
					</p>
			    </form>
<?php
    $com = "SELECT nom, prenom, 
                    message, datetime
            FROM account AS a INNER JOIN commentaires AS b 
            ON b.id_account = a.id_account
            WHERE b.id_acteur = $id";

    $com_query = $bdd -> prepare($com);
    $com_query -> execute();

    while($donnees = $com_query-> fetch()) 
    {
    	echo '<p><strong>' . $donnees['nom'] .' '.  $donnees['prenom'].' '. '</strong> : ' . $donnees['message'].' '.$donnees['datetime'] . '</p>';
    } 
       
    $com_query->closeCursor();
?>
			</body>
			</html>
		<?php
	}
	else
	{
		header("Location: Accueil.php");
	}
?>