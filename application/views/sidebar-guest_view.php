<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 14.02.2018
 * Time: 10:41
 */
?>

<div class="sidebar">
    <p class="lead">Sign in</p>
	<?php include "info-window.php"; ?>
    <form method="post">
        <div class="form-group">
            <label for="login">Email address</label>
            <input type="text" name="login" class="form-control" id="login" placeholder="Login">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <input type="submit" class="btn btn-primary" value="Sign In" name="signin">
        <a href="signup" class="btn btn-primary">Sign Up</a>
    </form>
</div>