<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<a href="<?php echo base_url();?>admin/context/new" class="ui basic button blue"><i class="add circle icon"></i> 新增競賽資訊</a>
<table class="ui celled striped table">
	<thead>
		<tr>
			<th style="width: 60%">程式競賽</th>
			<th style="width: 10%">參賽隊數</th>
			<th style="width: 30%">操作</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($exam_th as $key => $th) {?>
		<tr>
			<td>
				<a href="<?php echo base_url();?>context/detail/<?php echo $th['itsa_id']?>" target="_blank">
				<?php
					switch($th['itsa_type']){
						case 1:
							$itsa_class="";
							$itsa_type='<div class="ui teal horizontal label">ITSA</div>'."第 ".$th['itsa_th']." 次競賽";
						break;
						case 2:
							$itsa_class="";
							$itsa_type='<div class="ui orange horizontal label">PTC</div>'.$th['itsa_th']." 競賽";;
						break;
						case 3:
							$itsa_class="";
							$itsa_type='<div class="ui red horizontal label">CPE</div>'.$th['itsa_date']." 大學程式能力檢定";
						break;
					}
					echo $itsa_type;
				?>
				</a>
			</td>
			<td>
				<?php if(array_key_exists( $th['itsa_id'] , $exam_count)){
					echo $exam_count[$th['itsa_id']];
				}else{
					echo 0;
				}?>
			</td>
			<td>
				<a href="<?php echo base_url();?>admin/context/edit/<?php echo $th['itsa_id']?>" class="ui button blue tiny basic">編輯競賽</a>
				<a href="<?php echo base_url();?>admin/context/team/<?php echo $th['itsa_id']?>" class="ui button teal tiny basic">編輯隊伍</a>
				<a href="<?php echo base_url();?>admin/context/delete/<?php echo $th['itsa_id']?>" class="ui button red tiny basic" onClick="return confirm('確定是否刪除?');">刪除競賽</a>
			</td>
		</tr>
		<?php }?>
	</tbody>
</table>