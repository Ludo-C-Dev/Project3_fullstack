<?php
include_once('inc_bdd.php');
include_once('verif_session.php');

if(isset($_GET['id']) AND !empty($_GET['id'] AND 
  (isset($_SESSION['id_account'])) AND !empty($_SESSION['id_account'])))
{
	 $getId = (int) $_GET['id'];
	 $sessionId = $_SESSION['id_account'];

     $check = $bdd->prepare('SELECT id_acteur FROM acteurs WHERE id_acteur = ?'); 
	 $check -> execute(array($getId));

	 if ($check->rowCount() == 1) 
	 {
	 	$check_likes = $bdd->prepare('SELECT vote FROM vote WHERE id_acteur = ? AND id_account = ?');
	 	$check_likes ->execute(array($getId, $sessionId));

	 	if ($check_likes->rowCount() == 1) 
	 	{
	 		$del = $bdd->prepare('DELETE FROM vote WHERE id_acteur = ? AND id_account = ? AND vote = 1');
	 		$del ->execute(array($getId, $sessionId));
	 		header("location:".  $_SERVER['HTTP_REFERER']);
	 	}
        else
        {
	 	$ins = $bdd -> prepare('INSERT INTO vote (id_acteur, id_account, vote) VALUES(?, ?, 1)');
	 	$ins->execute(array($getId, $sessionId));
	 	header("location:".  $_SERVER['HTTP_REFERER']);
	    }
	 }
	 else
	 {
	 	$erreur = 'erreur !' ;echo $erreur ;
			echo "<br /><a href=\"index.php\">Index</a>";exit();
	 }
}
else
{
	$erreur = 'Erreur fatale !' ;echo $erreur ;
			echo "<br /><a href=\"index.php\">Index</a>";exit();
}

?>