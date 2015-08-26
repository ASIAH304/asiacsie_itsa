<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!--<div class="ui active dimmer">
	<div class="ui indeterminate text loader large">系統維護中</div>
</div>-->

<script>$(document).ready(function(){$('.menu .item').tab();})</script>
<div class="ui pointing secondary menu large">
	<a class="item active" data-tab="all">全部</a>
	<a class="item" data-tab="itsa">ITSA</a>
	<a class="item" data-tab="ptc">PTC</a>
	<a class="item" data-tab="cpe">CPE</a>
</div>
<div class="ui active tab" data-tab="all">
	<div class="ui top attached segment center aligned">
		<h3>所有參賽記錄</h3>
	</div>
	<div class="ui segment attached blue">
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
									$itsa_type='<div class="ui orange horizontal label">PTC</div>'.$th['itsa_th']." 競賽";
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
	</div>
</div>
<div class="ui tab" data-tab="itsa">
	<div class="ui top attached segment center aligned">
		<h3>ITSA 參賽記錄</h3>
	</div>
	<div class="ui segment attached teal">
		<table class="ui celled striped table large">
			<thead>
				<tr>
					<th>程式競賽</th>
					<th>參賽隊數</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($itsa as $key => $th) {?>
				<tr>
					<td>
						<a href="context/detail/<?php echo $th['itsa_id']?>">
						<div class="ui teal horizontal label">ITSA</div> 第 <?php echo $th['itsa_th']?> 次競賽
						</a>
					</td>
					<td><?php if(array_key_exists( $th['itsa_id'] , $exam_count)){echo $exam_count[$th['itsa_id']];}else{ echo 0;}?></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div>
<div class="ui tab" data-tab="ptc">
	<div class="ui top attached segment center aligned">
		<h3>PTC 參賽記錄</h3>
	</div>
	<div class="ui segment attached orange">
		<table class="ui celled striped table large">
			<thead>
				<tr>
					<th>程式競賽</th>
					<th>參賽隊數</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($ptc as $key => $th) {?>
				<tr>
					<td>
						<a href="context/detail/<?php echo $th['itsa_id']?>"><div class="ui orange horizontal label">PTC</div><?php echo $th['itsa_th']?> 競賽</a>
					</td>
					<td><?php if(array_key_exists( $th['itsa_id'] , $exam_count)){echo $exam_count[$th['itsa_id']];}else{ echo 0;}?></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div>
<div class="ui tab" data-tab="cpe">
	<div class="ui top attached segment center aligned">
		<h3>CPE 參賽記錄</h3>
	</div>
	<div class="ui segment attached red">
		<table class="ui celled striped table large">
			<thead>
				<tr>
					<th>程式競賽</th>
					<th>參賽隊數</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($cpe as $key => $th) {?>
				<tr>
					<td>
						<a href="context/detail/<?php echo $th['itsa_id']?>">
						<div class="ui red horizontal label">CPE</div><?php echo $th['itsa_date']?> 大學程式能力檢定
						</a>
					</td>
					<td><?php if(array_key_exists( $th['itsa_id'] , $exam_count)){echo $exam_count[$th['itsa_id']];}else{ echo 0;}?></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div>
