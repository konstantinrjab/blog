<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 20:31
 */
?>

<div class="row">
    <div class="col-12">
        <h2>Sign Up page!</h2>
		<?php if (isset($data['$error'])) : ?>
            <p class="lead text-danger"><?php echo $data['$error']; ?></p>
		<?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="name">Nickname</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="You name">
            </div>
            <div class="form-group">
                <label for="login">Email address</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="Login">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
</div>
