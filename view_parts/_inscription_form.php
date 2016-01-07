<?php
require_once  '_defines.php';
require_once 'data/_main_data.php';

//var_dump($_POST);
$in_post = array_key_exists('register', $_POST);

//Validation PSEUDO
$username_ok = false;
$username_msg = '';
if (array_key_exists('username', $_POST)) {
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_MAGIC_QUOTES);
  $username = filter_var($username, FILTER_SANITIZE_STRING);

  $username_ok = (1 === preg_match('/^[A-Za-z0-9]{2,}$/', $username));

  if (!$username_ok) {
    $username_msg = 'Attention !! Le nom ne doit contenir que des caractères alphabétiques et numériques (min 4)';
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
    $courriel_msg = 'Attention !! Le courriel doit contenir un @ et se terminer pour un herbergeur de courriel valide.';
  }

}



//Validation AGE
$age_ok = false;
$age_msg = '';
if (array_key_exists('age', $_POST)) {
  $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_MAGIC_QUOTES);
  $age = filter_var($age, FILTER_SANITIZE_STRING);


  $age_ok = (1 === preg_match('/^[0-9]{2,3}$/', $age));
  if (!$age_ok) {
    $age_msg = 'Attention !! L\'age ne doit contenir que nombres (min 2, max 3)';
  }

}

//Validation PASSWORD
$password_ok = false;
$password_msg = '';
if (array_key_exists('password', $_POST)) {
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_MAGIC_QUOTES);
  $password = filter_var($password, FILTER_SANITIZE_STRING);


  $password_ok = (1 === preg_match('/^[A-Za-z0-9]{4,}$/', $password));
  if (!$password_ok) {
    $password_msg = 'Attention !! Le mot de passe doit contenir que des caractères alphabétiques et numériques (min 4)';
  }


}
//Validation GENRE
$sex_msg='';
$sex_ok=false;
if  (array_key_exists('sex', $_POST) && ($_POST['sex'] =='sex_non_selectionee')){
    $sex_msg='Voullez selectioner votre genre';
    $sex_ok=false;
}else {
    $sex_msg='';
    $sex_ok=true;
}


//Validation ORIENTATION
$orientation_msg='';
$orientation_ok=false;
if  (array_key_exists('orientation', $_POST) && ($_POST['orientation'] =='orientation non_selectionee')){
    $orientation_msg='Veuillez selectioner votre orientation';
    $orientation_ok=false;
}else {
    $orientation_msg='';
    $orientation_ok=true;
}


if ($age_ok && $courriel_ok && $username_ok && $password_ok && $age_ok && $orientation_ok == true) {
  // On enregistre les données et s'en vaa sur une autre page
    header( "refresh:5;url=profil.php" );
    echo '<div class="alert alert-success" role="alert">
        <strong>Well done!</strong> You successfully read this important alert message.
      </div>';
}


?>
  <div id="main">
    <div class="container">
      <h2>Formulaire d'inscription</h2>
      <div class="well">
        <strong>
          IMPORTANT !!
        </strong>
        <div>
          <strong>Pseudonyme:</strong> Doit contenir des lettres et des nombres au minimum de 2 caracteres.<br>
            <strong>Courriel:</strong> Doit contenir un @ et se terminer pour un herbergeur de courriel valide.<br>
          <strong>Mot de passe:</strong> Doit contenir des lettres et des nombres au minimum de 4 caracteres.<br>
            <span style="color: red; font-size: 8pt">* Les champs obligatoires</span>


        </div>
      </div>


      <form role="form" name="inscription" action="#" method="post">


        <div class="form-group">
          <label for="username">* Pseudo</label>
          <input type="text" class="form-control" name="username"
                 value="<?php echo array_key_exists('username', $_POST) ? $_POST['username'] : '' ?>"
                 placeholder="pseudo"/>
        <h6 class="msg_error"><?php echo $username_msg ?></h6>
          </div>

        <div class="form-group">
        <label for="courriel">* Email</label>
          <input type="text" class="form-control" name="courriel"
                 value="<?php echo array_key_exists('courriel', $_POST) ? $_POST['courriel'] : '' ?>"
                 placeholder="courriel"/>
        <h6 class="msg_error"><?php echo $courriel_msg ?></h6>
</div>

        <div class="form-group">
        <label for="age">* Age</label>
          <input type="text" class="form-control" name="age"
                 value="<?php echo array_key_exists('age', $_POST) ? $_POST['age'] : '' ?>" placeholder="votre age"/>
        <h6 class="msg_error"><?php echo $age_msg ?></h6>
</div>
        <div class="form-group">
        <label for="password">* Mot de passe</label>
          <input type="password" class="form-control" name="password"
                 value="<?php echo array_key_exists('password', $_POST) ? $_POST['password'] : '' ?>"
                 placeholder="mot de passe"/>
        <h6 class="msg_error"><?php echo $password_msg ?></h6>
          </div>


        <div class="form-group">
          <label for="sex">* Votre genre:</label>
          <select class="form-control" id="sex" name="sex">
              <option
                  <?php echo (array_key_exists('sex',$_POST) && ($_POST['sex'] =='sex_non_selectionee')) ? ' selected="selected"' : '' ?>
                  value="sex_non_selectionee" >Non  séléctionée</option>
            <option
                <?php echo (array_key_exists('sex',$_POST) && ($_POST['sex'] =='homme')) ? ' selected="selected"' : '' ?>
                value="homme">Homme</option>
            <option
                <?php echo (array_key_exists('sex',$_POST) && ($_POST['sex'] =='femme')) ? ' selected="selected"' : '' ?>
                value="femme">Femme</option>
          </select>

          <h6 class="msg_error"><?php echo $sex_msg ?></h6>
</div>

             <div class="form-group">
        <label for="orientation">* Votre orientation sexuelle:</label>
          <select class="form-control" id="orientation" name="orientation">
            <option
                <?php echo (array_key_exists('orientation',$_POST) && ($_POST['orientation'] =='orientation non_selectionee')) ? ' selected="selected"' : '' ?>
                value="orientation non_selectionee">Non sélectionée</option>
            <option
                <?php echo (array_key_exists('orientation',$_POST) && ($_POST['orientation'] == 'bi')) ? ' selected="selected"' : '' ?>
                value="bi">Bisexuelle</option>
            <option
                <?php echo (array_key_exists('orientation',$_POST) && ($_POST['orientation'] == 'hetero')) ? ' selected="selected"' : '' ?>
                value="hetero">Hétérosexuel</option>
            <option
                <?php echo (array_key_exists('orientation',$_POST) && ($_POST['orientation'] == 'homo')) ? ' selected="selected"' : '' ?>
                value="homo">Homosexuel</option>
            <option
                <?php echo (array_key_exists('orientation',$_POST) && ($_POST['orientation'] == 'confi')) ? ' selected="selected"' : '' ?>
                value="confi">Confidentielle</option>
          </select>

            <h6 class="msg_error"><?php echo $orientation_msg ?></h6>
</div>

        <div class="form-group">
        <label for="region">Votre region:</label>
          <select class="form-control" id="region" name="region">
            <option value="region_non_selectionee">Non sélectionée</option>
            <option value="montreal">Montreal</option>
            <option value="laval">Laval</option>
            <option value="sud">Cote Sud</option>
            <option value="west">West Island</option>
            <option value="lachine">Lachine</option>
            <option value="lasalle">Lasalle</option>
          </select>
          </div>

        <div class="form-group">
        <label for="buts">Vos buts sur le reseau:</label>
          <select class="form-control" id="buts" name="buts">
            <option value="aucun_buts_selectiones">Non sélectionée</option>
            <option value="amour">Amour</option>
            <option value="rencontre">Rencontre</option>
            <option value="sex">Sex</option>
            <option value="ami">Amitié</option>
            <option value="sans_but">Sans but précis</option>
          </select>
          </div>


        <div class="form-group">
        <label for="resume">Votre resumé / intérets (~20 mots):</label>
        <p><textarea maxlength="100" rows="3" class="form-control" id="message" placeholder="Entrez votre message"></textarea></p>
          </div>

        <div class="checkbox">
          <label><input type="checkbox"> Souvenez-vous de moi</label>
        </div>

        <input type="submit" class="btn btn-primary" name="register" value="Sumettre"/>
          <!--<input type="submit" class="btn btn-primary">Soumettre</input>-->

      </form>







     <!-- <form role="form">
        <div class="form-group">
          <label for="prenom">Prénom:</label>
          <input type="text" class="form-control" id="prenom" placeholder="Entrer votre prénom">
        </div>
        <div class="form-group">
          <label for="nom">Nom:</label>
          <input type="text" class="form-control" id="nom" placeholder="Entrer votre nom">
        </div>
        <div class="form-group">
          <label for="sel1">Sex:</label>
          <select class="form-control" id="sel1">
            <option>Homme</option>
            <option>Femme</option>
          </select>
        </div>
        <div class="form-group">
          <label for="courriel">Courriel:</label>
          <input type="email" class="form-control" id="courriel" placeholder="Entrer un courriel">
        </div>
        <div class="form-group">
          <label for="pseudonyme">Pseudonyme:</label>
          <input type="text" class="form-control" id="pseudonyme" placeholder="Entrer un pseudonyme">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Entrer un mot de passe">
        </div>
        <div class="form-group">
          <label for="pwd_confirm">Password Confirmation:</label>
          <input type="password" class="form-control" id="pwd_confirm" placeholder="Confirmer votre mot de passe">
        </div>
        <div class="checkbox">
          <label><input type="checkbox"> Souvenez-vous de moi</label>
        </div>
        <button type="submit" class="btn btn-primary">Soumettre</button>
      </form>-->


    </div>





  </div>


