<?php
session_start();
require_once  '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Contactez-nous';
require_once 'view_parts/_header.php';
require_once "view_parts/categorie_gauche.php";
?>
    <div id="main"></div>

<?php
require_once 'view_parts/_contact_form.php';
require_once 'view_parts/_page_bottom.php'; ?>