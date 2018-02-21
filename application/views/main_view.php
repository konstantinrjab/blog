<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:33
 */
?>
<div class="row">
    <div class="col-md-3 order-md-2">
        <?php if ($data['sidebar'] == 'auth') {
	        include ('sidebar-auth_view.php');
        } else {
	        include ('sidebar-guest_view.php');
        }
        ?>
    </div>
    <div class="col-md-9 order-md-1">
        <h1>Articles</h1>

        <?php foreach ( $data['articles'] as $article ) : ?>

            <div class="article">
                <div class="header">
                    <h3 class="title"><?= $article['title'] ?></h3>
                    <p class="date d-inline">Published: <?= $article['date'] ?>; </p>
                    <p class="author d-inline">Author: <?= $article['name'] ?>; </p>
                    <p class="tag d-inline">Tags:
                        <?php foreach($article['tag'] as $tag) {
                            echo $tag['tag_name'].', ';
                        }?>
                    </p>
                </div>
                <div class="body">
                    <p><?= $article['text'] ?></p>
                </div>
            </div>
		<?php endforeach; ?>

    </div>

</div>