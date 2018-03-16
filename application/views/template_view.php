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
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/custom.css"/>
    <link rel="stylesheet" href="/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--    <link rel="icon" href="favicon.ico" type="image/x-icon">-->
    <title>Главная</title>
</head>
<body class="mt-3">
<!--menu-->
<header class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                <a class="navbar-brand" href="../">Blog 2</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="http://<?= $_SERVER['SERVER_NAME'] ?>">Home
                                <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
						<?php if ($_SESSION['user']['position'] == 'admin') : ?>
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
<!--page-->
<div class="container">
	<?php include 'application/views/'.$content_view; ?>
</div>
<!--footer-->
<footer class="container mt-3 bg-light">
    <div class="row">
        <div class="col-12">
            <p class="text-center m-1">Blog 2</p>
        </div>
    </div>
</footer>
</body>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/main.js"></script>
</html>
