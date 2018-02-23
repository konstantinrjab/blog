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
	<?php if (isset($data['flash']['error'])) : ?>
        <p class="lead text-danger"><?php echo $data['flash']['error']; ?></p>
	<?php endif; ?>
	<?php if (isset($data['flash']['message'])) : ?>
        <p class="lead text-success"><?php echo $data['flash']['message']; ?></p>
	<?php endif; ?>
    <form method="post">
        <input type="submit" class="btn btn-primary" name="logout" id="logout" value="Log out">
    </form>
</div>