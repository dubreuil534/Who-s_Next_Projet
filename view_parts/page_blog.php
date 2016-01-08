<?php
/*require_once 'page_blogue.php';*/
$in_post = array_key_exists('soumet', $_POST);


$pseudo_ok = false;
$pseudo_msg = '';
if (array_key_exists('pseudo', $_POST)) {
    $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_MAGIC_QUOTES);
    $pseudo = filter_var($pseudo, FILTER_SANITIZE_STRING);

    $pseudo_ok = (1 === preg_match('/^[A-Za-z0-9]{4,}$/', $pseudo));
    if(!$pseudo_ok){
    $pseudo_msg = 'le pseudo doit contenir des lettres ou des chiffres min 4';
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
<div class="container">


    <h1> BLOG </h1>


    <form action= "#" method="post">

             <div class="form-group">

                 <input type="text" name="pseudo" id= "pseudo" placeholder="pseudo"
                       class="<?php echo  $in_post && ! $pseudo_ok ? 'error' : ''; ?>"
            value="<?php echo array_key_exists('pseudo', $_POST) ? $_POST['pseudo'] : '' ?>"/>

                 <h6 class="msg_error" "> <?php echo $pseudo_msg ?> </h6>

             </div>


         <div class="form-group">

        <textarea maxlength="1000" rows="8" class="form-control" id="commentaire" name="commentaire" placeholder="Entrez votre commentaire"></textarea>

         </div>

            <div class="form-group"><input type="submit" id="soumet" name="soumet" value="Soumettre" /></div>

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
/*$reponse = $bdd->query('SELECT pseudo, commentaire , DATE_FORMAT(date_ca, \'%d/%m/%Y à %Hh %imin %ssec\') AS date_ca FROM blog ORDER BY ID DESC LIMIT 0, 20');*/
$reponse = $bdd->query('SELECT pseudo, commentaire , DATE_FORMAT(date_ca, \'%d/%m/%Y à %Hh %imin %ssec\') AS date_ca FROM blog ORDER BY ID DESC LIMIT 0, 20');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

while ($donnees = $reponse->fetch())
{
    echo '<p>'.htmlspecialchars($donnees['pseudo'].' : ') . htmlspecialchars($donnees['commentaire'] .'  affiché le : ') . htmlspecialchars($donnees['date_ca']). '</p>' ;
}

$reponse->closeCursor();

?>
</body>
</html>



