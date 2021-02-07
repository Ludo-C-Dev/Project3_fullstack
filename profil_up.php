<?php 
include_once("verif_session.php");
include_once("inc_bdd.php");
$session = $_SESSION['username'];
if (isset($_POST['valider']) && $_POST['valider'] == 'confirmer les modifications') 
{
    if (isset($_POST['nom']) && !empty($_POST['nom']) && 
        isset($_POST['prenom']) && !empty($_POST['prenom']) &&  
        isset($_POST['question']) && !empty($_POST['question']) && 
        isset($_POST['reponse']) && !empty($_POST['reponse'])) 
    {
        $sql = 'SELECT *  FROM account WHERE username = ?';
        $query = $bdd -> prepare($sql);
        $query -> execute([$session]);
        $data = $query -> fetch();
        if ($data) 
        {
            $sql = 'UPDATE `account` SET nom = ?, prenom = ?, question = ?, reponse = ? WHERE username = ?';
            $query = $bdd -> prepare($sql);
            $query -> execute([
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['question'],
                $_POST['reponse'],
                $session
            ]);
            $erreur = 'modifications reussies !';
            echo $erreur;
            echo"<br /><a href=\"index.php\">Index</a>";
        }
        else 
        {
                $erreur = 'Echec de la modification!<br/>Un membre possede déja ce login !';
                echo $erreur;
                echo"<br/><a href=\"index.php\">Index</a>";
        }
    }
    else
    {
        $erreur = 'Echec de la modification !<br/>Au moins un des champs est vide !';
        echo $erreur;
        echo"<br/><a href=\"index.php\">Index</a>";
    }
}
else 
{
    $erreur = 'Echec de la modification !<br/>Au moins un des champs est vide BB!';
        echo $erreur;
        echo"<br/><a href=\"index.php\">Index</a>";
}