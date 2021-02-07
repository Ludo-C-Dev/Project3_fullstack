<?php
include_once 'inc_bdd.php';
include_once 'verif_session.php';

$id_acteur = $_POST['id_acteur'];
$id_account = $_SESSION["id_account"];

$req = $bdd->prepare('INSERT INTO commentaires (id_acteur, id_account,message,datetime) VALUES(?, ?, ?, NOW())');
$req->execute(array($id_acteur, $id_account, $_POST['message']));

header("Location: acteur.php?id=".$id_acteur);