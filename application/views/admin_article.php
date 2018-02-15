<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:33
 */
?>
<div class="row">
    <div class="col-12">
        <form method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="tag">Tags</label>
                <input type="text" class="form-control" id="tag" name="tag">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea class="form-control" id="text" name="text" rows="10"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" placeholder="Add">
        </form>

    </div>

</div>