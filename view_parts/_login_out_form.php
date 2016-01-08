<?php
// Réception des données du formulaire de login/logout
$username = null;
$password = null;
if(array_key_exists('dologin', $_POST)
    && array_key_exists('username', $_POST)
    && array_key_exists('password', $_POST)){
    require_once ("db/_user.php");
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    if(user_authenticate($username, $password)){
        do_login($username);
    }else{} //TODO BLALA

}elseif(array_key_exists('dologout', $_POST)){
    do_logout(); // On le deconnect
    header('location' . HOME_PAGE);
}



?>

