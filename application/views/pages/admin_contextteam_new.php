<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php
if(!empty(validation_errors())){
	echo '<div class="ui error message">';
	echo validation_errors();
	echo '</div>';
}
?>
<?php echo form_open('admin/context/team/'.$exam_detail['itsa_id'].'/new',array('class'=>"ui form")) ?>
<table class="ui table">
	<thead>
		<tr>
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
		<tr>
			<?php if($exam_detail['itsa_type']==1 || $exam_detail['itsa_type']==2){?>
			<td>
				<input type="text" name="team_name">
			</td>
			<?php }?>
			<td>
				<div class="ui search selection dropdown">
					<input type="hidden" name="team_user1">
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
					<input type="hidden" name="team_user2">
					<i class="dropdown icon"></i>
  					<div class="default text">隊員二</div>
					<div class="menu">
						<?php foreach ($itsa_user as $key => $user) {?>
						<div class="item" data-value="<?php echo $user['user_id']?>"><?php echo $user['user_id']?> <?php echo $user['user_name']?></div>
						<?php }?>
					</div>
				</div>
				<br>
				<div class="ui search selection dropdown">
					<input type="hidden" name="team_user3">
					<i class="dropdown icon"></i>
  					<div class="default text">隊員三</div>
					<div class="menu">
						<?php foreach ($itsa_user as $key => $user) {?>
						<div class="item" data-value="<?php echo $user['user_id']?>"><?php echo $user['user_id']?> <?php echo $user['user_name']?></div>
						<?php }?>
					</div>
				</div>
				<?php }?>
			</td>
			<td>
				<input type="number" name="team_solved" min="0" max="<?php echo $exam_detail['exam_num']?>">
			</td>
			<td>
				<input type="number" name="team_rank" min="0">
			</td>
			<td>
				<input type="number" name="team_time" min="0">
			</td>
			<?php if($exam_detail['itsa_type']==1 || $exam_detail['itsa_type']==2){?>
			<td>
				<div class="ui search selection dropdown">
					<input type="hidden" name="team_teacher">
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
				<textarea row="3" name="tean_note"></textarea>
			</td>			
		</tr>
	</tbody>
</table>
<button class="ui blue button" type="submit">新增</button>
</form>
<br>