<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:34
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="<?= $GLOBALS['PATH_TO_ROOT_Directory_Project'] ?>/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="<?= $GLOBALS['PATH_TO_ROOT_Directory_Project'] ?>/css/custom.css"/>
  <link rel="stylesheet" href="<?= $GLOBALS['PATH_TO_ROOT_Directory_Project'] ?>/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="<?= $GLOBALS['PATH_TO_ROOT_Directory_Project'] ?>/favicon.ico" type="image/x-icon">
  <title>Blog</title>
</head>
<body class="mt-3">
<!--menu-->
<header class="container">
  <div class="row">
    <div class="col-12">
      <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <?php if ( $GLOBALS['PATH_TO_ROOT_Directory_Project'] == ''){
          $href = '/';
        } else {
          $href =  $GLOBALS['PATH_TO_ROOT_Directory_Project'];
        }?>
        <a class="navbar-brand" href="<?=$href ?>">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'].$GLOBALS['PATH_TO_ROOT_Directory_Project'] ?>">Home
                <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
			  <?php if (isset($_SESSION['user']['position']) && $_SESSION['user']['position'] == 'admin') : ?>
                <li class="nav-item">
                  <a href="http://<?= $_SERVER['SERVER_NAME'].$GLOBALS['PATH_TO_ROOT_Directory_Project'] ?>/admin"
                     class="nav-link">Admin panel</a>
                </li>
			  <?php endif; ?>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</header>
<!--page-->
<div class="container">
	<?php include 'application/views/'.$content_view; ?>
</div>
<!--footer-->
<footer class="mt-3 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <p class="text-center m-1">Blog</p>
      </div>
    </div>
  </div>
</footer>
</body>
<script src="<?= $GLOBALS['PATH_TO_ROOT_Directory_Project']?>/js/jquery-3.3.1.min.js"></script>
<script src="<?= $GLOBALS['PATH_TO_ROOT_Directory_Project']?>/js/bootstrap.bundle.min.js"></script>
<script src="<?= $GLOBALS['PATH_TO_ROOT_Directory_Project']?>/js/main.js"></script>
</html>
