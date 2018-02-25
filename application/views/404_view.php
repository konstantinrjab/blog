<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:33
 */

$model = new Model($pdo);
$data['flash'] = $model->checkFlash();
include "info-window.php";
