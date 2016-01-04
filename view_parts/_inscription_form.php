<?php
require_once  '_defines.php';
require_once 'data/_main_data.php';
?>
  <div id="main">
    <div class="container">
      <h2>Formulaire d'inscription</h2>
      <div class="well">
        <strong>
          IMPORTANT !!
        </strong>
        <p><strong>Courriel:</strong> Doit contenir un @ et se terminer pour un herbergeur de courriel valide.<br>
          <strong>Pseudonyme:</strong> Doit contenir doit etre different de votre prenom ou de votre nom.<br>
          <strong>Mot de passe:</strong> Doit contenir au moin une majuscule et minimum de 8 caracteres.


        </p>
      </div>
      <form role="form">
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
        <div class="checkbox">
          <label><input type="checkbox"> Souvenez-vous de moi</label>
        </div>
        <button type="submit" class="btn btn-primary">Soumettre</button>
      </form>


    </div>





  </div>


