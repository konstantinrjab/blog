<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 16.03.2018
 * Time: 19:07
 */

$page    = 'http://'.$_SERVER['SERVER_NAME'].$GLOBALS['PATH_TO_ROOT_Directory_Project'].'/main/';
$last    = $data['pagination']['last'];
$current = $data['pagination']['current'];
?>

<nav class="m-auto pt-3">
  <ul class="pagination">
	  <?php if ($current != 1) : ?>
        <li class="page-item">
          <a class="page-link"
             href="<?php echo $page.($current-1); ?>">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>

        <li class="page-item">
          <a class="page-link" href="<?php echo $page.'1'; ?>">1</a>
        </li>
		  <?php if ($current > 2) : ?>
          <li class="page-item">
            <a class="page-link"
               href="<?php echo $page.($current-1); ?>"><?= $current-1 ?></a>
          </li>
		  <?php endif; ?>
	  <?php endif; ?>

    <li class="page-item active">
      <a class="page-link"
         href="<?php echo $page.$current; ?>"><?= $current ?></a>
    </li>

	  <?php if ($current != $last) : ?>

		  <?php if ($current != ($last-1)) : ?>
          <li class="page-item">
            <a class="page-link"
               href="<?php echo $page.($current+1); ?>"><?= $current+1 ?></a>
          </li>
		  <?php endif; ?>

        <li class="page-item">
          <a class="page-link"
             href="<?php echo $page.$last; ?>">
			  <?php echo $last; ?></a>
        </li>
        <li class="page-item">
          <a class="page-link" href="<?php echo $page.($current+1); ?>">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
	  <?php endif; ?>

  </ul>
</nav>
