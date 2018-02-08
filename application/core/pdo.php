<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 22.01.2018
 * Time: 18:18
 */

$pdo = new PDO('mysql:host=localhost;dbname=blog2', 'root', '');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);