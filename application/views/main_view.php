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
        <div class="sidebar">
            <p class="lead">Sign in</p>
			<?php if(isset($login_error)) : ?>
                <p class="text-danger"><?php echo $login_error;?></p>
			<?php endif; ?>
            <form method="post" action="">
                <div class="form-group">
                    <label for="login">Email address</label>
                    <input type="text" name="login" class="form-control" id="login" placeholder="Login">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <input type="submit" class="btn btn-primary" value="Sign In">
                <a href="signup" class="btn btn-primary">Sign Up</a>
            </form>
        </div>
    </div>
    <div class="col-md-9 order-md-1">
        <h1>Articles</h1>

        <?php foreach ( $data as $article ) : ?>

            <div class="article">
                <div class="header">
                    <h3 class="title"><?= $article['title'] ?></h3>
                    <p class="date d-inline">Published: <?= $article['date'] ?>; </p>
                    <p class="author d-inline">Author: <?= $article['name'] ?>; </p>
                    <p class="tag d-inline">Tags: first article</p>
                </div>
                <div class="body">
                    <p><?= $article['text'] ?></p>
                </div>
            </div>
		<?php endforeach; ?>

    </div>

</div>