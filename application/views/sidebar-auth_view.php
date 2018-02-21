<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 14.02.2018
 * Time: 10:41
 */
?>

<div class="sidebar">
    <p class="lead">Welcome, <?= $data['user']['name'] ?></p>
    <form method="post">
        <input type="submit" class="btn btn-primary" name="logout" id="logout" value="Log out">
    </form>
</div>