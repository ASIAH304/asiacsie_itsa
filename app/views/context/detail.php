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
				<i class="fa fa-thumbs-up fa-lg"></i> 進階級
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
			<td class="text-center">2</td>
			<td class="text-center">0</td>
			<td class="text-center"><?php echo $context->team_num?></td>
			<td class="text-center">0 / <?php echo $context->exam_num?></td>
			<td class="text-center">0 / <?php echo $context->exam_num?></td>
		</tr>
	</tbody>
</table>
</div>

<?php sp($context)?>
<?php sp($teams)?>
<div class="bs-divider">參賽人員</div>