<?php
if(!empty($_SESSION["user"]))
    $user=$_SESSION["user"];
else
    header('Location: view_parts/alerte.php');

?>

<?php
require_once  '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Profil';
require_once 'view_parts/_header.php';
?>
<div id="main">
    <div class="container">
<h1>Votre profil</h1>

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
            <label for="resume" class="profil_title">Votre resumé / intérets (~20 mots):</label>
            <p><textarea maxlength="100" rows="3" class="form-control" id="message" placeholder="Entrez votre message"></textarea></p>
        </div>

    <form name="upload" action="download_img.php" method="POST" ENCTYPE="multipart/form-data">
        <div class="profil_title">Choisisez votre photo:</div>
        <p><input type="file" name="userfile"></p>
        <p></p><img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200"
                    src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzIwMHgyMDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTIxNzhjOTdiOSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1MjE3OGM5N2I5Ij48cmVjdCB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9Ijc1LjUiIHk9IjEwNC41Ij4yMDB4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+"
                    data-holder-rendered="true" style="width: 200px; height: 200px;"></p>

    </form>

        <button class="btn btn-primary">OK</button>
        <button class="btn btn-primary">Modifier</button>
    </div>



    <?php
    ?>
    <?php require_once 'view_parts/_footer.php'; ?></div>