<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<a href="<?php echo site_url("admin/context/add")?>" class="ui button blue">新增競賽資料</a>
<table class="table table-bordered datatable">
	<thead>
		<tr>
			<th>#</th>
			<th>程式競賽</th>
			<th>競賽日期</th>
			<th>競賽類別</th>
			<th>地點</th>
			<th>總參賽隊(人)數</th>
			<th>題數</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($contexts as $key => $context ){?>
		<tr>
			<td>
				<?php echo $context->itsa_id?>
			</td>
			<td>
				<?php echo context_name($context->itsa_type,$context->itsa_th,$context->itsa_date)?>
			</td>
			<td>
				<?php echo $context->itsa_date?>
			</td>
			<td>
				<?php echo context_type_short($context->itsa_type)?>
			</td>
			<td>
				<?php echo $context->itsa_place?>
			</td>
			<td>
				<?php echo $context->team_num?>
			</td>
			<td>
				<?php echo $context->exam_num?>
			</td>
			<td>
				<a class="btn btn-primary btn-xs" href="<?php echo site_url("admin/context/edit?id=".$context->itsa_id)?>">編輯競賽</a>
				<a class="btn btn-success btn-xs" href="<?php echo site_url("admin/context/team?id=".$context->itsa_id)?>">編輯隊伍</a>
				<a class="btn btn-info btn-xs" href="<?php echo site_url("context/detail/".$context->itsa_id)?>" target="_blank">查看</a>
			</td>
		</tr>
		<?php }?>
	</tbody>
</table>
<script>
$(function() {
	$('.datatable').dataTable( {
		"order": [[ 0, "asc" ]],
		columnDefs: [
			{ orderable: false, "targets": -1 },
		],
		stateSave: true,
        "language": {
            "lengthMenu": "每頁顯示 _MENU_ 筆資料",
            "zeroRecords": "找不到學生",
            "info": "第 _PAGE_ 頁，共 _PAGES_ 頁",
            "infoEmpty": "目前尚無任何學生",
            "infoFiltered": "(filtered from _MAX_ total records)",
			"loadingRecords": "載入中...",
			"processing":     "處理中...",
			"search":         "學生資料搜尋：",
			"paginate": {
				"first":      "首頁",
				"last":       "最後一頁",
				"next":       "下一頁",
				"previous":   "上一頁"
			},
        }
    } );
});
</script>
