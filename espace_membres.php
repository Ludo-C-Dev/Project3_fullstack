<?php
session_start()
if (!isset($_SESSION['username'])) 
{header('Location : index.php');exit();}
?>
<<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>
	Bienvenue <?php echo htmlentities(trim($_SESSION['login'])); ?> !<br />
	<a href="deconnexion.php">Déconnexion</a>
	<a href="profil.php">Profil</a>
</p>
</body>
</html>