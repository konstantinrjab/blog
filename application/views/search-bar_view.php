<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 27.02.2018
 * Time: 12:24
 */
?>

<!--search-->
<div class="row">
    <div class="col-12">
        <form action="search/article">
            <div class="mt-4 input-group mb-3 bg-light">
                <input type="text" class="form-control" placeholder="Article title" aria-describedby="basic-addon2"
                       name="search-title">
                <input type="date" class="date-select" placeholder="Date" aria-describedby="basic-addon2"
                       name="search-date">
                <div class="input-group-append">
                    <!-- <i class="fa fa-search" aria-hidden="true"></i>-->
                    <input class="btn btn-outline-secondary" type="submit" value="1" name="search">
                </div>
            </div>
        </form>
    </div>
</div>