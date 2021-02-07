<?php
include ("inc_bdd.php");

if (isset($_POST['connexion']) && $_POST['connexion'] == 'connexion') 
{
	if (
		isset($_POST['username']) 
		&& !empty($_POST['username']) 
		&& isset($_POST['password']) 
		&& !empty($_POST['password'])
	) 
	{
		$sql = 'SELECT id_account, password FROM account WHERE username = ?';

		$req = $bdd -> prepare($sql);

		$req -> execute([$_POST['username']]);

		$data = $req -> fetch();

		if ($data)
		{
			$password = $data['password'];
			if(password_verify($_POST['password'], $password))
			{
				session_start();
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['id_account'] = $data['id_account'];
				header('Location: Accueil.php');
				exit();
			}
			else
			{
				$erreur = 'Pseudo ou mot de passe non reconnu !' ;echo $erreur ;
				echo "<br /><a href=\"index.php\">Index</a>";exit();
			}
		}
		else
		{
			$erreur = 'Pseudo ou mot de passe non reconnu !' ;echo $erreur ;
			echo "<br /><a href=\"index.php\">Index</a>";exit();
		}
	}
	else
	{
		$erreur = 'Erreur de saisie !<br />Aum moins un des champs est vide !'; echo $erreur;
		echo "<br /><a href=\"index.php\">Index</a>";exit();
	}

	
}
else
{
	$erreur = 'Erreur de saisie !<br />Aum moins un des champs est vide !'; echo $erreur;
	echo "<br /><a href=\"index.php\">Index</a>";exit();
}
?>