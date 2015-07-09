<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script>
$(function() {
	$('.dropdown').dropdown();
	$('.checkbox').checkbox();
	$(".update_user").click(function(e) {
		$.ajax({
			type: "GET",
			url: "<?php echo base_url();?>admin/update_user",
			success: function(data){$(".ui.search .menu").html(data);},
			error:function(xhr){alert("更新錯誤");},
		});
		return false;
	});
});
</script>
<?php
if(!empty(validation_errors())){
	echo '<div class="ui error message">';
	echo validation_errors();
	echo '</div>';
}
?>
<div class="ui divider"></div>
<div class="ui segment">
<div class="ui form">

<?php echo form_open('admin/context/team/'.$exam_detail['itsa_id']."/update") ?>
<button class="ui teal button large basic" type="submit" value="update" name="action">更新</button>
<button class="ui red button large basic" type="submit" value="delete" onclick="return confirm('是否刪除?')" name="action">刪除</button>
<button class="ui orange button large basic update_user" type="button">更新學生清單</button>
<table class="ui compact celled definition table">
	<thead>
		<tr>
			<th style="width:1%"></th>
			<?php if($exam_detail['itsa_type']==1 || $exam_detail['itsa_type']==2){?>
			<th class="three wide">隊名</th>
			<th class="two wide">隊員</th>
			<th class="one wide">解題題數</th>
			<th class="one wide">排名</th>
			<th class="one wide">解題時間(分鐘)</th>
			<th class="one wide">指導教練</th>
			<?php }else{?>
			<th class="two wide">隊員</th>
			<th class="one wide">解題題數</th>
			<th class="one wide">排名</th>
			<th class="one wide">解題時間(分鐘)</th>
			<?php }?>
			<th class="two wide">備註</th>
		</tr>
	</thead>
	
	<tbody>
		<?php foreach ($itsa_team as $key => $team) {?>
		<tr>
			<td class="ui center aligned">
				<div class="ui checkbox">
				<input type="checkbox" value="<?php echo $team['team_id']?>" name="tid[]"> <label></label>
			</div>
			</td>
			<?php if($exam_detail['itsa_type']==1 || $exam_detail['itsa_type']==2){?>
			<td>
				<input type="text" name="team[<?php echo $team['team_id']?>][team_name]" value="<?php echo $team['team_name']?>">
			</td>
			<?php }?>
			<td>
				<div class="ui search selection dropdown">
					<input type="hidden" name="team[<?php echo $team['team_id']?>][team_user1]" value="<?php echo $team['team_user1']?>">
					<i class="dropdown icon"></i>
  					<div class="default text">隊員一</div>
					<div class="menu">
						<?php foreach ($itsa_user as $key => $user) {?>
						<div class="item" data-value="<?php echo $user['user_id']?>"><?php echo $user['user_id']?> <?php echo $user['user_name']?></div>
						<?php }?>
					</div>
				</div>
				<?php if($exam_detail['itsa_type']==1 || $exam_detail['itsa_type']==2){?>
				<br>
				<div class="ui search selection dropdown">
					<input type="hidden" name="team[<?php echo $team['team_id']?>][team_user2]" value="<?php echo $team['team_user2']?>">
					<i class="dropdown icon"></i>
  					<div class="default text">隊員二</div>
					<div class="menu">
						<div class="item" data-value="0">-</div>
						<?php foreach ($itsa_user as $key => $user) {?>
						<div class="item" data-value="<?php echo $user['user_id']?>"><?php echo $user['user_id']?> <?php echo $user['user_name']?></div>
						<?php }?>
					</div>
				</div>
				<br>
				<div class="ui search selection dropdown">
					<input type="hidden" name="team[<?php echo $team['team_id']?>][team_user3]" value="<?php echo $team['team_user3']?>">
					<i class="dropdown icon"></i>
  					<div class="default text">隊員三</div>
					<div class="menu">
						<div class="item" data-value="0">-</div>
						<?php foreach ($itsa_user as $key => $user) {?>
						<div class="item" data-value="<?php echo $user['user_id']?>"><?php echo $user['user_id']?> <?php echo $user['user_name']?></div>
						<?php }?>
					</div>
				</div>
				<?php }?>
			</td>
			<td>
				<input type="number" name="team[<?php echo $team['team_id']?>][team_solved]" value="<?php echo $team['team_solved']?>" min="0" max="<?php echo $exam_detail['exam_num']?>">
			</td>
			<td>
				<input type="number" name="team[<?php echo $team['team_id']?>][team_rank]" value="<?php echo $team['team_rank']?>" min="0">
			</td>
			<td>
				<input type="number" name="team[<?php echo $team['team_id']?>][team_time]" value="<?php echo $team['team_time']?>" min="0">
			</td>
			<?php if($exam_detail['itsa_type']==1 || $exam_detail['itsa_type']==2){?>
			<td>
				<div class="ui search selection dropdown">
					<input type="hidden" name="team[<?php echo $team['team_id']?>][team_teacher]" value="<?php echo $team['team_teacher']?>">
					<i class="dropdown icon"></i>
  					<div class="default text">指導教授</div>
					<div class="menu">
						<?php foreach ($team_teacher as $key => $teacher) {?>
						<div class="item" data-value="<?php echo $teacher['user_login']?>"><?php echo $teacher['user_login']?> <?php echo $teacher['user_name']?></div>
						<?php }?>
					</div>
				</div>
			</td>
			<?php }?>
			<td class="field">
				<textarea row="2" name="team[<?php echo $team['team_id']?>][tean_note]"><?php echo $team['tean_note']?></textarea>
			</td>
		</tr>
		<?php }?>
	</tbody>
</table>

<button class="ui teal button large basic" type="submit" value="update" name="action">更新</button>
<button class="ui red button large basic" type="submit" value="delete" onclick="return confirm('是否刪除?')" name="action">刪除</button>
<button class="ui orange button large basic update_user" type="button">更新學生清單</button>
</form>
</div>
</div>