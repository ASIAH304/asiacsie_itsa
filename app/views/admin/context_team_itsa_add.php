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
<div class="repeat">
<?php echo form_open(site_url("admin/context/team?id=".$context->itsa_id))?>
<table class="table table-bordered team">
	<thead>
		<tr>
			<td colspan="8"><span class="add ui green button" id="addteam"><i class="fa fa-plus"></i></span></td>
		</tr>
		<tr>
			<th>隊名</th>
			<th>隊員</th>
			<th>排名</th>
			<th>解題題數</th>
			<th>解題時間(分鐘)</th>
			<th>指導教練</th>
			<th>備註</th>
			<th></th>
		</tr>
	</thead>
	<tbody id="container">
		<tr class="template trow">
			<td class="text-center">
				<input class="form-control" name="team_name[]" type="text" required id="team_name">
			</td>
			<td>
				<div class="ui search selection dropdown">
					<input type="hidden" name="team_user1[]">
					<i class="dropdown icon"></i>
  					<div class="default text">隊員1</div>
				</div>
				<div class="ui search selection dropdown">
					<input type="hidden" name="team_user2[]">
					<i class="dropdown icon"></i>
  					<div class="default text">隊員2</div>
				</div>
				<div class="ui search selection dropdown">
					<input type="hidden" name="team_user3[]">
					<i class="dropdown icon"></i>
  					<div class="default text">隊員3</div>
				</div>
			</td>
			<td class="text-center">
				<input class="form-control" name="team_rank[]" type="text" id="team_rank">
			</td>
			<td class="text-center">
				<input class="form-control" name="team_solved[]" type="text"id="team_solved">
			</td>
			<td class="text-center">
				<input class="form-control" name="team_time[]" type="text" id="team_time">
			</td>
			<td class="text-center">
				<input class="form-control" name="team_teacher[]" type="text" id="team_teacher">
			</td>
			<td class="text-center">
				<textarea class="form-control" name="tean_note[]"></textarea>
			</td>
			<td class="text-center">
				<span class="move ui teal button"><i class="fa fa-arrows"></i></span>
				<span class="remove ui red button"><i class="fa fa-trash-o"></i></span>
			</td>
		</tr>
		<tr class="trow">
			<td class="text-center">
				<input class="form-control" name="team_name[]" type="text" required id="team_name">
			</td>
			<td>
				<div class="ui search selection dropdown">
					<input type="hidden" name="team_user1[]">
					<i class="dropdown icon"></i>
  					<div class="default text">隊員1</div>
				</div>
				<div class="ui search selection dropdown">
					<input type="hidden" name="team_user2[]">
					<i class="dropdown icon"></i>
  					<div class="default text">隊員2</div>
				</div>
				<div class="ui search selection dropdown">
					<input type="hidden" name="team_user3[]">
					<i class="dropdown icon"></i>
  					<div class="default text">隊員3</div>
				</div>
			</td>
			<td class="text-center">
				<input class="form-control" name="team_rank[]" type="text" id="team_rank">
			</td>
			<td class="text-center">
				<input class="form-control" name="team_solved[]" type="text"id="team_solved">
			</td>
			<td class="text-center">
				<input class="form-control" name="team_time[]" type="text" id="team_time">
			</td>
			<td class="text-center">
				<input class="form-control" name="team_teacher[]" type="text" id="team_teacher">
			</td>
			<td class="text-center">
				<textarea class="form-control" name="tean_note[]"></textarea>
			</td>
			<td class="text-center">
				<span class="move ui teal button"><i class="fa fa-arrows"></i></span>
				<span class="remove ui red button"><i class="fa fa-trash-o"></i></span>
			</td>
		</tr>
	</tbody>
</table>
<input type="hidden" name="opt" value="add">
<div class="text-center">
	<button type="submit" class="ui button blue">新增</button>
</div>
<?php echo form_close()?>
</div>
<script type="text/javascript">
$(function() {
	$(".repeat").each(function() {
		$(this).repeatable_fields({
			wrapper: ".team",
			container: "#container",
			row: '.trow',
			add: '.add',
			remove: '.remove',
			move: '.move'
		});
	});
	$('.dropdown').dropdown({
		apiSettings: {
			url: '<?php echo site_url("admin/json_users")?>?q={query}'
		}
	});
	$("#addteam").click(function(){
		$('.dropdown').dropdown({
			apiSettings: {
				url: '<?php echo site_url("admin/json_users")?>?q={query}'
			}
		});
	})
});
</script>
