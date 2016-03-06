<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel-group panel-accordion" id="accordion_oj" role="tablist">
	<div class="panel panel-info">
		<div class="panel-heading" role="tab">
			<h4 class="panel-title">
				<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_oj" href="#oj">
					線上解題紀錄
				</a>
			</h4>
		</div>
		<div id="oj" class="panel-collapse collapse" role="tabpanel">
			<div class="panel-body">
				<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>題目</th>
							<th>解題時間</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($solves as $key => $solve) {?>
						<tr>
							<td>
								<span class="badge"><?php echo $solve->problem_id?></span>
								<?php echo $solve->title?>
							</td>
							<td><?php echo $solve->in_date?></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>