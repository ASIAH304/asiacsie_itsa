<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*echo "<pre>";
print_r($exam_count);
echo "</pre>";*/
?>
<!--<div class="ui active dimmer">
	<div class="ui indeterminate text loader large">系統維護中</div>
</div>-->

	
<table class="ui celled striped table large">
	<thead>
		<tr>
			<th>程式競賽</th>
			<th>參賽隊數</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($exam_th as $key => $th) {?>
		<tr>
			<td>
				<a href="context/detail/<?php echo $th['itsa_id']?>">
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
			<td><?php if(array_key_exists( $th['itsa_id'] , $exam_count)){echo $exam_count[$th['itsa_id']];}else{ echo 0;}?></td>
		</tr>
		<?php }?>
	</tbody>
</table>