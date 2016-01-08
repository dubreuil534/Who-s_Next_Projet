<?php
session_start();
require_once  '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'FEMMES' ;
require_once 'view_parts/_header.php';
require_once "view_parts/categorie_gauche.php";
echo '<h2 class="recherche">recherche TOUS - 6 résultats:</h2>';
require_once 'view_parts/_tous_result.php';
?>


    <!-- <div> <?/*= $site_data[PAGE_ID] */?></div>-->

<?php require_once 'view_parts/_page_bottom.php'; ?>