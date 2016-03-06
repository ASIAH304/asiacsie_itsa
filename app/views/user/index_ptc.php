<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel-group panel-accordion" id="accordion_ptc" role="tablist">
	<div class="panel panel-warning">
		<div class="panel-heading" role="tab">
			<h4 class="panel-title">
				<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_ptc" href="#ptc">
					PTC 競賽紀錄
				</a>
			</h4>
		</div>
		<div id="ptc" class="panel-collapse collapse" role="tabpanel">
			<div class="panel-body">
				<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>競賽</th>
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
						<?php foreach ($history_ptc as $key => $team) {?>
						<tr>
							<td>
								<a href="<?php echo site_url("context/detail/".$team->itsa_id)?>">
									<?php echo context_name($team->itsa_type,$team->itsa_th,$team->itsa_date)?>
								</a>
							</td>
							<td>
								<?php echo $team->team_rank?>
							</td>
							<td>
								<?php echo $team->team_name?>
							</td>
							<td>
								<a<?php if($user->user_id == $team->team_user1){?> class="text-bold text-success"<?php }?> href="<?php echo site_url("user/index/".$team->team_user1)?>">
									<?php echo element($team->team_user1, $user_name, $team->team_user1);?>
								</a>
								<?php if( !is_null($team->team_user2) ){?>
								<br>
								<a<?php if($user->user_id == $team->team_user2){?> class="text-bold text-success"<?php }?> href="<?php echo site_url("user/index/".$team->team_user2)?>">
									<?php echo element($team->team_user2, $user_name, $team->team_user2);?>
								</a>
								<?php }?>
								<?php if( !is_null($team->team_user3) ){?>
								<br>
								<a<?php if($user->user_id == $team->team_user3){?> class="text-bold text-success"<?php }?> href="<?php echo site_url("user/index/".$team->team_user3)?>">
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
			</div>
		</div>
	</div>
</div>
