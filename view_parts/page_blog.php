<?php


$in_post = array_key_exists('soumet', $_POST);

$msg_ok = false;
$msg_msg = ""; //Message de feedback validation. affichier sinon vide
if (array_key_exists("commentaire", $_POST)) {
    $mgs = filter_input(INPUT_POST, "commentaire",FILTER_SANITIZE_STRING);
    if (strlen($_POST["commentaire"])>=1) {
        $msg_ok = true;
    }
    If (! $msg_ok){ // le prénom n'est pas valide.
        $msg_msg = " Attention!! (Min 10 caractères et minuscule seulement).";
    }
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

                 <input type="text" name="pseudo" id= "pseudo" placeholder="" value="<?php echo !empty($_SESSION["user"])?$user->username:"";?>"/>
         </p>


         <p class="form-group">

        <textarea cols="10" rows="8" class="form-control" id="commentaire" name="commentaire" placeholder="Entrez votre commentaire"></textarea>
             <br>
             <span class="<?php echo $in_post && ! $msg_ok ? 'msg_error' : '';?>"> <?php echo $msg_msg;?></span>


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



while ($donnees = $reponse->fetch())

{
    //Envoi de l'image du profil qui a envooyer un commentaire.

    echo '<img  src="images/' .htmlspecialchars($donnees['pseudo']). '" alt="Logo_compagnie" style="width:120px;height:120px;"/>';
   echo '<p>' .' le ' . htmlspecialchars($donnees['date_ca']). '</p>' ;
    echo '<div class="well">'.'<p>'.htmlspecialchars($donnees['pseudo'].' a commenté : ').htmlspecialchars($donnees['commentaire']). '</p>'.'</div>';

}

$reponse->closeCursor();

?>
</body>
</html>



