<?php

//var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once 'page_blog_post.php';
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <title> BLOG </title>
</head>

<body>
<div class="contener">


    <h1 id="titre"> BLOG </h1>


    <form action= "#" method="post">

             <p class="form-group">

                 <input type="text" name="pseudo" id= "pseudo" placeholder="<?php echo !empty($_SESSION["user"])?$user->username:"";?>"/>
         </p>


         <p class="form-group">

        <textarea cols="10" rows="8" class="form-control" id="commentaire" name="commentaire" placeholder="Entrez votre commentaire"></textarea>


            <p class="form-group"><input type="submit" id="soumet" name="soumet" value="Soumettre" /></p>

    </form>
</div >

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


$imageprofil = !empty($_SESSION["user"])?$user->username:"Logo_projet.gif";

while ($donnees = $reponse->fetch())

{
    //Envoi de l'image du profil qui a envooyer un commentaire.

    /*echo <img src="images/<?php  echo !empty($_SESSION["user"])?$user->username:"Logo_projet.gif";?>" alt='Logo_compagnie' style='width:120px;height:120px;'>*/
   echo '<p>' .' le ' . htmlspecialchars($donnees['date_ca']). '</p>' ;
    echo '<div class="well">'.'<p>'.htmlspecialchars($donnees['pseudo'].' a commenté : ').htmlspecialchars($donnees['commentaire']). '</p>'.'</div>';

}

$reponse->closeCursor();

?>
</body>
</html>



