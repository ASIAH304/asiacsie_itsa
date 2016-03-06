<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="jumbotron">
	<h1>
		<?php echo context_name($context->itsa_type,$context->itsa_th,$context->itsa_date)?>
	</h1>
	<div class="ui button <?php echo $context->exam_class?>"><?php echo $context->exam_name?></div>
	<a href="<?php echo $context->exam_website?>" class="ui blue button" target="_blank">
		<i class="fa fa-bookmark"></i> 競賽網站
	</a>
</div>
<div class="bs-divider">本次競賽資訊</div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th class="text-center">
				<i class="fa fa-calendar fa-lg"></i> 競賽日期
			</th>
			<th class="text-center">
				<i class="fa fa-building-o fa-lg"></i> 地點
			</th>
			<th class="text-center">
				<i class="fa fa-users fa-lg"></i> 參賽隊數
			</th>
			<th class="text-center">
				<i class="fa fa-thumbs-up fa-lg"></i> 績優團隊
			</th>
			<th class="text-center">
				<i class="fa fa-user-secret fa-lg"></i> 總參賽隊(人)數
			</th>
			<th class="text-center">
				<i class="fa fa-star fa-lg"></i> 平均解題數
			</th>
			<th class="text-center">
				<i class="fa fa-thumbs-o-up fa-lg"></i> 最佳解題數
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="text-center"><?php echo $context->itsa_date?></td>
			<td class="text-center"><?php echo $context->itsa_place?></td>
			<td class="text-center"><?php echo count($teams)?></td>
			<td class="text-center"><?php echo get_good($context->itsa_type,$teams)?></td>
			<td class="text-center"><?php echo $context->team_num?></td>
			<td class="text-center"><?php echo get_avg($teams)?> / <?php echo $context->exam_num?></td>
			<td class="text-center"><?php echo get_max($teams)?> / <?php echo $context->exam_num?></td>
		</tr>
	</tbody>
</table>
</div>
<div class="bs-divider">參賽人員</div>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>排名</th>
			<th>隊名</th>
			<th>隊員</th>
			<th>解題題數</th>
			<th>解題時間(分鐘)</th>
			<th>指導教練</th>
			<th>備註</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($teams as $key => $team) {?>
		<tr>
			<td>
				<?php echo $team->team_rank?>
			</td>
			<td>
				<?php echo $team->team_name?>
			</td>
			<td>
				<a href="<?php echo site_url("user/index/".$team->team_user1)?>">
					<?php echo element($team->team_user1, $user_name, $team->team_user1);?>
				</a>
				<?php if( !is_null($team->team_user2) ){?>
				<br>
				<a href="<?php echo site_url("user/index/".$team->team_user2)?>">
					<?php echo element($team->team_user2, $user_name, $team->team_user2);?>
				</a>
				<?php }?>
				<?php if( !is_null($team->team_user3) ){?>
				<br>
				<a href="<?php echo site_url("user/index/".$team->team_user3)?>">
					<?php echo element($team->team_user3, $user_name, $team->team_user3);?>
				</a>
				<?php }?>
			</td>
			<td>
				<?php echo $team->team_solved?>
			</td>
			<td>
				<?php echo $team->team_time?>
			</td>
			<td>
				<?php echo element($team->team_teacher, $teacher_name, $team->team_teacher);?>
			</td>
			<td>
				<?php echo itsa_level($team->team_solved)?>
				<?php echo $team->tean_note?>
			</td>
		</tr>
		<?php }?>
	</tbody>
</table>
</div>