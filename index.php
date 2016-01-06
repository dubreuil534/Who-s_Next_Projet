<?php
require_once  '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Index';
require_once 'view_parts/_header.php';
require_once "view_parts/categorie_gauche.php";
require_once 'view_parts/description_index.php';
//require_once 'view_parts/slider_index.php'
?>


 <!-- <div> <?/*= $site_data[PAGE_ID] */?></div>-->

<?php require_once 'view_parts/_page_bottom.php'; ?>