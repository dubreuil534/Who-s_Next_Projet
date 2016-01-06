<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= SITE_NAME . ' - ' . $site_data[PAGE_ID]?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css" />

  <script>
    jQuery(function($) {
      $('.slider').sss();
    });
  </script>
</head>
<body>
<div id="wrapper">  <!--ouverture de wrapper-->
<?php require_once '_header.php'; ?>

