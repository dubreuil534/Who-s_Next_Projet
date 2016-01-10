<?php
include("Server_Conf.php");
session_start();
if(!empty($_SESSION["user"])) {
    $user = $_SESSION["user"];
}else{
    header('Location: alerte.php');}

require_once  '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Profil';
require_once 'view_parts/_header.php';
require_once "view_parts/categorie_gauche.php";

require_once 'view_parts/_upload.php';
/**/
?>
<div id="main">
    <div class="container">
<h2>Votre profil</h2>

        <table id="horaire">

                        <tr>

                <td class="profil_title"><strong>Votre pseudo:</strong></td>
                <td class="profil_content">Olgaaaaaaa</td>

            </tr>
            <tr>

                <td class="profil_title"><strong>Votre courriel:</strong></td>
                <td class="profil_content">olga@olga.com</td>

            </tr>
            <tr>

                <td class="profil_title"><strong>Votre age:</strong></td>
                <td class="profil_content">33</td>

            </tr>
            <tr>

                <td class="profil_title"><strong>Votre genre:</strong></td>
                <td class="profil_select">femme</td>

            </tr>
            <tr>

                <td class="profil_title"><strong>Votre orientation:   </strong></td>
                <td class="profil_select">hétérosexuelle</td>

            </tr>

            <tr>

                <td class="profil_title"><strong>Votre region:</strong></td>
                <td class="profil_select">non selectionée</td>

            </tr>

            <tr>

                <td class="profil_title"><strong>Votre but:</strong></td>
                <td class="profil_select">non selectionée</td>

            </tr>

        </table>

        <div class="form-group" style="margin-top: 20pt">
            <form action="#" method="post">
            <label for="resume" class="profil_title">Votre resumé / intérets (~20 mots):</label>
            <p><textarea maxlength="100" rows="3" class="form-control" id="message" placeholder="Entrez votre message"></textarea></p>

                <input type="submit" value="Ajouter resumé" name="resume_submit" class="btn btn-primary"/>

            </form>
        </div>



        <form action="#" method="post" enctype="multipart/form-data">
            <label for="image_files" style="margin-top: 20pt" class="profil_title">Choisisez votre photo:</label>
            <input type="file" name="image_files" accept="image/*" />
            <input type="submit" style="margin-top: 10pt" value="Ajouter photo" name="upload_submit" class="btn btn-primary"/>

            <?php
            if (array_key_exists('image_files', $_FILES)) { // Ulpoad button has been pressed
                if ( $upload_ok) {
                    echo '<p>Le fichier '. basename( $_FILES["image_files"]["name"]). ' a été téléversé avec succès.</p>';
                    echo '<img src="images/' . $_FILES["image_files"]["name"] . '" title="uploaded images" />';
                } else {
                    echo '<p>Le fichier n\'a pas été téléchargé.</p>';
                    echo "<p>$upload_msg</p>";
                }
            }
            ?>

        </form>
<div style="margin-top: 50pt">
        <button class="btn btn-primary" style="margin-right: 100pt"><a href="index.php" style="color: white"/>Sauvegarder</button>
        <button class="btn btn-primary"><a href="inscription.php" style="color: white"/>Modifier</button>
</div>


    </div>



    <?php
    ?>
    <?php require_once 'view_parts/_footer.php'; ?></div>