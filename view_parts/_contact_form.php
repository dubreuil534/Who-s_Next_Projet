<?php
/*  Voici la fonction pour envoyer le formulaire de contact par courriel mais nous avons pas de serveur smtp*/
/*mail("$to",$subject,$message,$headers);*/
if(isset($_POST['submit'])) {
    $to = 'dubreuil534@hotmail.com';
    $from = $_POST['courriel'];
    $first_name = $_POST['prenom'];
    $last_name = $_POST['nom'];
    $subject = "Who's Next";
    $message = $_POST['commentaires'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;

    $in_post = array_key_exists('submit', $_POST);
}

//Validation Prenom
    $prenom_ok = false;
    $prenom_msg = '';

    if (array_key_exists('prenom', $_POST)) {
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_MAGIC_QUOTES);
        $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);

        $prenom_ok = (1 === preg_match('/^[A-Za-z0-9]{2,}$/', $prenom));

        if (!$prenom_ok) {
            $prenom_msg = 'Attention !! Le prenom ne doit contenir que des caractères alphabétiques et numériques (min 2)';
        }
    }

    //Validation Nom
    $nom_ok = false;
    $nom_msg = '';

    if (array_key_exists('nom', $_POST)) {
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_MAGIC_QUOTES);
        $prenom = filter_var($nom, FILTER_SANITIZE_STRING);

        $nom_ok = (1 === preg_match('/^[A-Za-z0-9]{2,}$/', $nom));

        if (!$nom_ok) {
            $nom_msg = 'Attention !! Le nom ne doit contenir que des caractères alphabétiques et numériques (min 2)';
        }
    }

    //Validation EMAIL
$courriel_ok = false;
$courriel_msg = '';
if (array_key_exists('courriel', $_POST)) {
    $courriel = filter_input(INPUT_POST, 'courriel', FILTER_SANITIZE_EMAIL);
    $courriel = filter_var($courriel, FILTER_VALIDATE_EMAIL);
    $courriel_ok = (false !== $courriel);

    if (!$courriel_ok) {
        $courriel_msg = 'Attention !! Le courriel doit contenir un @ et se terminer par un herbergeur de courriel valide.';
    }
}

$msg_ok = false;
$msg_msg = ""; //Message de feedback validation. affichier sinon vide
if (array_key_exists("commentaires", $_POST)) {
    $mgs = filter_input(INPUT_POST, "commentaires",FILTER_SANITIZE_STRING);
    if (strlen($_POST["commentaires"])>=10) {
        $msg_ok = true;
    }
    If (! $msg_ok){ // le prénom n'est pas valide.
        $msg_msg = " Attention!! (Min 1 caractères).";
    }
}


if ($prenom_ok && $nom_ok && $courriel_ok && $msg_ok) {
    echo '<div class="alert alert-success" role="alert">

       <strong>Bravo!</strong> Votre message à été envoyé.
     </div>';

}


?>




<div class="container">
<h2>Contactez-nous:</h2>
    <div class="well">
        <strong>
            IMPORTANT !!
        </strong>
        <div>
            <strong>Prenom et Nom:</strong> Doit contenir des lettres et des nombres au minimum de 2 caracteres.<br>
            <strong>Courriel:</strong> Doit contenir un @ et se terminer pour un herbergeur de courriel valide.<br>
            <strong>Choisisez le sujet de votre demande:</strong> Dois choisir un champs obligatoire.<br>
            <strong>Message:</strong> Doit contenir au moins 10 caractères minimum.<br>
            <span style="color: red; font-size: 8pt">* Les champs obligatoires</span>


        </div>
    </div>
<form role="form" method="post">
    <div class="form-group">
        <label for="prenom">Prénom:</label>
        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Entrer votre prénom">
        <?php echo array_key_exists('prenom', $_POST) ? $_POST['prenom'] : '' ?>
        <h6 class="msg_error"><?php echo $prenom_msg ?></h6>
    </div>

    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer votre nom">
        <?php echo array_key_exists('nom', $_POST) ? $_POST['nom'] : '' ?>

        <h6 class="msg_error"><?php echo $nom_msg ?></h6>
    </div>

    <div class="form-group">
        <label for="courriel">Courriel:</label>
        <input type="email" class="form-control" name="courriel" id="courriel" placeholder="Entrer un courriel">
        <?php echo array_key_exists('courriel', $_POST) ? $_POST['courriel'] : '' ?>

        <h6 class="msg_error"><?php echo $courriel_msg ?></h6>
    </div>

    <div class="form-group">
        <label for="sel1">Choisisez le sujet de votre demande:</label>
        <select class="form-control" id="sel1" name="sujet">
            <option
                <?php echo (array_key_exists('sujet',$_POST) && ($_POST['sujet'] =='Sujet non selectionée')) ? ' selected="selected"' : '' ?>
                value="Sujet non selectionée" >Sujet non selectionée</option>
            <option
                <?php echo (array_key_exists('sujet',$_POST) && ($_POST['sujet'] =='Probleme de connexion')) ? ' selected="selected"' : '' ?>
                value="Probleme de connexion">Probleme de connexion</option>
            <option
            <option
                <?php echo (array_key_exists('sujet',$_POST) && ($_POST['sujet'] =='Messagerie instantanée')) ? ' selected="selected"' : '' ?>
                value="Messagerie instantanée">Messagerie instantanée</option>
            <option
                <?php echo (array_key_exists('sujet',$_POST) && ($_POST['sujet'] =='Mon profil')) ? ' selected="selected"' : '' ?>
                value="Mon profil">Mon profil</option>
            <option
                <?php echo (array_key_exists('sujet',$_POST) && ($_POST['sujet'] =='Blogue')) ? ' selected="selected"' : '' ?>
                value="Blogue">Blogue</option>
            <option
                <?php echo (array_key_exists('sujet',$_POST) && ($_POST['sujet'] =='Signaler un membre')) ? ' selected="selected"' : '' ?>
                value="Signaler un membre">Signaler un membre</option>
            <option
                <?php echo (array_key_exists('sujet',$_POST) && ($_POST['sujet'] =='Proposition d\'affaires & partenariat')) ? ' selected="selected"' : '' ?>
                value="Proposition d'affaires & partenariat">Proposition d'affaires & partenariat</option>
            <option
                <?php echo (array_key_exists('sujet',$_POST) && ($_POST['sujet'] =='Commentaires & suggestions')) ? ' selected="selected"' : '' ?>
                value="Commentaires & suggestions">Commentaires & suggestions</option>

        </select>
    </div>

    <div class="form-group">
        <label for="message">Message:</label>
        <textarea maxlength="1000" rows="8" class="form-control" id="message" name="commentaires" placeholder="Entrez votre message"></textarea>
    </div>






    <button type="submit" name="submit" class="btn btn-primary">Soumettre</button>
</form>

</div>