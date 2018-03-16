<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 16.03.2018
 * Time: 19:07
 */

$page = 'http://'.$_SERVER['SERVER_NAME'].'/main/';

//print_r($data['pagination']);
?>

<nav class="m-auto pt-3">
  <ul class="pagination">
	  <?php if ($data['pagination']['current'] != 1) : ?>
        <li class="page-item">
          <a class="page-link"
             href="<?php echo $page.($data['pagination']['current']-1); ?>">Previous</a>
        </li>
	  <?php endif; ?>
    <li class="page-item">
      <a class="page-link" href="<?php echo $page.'1'; ?>">1</a>
    </li>
    <li class="page-item">
      <a class="page-link"
         href="<?php echo $page.$data['pagination']['current']; ?>"><?= $data['pagination']['current'] ?></a>
    </li>
    <li class="page-item">
      <a class="page-link"
         href="<?php echo $page.$data['pagination']['last']; ?>">
		  <?php echo $data['pagination']['last']; ?></a>
    </li>
	  <?php if ($data['pagination']['current'] != $data['pagination']['last']) : ?>
        <li class="page-item">
          <a class="page-link" href="<?php echo $page.($data['pagination']['current']+1); ?>">Next</a>
        </li>
	  <?php endif; ?>

  </ul>
</nav>
