<?php
	include_once("verif_session.php");

	include_once("inc_bdd.php");

	$sql = "SELECT * FROM acteurs";
	$query = $bdd -> query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>ExtraNet GBAF</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="GBAF.css">
</head>
<body>
	<?php include("navbar.php") ?>
	<DIV class="intro">
	<h1>Présentation du GBAF et du site</h1>
	<p>
		Le Groupement Banque Assurance Français (GBAF) est une fédération
	    représentant les 6 grands groupes français :
	<ul>
		<li>BNP Paribas ;</li>
        <li>BPCE ;</li>
	    <li>Crédit Agricole ;</li>
	    <li>Crédit Mutuel-CIC ;</li>
	    <li>Société Générale ;</li>
	    <li>La Banque Postale.</li>
	</ul>
	    Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler de la même façon pour gérer près de 80 millions de comptes sur le territoire national.<br />
	    Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française.<br /> 
	    Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.
    </p>
    <p>
     	Aujourd’hui, il n’existe pas de base de données pour chercher ces informations de manière fiable et rapide ou pour donner son avis sur les partenaires et acteurs du secteur bancaire, tels que les associations ou les financeurs solidaires.<br /> Pour remédier à cela, le GBAF souhaite proposer aux salariés des grands groupes français un point d’entrée unique, répertoriant un grand nombre d’informations sur les partenaires et acteurs du groupe ainsi que sur les produits et services bancaires et financiers.<br /> Chaque salarié pourra ainsi poster un commentaire et donner son avis. <br />
        Le but du projet est donc de développer un extranet donnant accès à ces informations.</p>
    <p> 
    	<img src="\travaux\Projet3_fullstack/imageAcueilGBAF.png" alt="Personnes qui travaillent emsemble.">
    </p>
    </DIV>
    <DIV class="body">
    <h2>Acteurs et partenaires</h2>
    <?php 
    	while($acteur = $query -> fetch()):
    ?>
    	 <h3 class="specH3">
	    	<img class="imgMini" src="\travaux\Projet3_fullstack\Acteurs-Partenaires/<?= $acteur["logo"] ?>" alt="Logo de l'acteurs">
	    	<?php
	    		$tab = explode(" ", $acteur['description']);
				$long = count($tab);
				if ($long < 15)
					echo $acteur['description']; 
				else {
					$result = "";
					for ($i = 0; $i <= 15; $i++) {
						$result .= $tab[$i] . " ";
					}
					echo $result . "...";
				}
	    	?> 
	    	<a class="specA" href="acteur.php?id=<?= $acteur["id_acteur"] ?>"> lire la suite</a>
	   </h3>
    <?php
    	endwhile;
    ?>
    </DIV>
<? include_once("footer.php"); ?>
</body>
</html>
