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

$req = $bdd->prepare('SELECT username,age,sex,orientation,region,decription,photo FROM user');

// execution du message
$req->execute(array($_POST['pseudo'], $_POST['commentaire']));

// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=tp_dof;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

while($data = mysql_fetch_assoc($req))
{
    // on affiche les informations de l'enregistrement en cours
    echo '<b>'.$data['nom'].' '.$data['prenom'].'</b> ('.$data['statut'].')';
    echo ' <i>date de naissance : '.$data['date'].'</i><br>';
}

?>



<div class="search_result">
    <img class="search_image" src="images/User1.jpg" alt="User1">
    <div class="search_description">
        <p class="search_username">Dominique</p>
        <p class="search_profil">Homme / 26 ans / Hétérosexuelle / Montreal </p>
        <p class="search_resume">D' un temperament chaleureux ,sympathique et enthousiaste,
            Je sais se que je veux et je prends les moyens qu il faut pour l'obtenir.
            Dynamiques et fonceur constamment a la recherche de nouveau et d'imprevu,Jai cependant pour...</p>
        <button type="button" class="btn btn-xs btn-primary">Message</button>
        <button type="button" class="btn btn-xs btn-success">Email</button>
    </div>

</div>





<div class="search_result">
    <img class="search_image" src="images/gallery2.jpg" alt="User1">
    <div class="search_description">
        <p class="search_username">Marc</p>
        <p class="search_profil">Homme / 37 ans / Hétérosexuelle / Cote-Sud </p>
        <p class="search_resume">D' un temperament chaleureux ,sympathique et enthousiaste,
            Je sais se que je veux et je prends les moyens qu il faut pour l'obtenir.
            Dynamiques et fonceur constamment a la recherche de nouveau et d'imprevu,Jai cependant pour...</p>
        <button type="button" class="btn btn-xs btn-primary">Message</button>
        <button type="button" class="btn btn-xs btn-success">Email</button>
    </div>

</div>

<div class="search_result">
    <img class="search_image" src="images/gallery3.jpg" alt="User1">
    <div class="search_description">
        <p class="search_username">Pierre</p>
        <p class="search_profil">Homme / 45 ans / Hétérosexuelle / Laval </p>
        <p class="search_resume">D' un temperament chaleureux ,sympathique et enthousiaste,
            Je sais se que je veux et je prends les moyens qu il faut pour l'obtenir.
            Dynamiques et fonceur constamment a la recherche de nouveau et d'imprevu,Jai cependant pour...</p>
        <button type="button" class="btn btn-xs btn-primary">Message</button>
        <button type="button" class="btn btn-xs btn-success">Email</button>
    </div>

</div>