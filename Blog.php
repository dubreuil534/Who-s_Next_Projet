<?php
include("Server_Conf.php");
session_start();
if(!empty($_SESSION["user"])) {
    $user = $_SESSION["user"];
}else{
    header('Location: alerte.php');}
require_once  '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Blog';
require_once 'view_parts/_header.php';
?>
<div id="main">

   <?php require_once 'view_parts/page_blog.php'; ?>

    <?php require_once 'view_parts/_footer.php'; ?>
</div>
