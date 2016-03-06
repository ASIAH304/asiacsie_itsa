<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<hr>
<table class="table table-bordered team">
	<thead>
		<tr>
			<th>隊名</th>
			<th>隊員</th>
			<th>排名</th>
			<th>解題題數</th>
			<th>解題時間(分鐘)</th>
			<th>指導教練</th>
			<th>備註</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($teams as $key => $team) {?>
		<tr>
			<td class="text-center">
				<?php echo $team->team_name?>
			</td>
			<td>
				<p><?php echo element($team->team_user1, $user_name, $team->team_user1);?></p>
				<p><?php echo element($team->team_user2, $user_name, $team->team_user2);?></p>
				<p><?php echo element($team->team_user3, $user_name, $team->team_user3);?></p>
			</td>
			<td class="text-center">
				<?php echo $team->team_rank?>
			</td>
			<td class="text-center">
				<?php echo $team->team_solved?>
			</td>
			<td class="text-center">
				<?php echo $team->team_time?>
			</td>
			<td class="text-center">
				<?php echo $team->team_teacher?>
			</td>
			<td class="text-center">
				<?php echo $team->tean_note?>
			</td>
		</tr>
		<?php }?>
	</tbody>
</table>