<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div>
<ul class="nav nav-tabs tabs-material nav-justified">
	<li class="active"><a href="#all" data-toggle="tab">全部</a></li>
	<li><a href="#itsa" data-toggle="tab">ITSA</a></li>
	<li><a href="#ptc" data-toggle="tab">PTC</a></li>
	<li><a href="#cpe" data-toggle="tab">CPE</a></li>
</ul>
<div class="tab-content">
	<div class="tab-pane fade active in" id="all">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>程式競賽</th>
					<th>競賽日期</th>
					<th>參賽隊數</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($all_contexts as $key => $context ){?>
				<tr>
					<td>
						<?php echo context_type_short($context->itsa_type)?>
						<a href="<?php echo site_url("context/detail/".$context->itsa_id);?>">
							<?php echo context_name($context->itsa_type,$context->itsa_th,$context->itsa_date)?>
						</a>
					</td>
					<td>
						<?php echo $context->itsa_date?>
					</td>
					<td>
						<?php echo element($context->itsa_id, $contexts_count, '0');?>
					</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	<div class="tab-pane fade" id="itsa">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>程式競賽</th>
					<th>競賽日期</th>
					<th>參賽隊數</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($itsa_contexts as $key => $context ){?>
				<tr>
					<td>
						<?php echo context_type_short($context->itsa_type)?>
						<a href="<?php echo site_url("context/detail/".$context->itsa_id);?>">
							<?php echo context_name($context->itsa_type,$context->itsa_th,$context->itsa_date)?>
						</a>
					</td>
					<td>
						<?php echo $context->itsa_date?>
					</td>
					<td>
						<?php echo element($context->itsa_id, $contexts_count, '0');?>
					</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	<div class="tab-pane fade" id="ptc">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>程式競賽</th>
					<th>競賽日期</th>
					<th>參賽隊數</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ptc_contexts as $key => $context ){?>
				<tr>
					<td>
						<?php echo context_type_short($context->itsa_type)?>
						<a href="<?php echo site_url("context/detail/".$context->itsa_id);?>">
							<?php echo context_name($context->itsa_type,$context->itsa_th,$context->itsa_date)?>
						</a>
					</td>
					<td>
						<?php echo $context->itsa_date?>
					</td>
					<td>
						<?php echo element($context->itsa_id, $contexts_count, '0');?>
					</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	<div class="tab-pane fade" id="cpe">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>程式競賽</th>
					<th>競賽日期</th>
					<th>參賽隊數</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($cpe_contexts as $key => $context ){?>
				<tr>
					<td>
						<?php echo context_type_short($context->itsa_type)?>
						<a href="<?php echo site_url("context/detail/".$context->itsa_id);?>">
							<?php echo context_name($context->itsa_type,$context->itsa_th,$context->itsa_date)?>
						</a>
					</td>
					<td>
						<?php echo $context->itsa_date?>
					</td>
					<td>
						<?php echo element($context->itsa_id, $contexts_count, '0');?>
					</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div>
</div>
