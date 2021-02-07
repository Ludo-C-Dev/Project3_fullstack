<?php
include ("inc_bdd.php");
if (isset($_POST['validation']) && $_POST['validation'] == 'Envoyer') 
{
    if (isset($_POST['nom']) && !empty($_POST['nom']) && 
        isset($_POST['prenom']) && !empty($_POST['prenom']) && 
        isset($_POST['username']) && !empty($_POST['username']) && 
        isset($_POST['password']) && !empty($_POST['password']) && 
        isset($_POST['question']) && !empty($_POST['question']) && 
        isset($_POST['reponse']) && !empty($_POST['reponse'])) 
    {
        $sql = 'SELECT count(*) AS "nblignes" FROM account WHERE username = ?';
        $query = $bdd -> prepare($sql);
        $query -> execute([$_POST['username']]);
        $data = $query -> fetch();
        if ($data["nblignes"] == 0) 
        {
            $sql = 'INSERT INTO account VALUES(NULL, ?, ?, ?, ?, ?, ?)';
            $query = $bdd -> prepare($sql);
            $query -> execute([
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['username'],
                password_hash($_POST['password'], PASSWORD_DEFAULT),
                $_POST['question'],
                $_POST['reponse']
            ]);
            $erreur = 'inscription reussie !';
            echo $erreur;
            echo"<br /><a href=\"index.php\">Index</a>";
        }
        else 
        {
                $erreur = 'Echec de l\'inscription !<br/>Un membre possede déja ce login !';
                echo $erreur;
                echo"<br/><a href=\"index.php\">Index</a>";
        }
    }
    else
    {
        $erreur = 'Echec de l\'inscription !<br/>Au moins un des champs est vide !';
        echo $erreur;
        echo"<br/><a href=\"index.php\">Index</a>";
    }
}
else 
{
    $erreur = 'Echec de l\'inscription !<br/>Au moins un des champs est vide !';
        echo $erreur;
        echo"<br/><a href=\"index.php\">Index</a>";
}
?>