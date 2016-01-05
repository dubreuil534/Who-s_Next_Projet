<?php
require_once  '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Index';
require_once 'view_parts/_header.php';
?>
<div id="main"></div>

<?php


?>
<div id="search_bar" style="padding:20px;">
  <form class="form-search form-inline">
    <div class="input-group">
      <input type="text" class="form-control search-query" placeholder="Search..." /> <span class="input-group-btn">
            <button type="submit" class="btn btn-primary"> Search</button>
            </span>

    </div>
  </form>
</div>

  <div> <?= $site_data[PAGE_ID] ?></div>

<?php require_once 'view_parts/_page_bottom.php'; ?>
