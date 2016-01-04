<?php
require_once  '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Index';
require_once 'view_parts/_header.php';
?>
<div id="main"></div>

<?php


?>

  <div> <?= $site_data[PAGE_ID] ?></div>

<?php require_once 'view_parts/_page_bottom.php'; ?>