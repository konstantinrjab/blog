<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:33
 */
?>
<? include('search-bar_view.php') ?>
<!--articles-->
<div class="row">
    <div class="col-12">
        <h1>Search</h1>

		<?php
		if ($data['articles']) {
			foreach ($data['articles'] as $data['article']) : ?>

				<?php
				$data['article']['intro'] = true;
				include('article_view.php'); ?>
			<?php endforeach;
		} else {
			echo 'Empty';
		} ?>

    </div>
</div>