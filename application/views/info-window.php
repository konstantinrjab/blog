<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 23.02.2018
 * Time: 18:06
 */

if (isset($data['flash']['error'])) : ?>
	<p class="lead text-danger mt-3"><?php echo $data['flash']['error']; ?></p>
<?php endif; ?>
	<?php if (isset($data['flash']['message'])) : ?>
	<p class="lead text-success mt-3"><?php echo $data['flash']['message']; ?></p>
<?php endif; ?>