<?php
session_start();
require_once  '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Inscription';
require_once 'view_parts/_header.php';
require_once "view_parts/categorie_gauche.php";
?>
<div id="main">

<?php

?>
<?php require_once 'view_parts/_inscription_form.php'; ?>
<?php require_once 'view_parts/_footer.php'; ?></div>
