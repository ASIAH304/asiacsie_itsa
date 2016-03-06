<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="table-responsive">
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>日期</th>
			<th>解題數</th>
			<th>積分</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($csie_teams as $key => $team) {?>
		<tr>
			<td><?php echo $team->pr_date?></td>
			<td><?php echo $team->pr_solve?></td>
			<td>計算中...</td>
		</tr>
		<?php }?>
	</tbody>
</table>
</div>