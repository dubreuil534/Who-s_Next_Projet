<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=tp_dof;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée

$req = $bdd->prepare('INSERT INTO blog (pseudo , commentaire , date_ca) VALUES(?, ?, NOW())');

// execution du message
$req->execute(array($_POST['pseudo'], $_POST['commentaire']));

?>