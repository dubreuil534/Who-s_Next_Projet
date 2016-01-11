<?php
require_once  'Server_Conf.php';
require_once '_defines.php';
session_start();
if(!empty($_SESSION["user"])) {
    $user = $_SESSION["user"];
}else{
    header('Location: alerte.php');}

require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Chat';
require_once 'view_parts/_header.php';
?>
<div id="main">

   <?php require_once 'view_parts/page_chat.php'; ?>

    <?php require_once 'view_parts/_footer.php'; ?>
</div>
