<header class="header">
	<p>
		<a href="Accueil.php"><img src="\travaux\Projet3_fullstack/logo_GBAF_mini.png" alt="logo de la GBAF"/></a>
	</p>
	<p>
        Bienvenue <?php echo htmlentities(trim($_SESSION['username'])); ?> !<br />
        <a href="deconnexion.php">Déconnexion</a>
        <a href="profil.php">Profil</a>
    </p>
	
</header>