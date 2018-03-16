<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 14.02.2018
 * Time: 10:41
 */
?>

<div class="sidebar mt-3 p-3 bg-light">
    <p class="lead">Welcome, <?= $data['user']['name'] ?></p>
	<?php include "info-window.php"; ?>
    <form method="post">
        <input type="submit" class="btn btn-primary" name="logout" id="logout" value="Log out">
    </form>
</div>