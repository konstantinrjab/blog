<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:33
 */
?>

<!--search-->
<? include('search-bar_view.php') ?>
<!--articles-->
<div class="row">
    <div class="col-md-3 order-md-2">
		<?php if ($_SESSION['auth']) {
			include('sidebar-auth_view.php');
		} else {
			include('sidebar-guest_view.php');
		}
		?>
    </div>
    <div class="col-md-9 order-md-1">
        <h1>Articles</h1>

		<?php foreach ($data['articles'] as $article) : ?>

			<?php
			$article['intro'] = true;
			include('article_view.php'); ?>
		<?php endforeach; ?>

    </div>
</div>