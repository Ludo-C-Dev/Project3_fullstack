<?php
include_once("verif_session.php");
include_once("inc_bdd.php");
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
        <meta charset="utf-8" />
        <title>Commentaires</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
    
    <form action="commentaires_post.php" method="post">
        <p>
        <label for="message">Message de <?php echo $session ?></label> :  <input type="text" name="message" id="message" size="100" /><br />
        <input type="submit" value="Envoyer" />  
	</p>
    </form>

<?php
        }
          
?>
    </body>
</html>
