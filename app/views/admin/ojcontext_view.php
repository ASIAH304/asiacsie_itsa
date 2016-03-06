<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<table class="table table-bordered datatable">
	<thead>
		<tr>
			<th>學號</th>
			<th>姓名</th>
			<th>解題數</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $key => $user) {?>
		<tr>
			<td>
				<?php $user_info = explode("@", $user->email);echo $user_info[0]?>
			</td>
			<td><?php echo $user->nick?></td>
			<td><?php echo $user->usv?></td>
		</tr>
		<?php }?>
	</tbody>
</table>
<script>
$(function() {
	$('.datatable').dataTable( {
		"order": [[ 0, "asc" ]],
		dom: 'Bfrtip',
		buttons: [
			{
                extend: 'excelHtml5',
                text: '匯出 excel 檔',
                className: 'ui button green'
            },
            {
                extend: 'csvHtml5',
                text: '匯出 csv 檔',
                className: 'ui button teal'
            }
        ],
        "language": {
            "lengthMenu": "每頁顯示 _MENU_ 筆資料",
            "zeroRecords": "找不到資料",
            "info": "第 _PAGE_ 頁，共 _PAGES_ 頁",
            "infoEmpty": "目前尚無任何資料",
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