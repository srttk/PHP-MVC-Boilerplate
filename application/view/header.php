<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo (!empty($page_title)) ? $page_title.' - '.SITE_NAME : SITE_NAME; ?></title>
<meta name="description" content="<?php echo $page_description; ?>">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0">
  
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/style.css">

</head>
<body>
    
<div class="navbar navbar-inverse navbar-static-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="brand" href="/">PHP MVC Boilerplate</a>
        <?php loadWidget('navigation'); ?>
    </div>
  </div>
</div>
    
<div class="container">