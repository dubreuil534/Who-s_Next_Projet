<?php
//var_dump($_POST);
require_once 'page_blogue.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <title> BLOG </title>
</head>

<body>
<div class="contener">


    <h1> BLOG </h1>


    <form action= "#" method="post">

             <p class="form-group">

                 <input type="text" name="pseudo" id= "pseudo" placeholder="pseudo"/>
         </p>


         <p class="form-group">

        <textarea cols="10" rows="8" class="form-control" id="commentaire" name="commentaire" placeholder="Entrez votre commentaire"></textarea>

         <div/>

            <p class="form-group"><input type="submit" id="soumet" name="soumet" value="Soumettre" /></p>

    </form>
</div>
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

// Récupération des 20 derniers messages

$reponse = $bdd->query('SELECT pseudo, commentaire , DATE_FORMAT(date_ca, \'%d/%m/%Y à %Hh %imin %ssec\') AS date_ca FROM blog ORDER BY ID DESC LIMIT 0, 20');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

while ($donnees = $reponse->fetch())
{
    echo '<p>'.htmlspecialchars($donnees['pseudo'].' a commenté : ') . htmlspecialchars($donnees['commentaire'] .' le ') . htmlspecialchars($donnees['date_ca']). '</p>' ;
}

$reponse->closeCursor();

?>
</body>
</html>


