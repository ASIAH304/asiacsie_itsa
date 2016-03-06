<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="jumbotron">
	<h1>
		<?php echo $user->user_id?> <?php echo $user->user_name?> 參賽紀錄
	</h1>
	<a class="ui primary button disabled" href="#"><i class="fa fa-file-word-o"></i> 匯出參賽紀錄</a>
	<a class="ui teal button" href="javascript:window.print();" ><i class="fa fa-print"></i> 列印參賽紀錄</a>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading text-center text-bold">競賽統計</div>
			<table class="table table-bordered text-center table-hover">
				<thead>
					<tr>
						<th></th>
						<th>
							<?php echo context_type_short(1)?>
						</th>
						<th>
							<?php echo context_type_short(2)?>
						</th>
						<th>
							<?php echo context_type_short(3)?>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>參賽次數</th>
						<td class="success">
							<?php echo count($history_itsa)?>
						</td>
						<td class="warning">
							<?php echo count($history_ptc)?>
						</td>
						<td class="danger">
							<?php echo count($history_cpe)?>
						</td>
					</tr>
					<tr>
						<th>解題數</th>
						<td class="success">
							<?php echo get_sum_solved($history_itsa)?>
						</td>
						<td class="warning">
							<?php echo get_sum_solved($history_ptc)?>
						</td>
						<td class="danger">
							<?php echo get_sum_solved($history_cpe)?>
						</td>
					</tr>
					<tr>
						<th>最佳解題數</th>
						<td class="success">
							<?php echo get_max($history_itsa)?>
						</td>
						<td class="warning">
							<?php echo get_max($history_ptc)?>
						</td>
						<td class="danger">
							<?php echo get_max($history_cpe)?>
						</td>
					</tr>
					<tr>
						<th>最佳排名</th>
						<td class="success">
							<?php echo get_min_rank($history_itsa)?>
						</td>
						<td class="warning">
							<?php echo get_min_rank($history_ptc)?>
						</td>
						<td class="danger">
							<?php echo get_min_rank($history_cpe)?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-6">
		<div class="ui inverted segment">
			<div class="ui inverted statistic yellow">
				<div class="label">
					線上解題
				</div>
				<div class="value">
					<?php echo count($solves)?>
				</div>
			</div>
			<div class="ui inverted statistic yellow">
				<div class="label">
					參賽次數
				</div>
				<div class="value">
					<?php echo ( count($history_itsa)+count($history_ptc)+count($history_cpe) )?>
				</div>
			</div>
			<div class="ui inverted statistic">
				<div class="label">
					獎章
				</div>
				<div class="value">
					<?php echo get_medal($user->user_id,$history_itsa,$history_ptc,$history_cpe,$solves)?>
				</div>
			</div>
		</div>
	</div>
</div>

