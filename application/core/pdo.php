<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 22.01.2018
 * Time: 18:18
 */

$pdo = new PDO('mysql:host=192.168.16.2;dbname=blog', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);