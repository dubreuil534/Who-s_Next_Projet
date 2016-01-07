<?php if(isset($_POST['submit'])){
$to = 'dubreuil534@hotmail.com';
$from = $_POST['email'];
    $first_name = $_POST['prenom'];
    $last_name = $_POST['nom'];
    $subject = "Who's Next";
    $message = $_POST['commentaires'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    /*  Voici la fonction pour envoyer le formulaire de contact par courriel mais nous avons pas de serveur smtp*/
    /*mail("$to",$subject,$message,$headers);*/
    echo '<div class="alert alert-success" role="alert">
       <strong>Envoyé</strong> Votre message à été envoyé aux administrateurs du site web. Merci !!
     </div>';
}
?>




<div class="container">
<h2>Contactez-nous:</h2>
<form role="form" method="post">
    <div class="form-group">
        <label for="prenom">Prénom:</label>
        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Entrer votre prénom">
    </div>

    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer votre nom">
    </div>

    <div class="form-group">
        <label for="courriel">Courriel:</label>
        <input type="email" class="form-control" name="email" id="courriel" placeholder="Entrer un courriel">
    </div>

    <div class="form-group">
        <label for="sel1">Choisisez le sujet de votre demande:</label>
        <select class="form-control" id="sel1">
            <option>Sujet de demande</option>
            <option>Problème de connexion</option>
            <option>Mon profil</option>
            <option>Messagerie instantanée</option>
            <option>Blogue</option>
            <option>Signaler un membre</option>
            <option>Proposition d'affaires & partenariat</option>
            <option>Commentaires & suggestions</option>

        </select>
    </div>

    <div class="form-group">
        <label for="message">Message:</label>
        <textarea maxlength="1000" rows="8" class="form-control" id="message" name="commentaires" placeholder="Entrez votre message"></textarea>
    </div>






    <button type="submit" name="submit" class="btn btn-primary">Soumettre</button>
</form>

</div>