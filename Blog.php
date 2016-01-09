<?php
require_once  '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Blog';
require_once 'view_parts/_header.php';
?>
<div id="main">

   <?php require_once 'view_parts/page_blog.php'; ?>

    <?php require_once 'view_parts/_footer.php'; ?>
</div>
