<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="ui segment">
	<h4 class="ui header"><?php echo $context->title?></h4>
	<p>開始時間: <?php echo $context->start_time?></p>
	<p>結束時間: <?php echo $context->end_time?></p>
	<p><?php echo $context->description?></p>
</div>