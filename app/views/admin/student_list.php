<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<a href="<?php echo site_url("admin/student/add")?>" class="ui button blue">新增學生</a>
<table class="table table-bordered datatable">
	<thead>
		<tr>
			<th>學號</th>
			<th>姓名</th>
			<th>線上練習帳號</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($students as $key => $student) {?>
		<tr>
			<td><?php echo $student->user_id?></td>
			<td><?php echo $student->user_name?></td>
			<td><?php echo $student->oj_acc?></td>
			<td>
				<a href="<?php echo site_url("admin/student/edit?id=".$student->user_id)?>">編輯</a>
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
