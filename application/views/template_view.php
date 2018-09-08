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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css"
        href="/css/bootstrap.min.css"/>
  <link rel="stylesheet"
        href="/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <title>Blog</title>
</head>
<body class="pt-3 bg-light pb-5">
<!--menu-->
<div class="container-well border-bottom">
  <header class="container">
    <div class="row">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light pb-3">
          <a class="navbar-brand" href="/">Blog</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link"
                   href="http://<?= $_SERVER['SERVER_NAME'] ?>">Home
                  <span class="sr-only">(current)</span></a>
              </li>

                <?php if (isset($_SESSION['user']['position']) && $_SESSION['user']['position'] == 'admin') : ?>
                  <li class="nav-item">
                    <a href="http://<?= $_SERVER['SERVER_NAME'] ?>/admin"
                       class="nav-link">Admin panel</a>
                  </li>
                <?php endif; ?>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>
</div>
<!--page-->
<div class="container">
    <?php include 'application/views/'.$content_view; ?>
</div>
<!--footer-->
<footer class="bg-light border-top mt-4 position-fixed w-100" style="bottom: 0; z-index: 2;">
  <div class="container" style="bottom: 0;">
    <div class="row">
      <div class="col-12">
        <p class="text-center m-1">Blog 2018</p>
      </div>
    </div>
  </div>
</footer>
</body>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/main.js"></script>
</html>
