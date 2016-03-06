<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>競賽名稱</th>
			<th>開始時間</th>
			<th>結束時間</th>
			<th>敘述</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($contexts as $key => $context) {?>
		<tr>
			<td>
				<a href="<?php echo site_url("admin/ojcontext/view?id=".$context->contest_id)?>"><?php echo $context->title?></a>
			</td>
			<td><?php echo $context->start_time?></td>
			<td><?php echo $context->end_time?></td>
			<td><?php echo $context->description?></td>
		</tr>
		<?php }?>
	</tbody>
</table>
