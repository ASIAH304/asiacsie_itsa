<div style="margin: 3em 0;">
	<h2 class="ui dividing header"><?php echo $user['user_id']?> <?php echo $user['user_name']?> 參賽資訊</h2>
	<a class="ui primary button" href="#" onclick="alert('別急！！開發ing')">匯出參賽紀錄</a>
	<a class="ui teal button" href="#" onclick="alert('別急！！開發ing')">列印參賽紀錄</a>
</div>

<div class="ui inverted segment attached">
	<div class="ui statistics six column grid tiny">
		<div class="column">
		<div class="ui inverted teal statistic">
			<div class="label">
				參賽次數
			</div>
			<div class="value">
				<?php if($stat['count']>0){echo $stat['count'];}else{echo "-";}?>
			</div>
		</div>
		</div>
		<div class="column">
		<div class="ui inverted yellow statistic">
			<div class="label">
				最佳解題數
			</div>
			<div class="value">
				<?php if($stat['solved']>0){echo $stat['solved'];}else{echo "-";}?>
			</div>
		</div>
		</div>
		<div class="column">
		<div class="ui inverted orange statistic">
			<div class="label">
				最佳排名
			</div>
			<div class="value">
				<?php if($stat['rank']>0){echo $stat['rank'];}else{echo "-";}?>
			</div>
		</div>
		</div>
		<div class="column">
		<div class="ui inverted pink statistic">
			<div class="label">
				最佳解題時間
			</div>
			<div class="value">
				<?php if($stat['teamtime']>0){echo $stat['teamtime'];}else{echo "-";}?>
			</div>
		</div>
		</div>
		<div class="column">
		<div class="ui inverted blue statistic">
			<div class="label">
				平均解題時間
			</div>
			<div class="value">
				<?php echo round($stat['avgtime'],1)?>
			</div>
		</div>
		</div>
		<div class="column">
		<div class="ui inverted green statistic">
			<div class="label">
				平均解題數
			</div>
			<div class="value">
				<?php echo round($stat['avgsolved'],1)?>
			</div>
		</div>
		</div>
	</div>
	</div>
<script>$(document).ready(function(){$('.menu .item').tab();})</script>
<div class="ui pointing secondary menu large">
	<a class="active item" data-tab="history">參賽紀錄</a>
	<a class="item" data-tab="statistics">統計資料</a>
</div>
<div class="ui active tab" data-tab="history">
	<div class="ui top attached segment center aligned">
		<h3>參賽人員</h3>
	</div>
	<div class="ui segment attached blue">
	<table class="ui celled table">
		<thead>
			<tr>
				<th>排名</th>
				<th>隊員</th>
				<th>解題題數</th>
				<th>解題時間(分鐘)</th>
				<th>備註</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($context as $key => $v) {?>
			<tr>
				<td><?php echo $v['team_rank']?></td>
				<td>
					<a href="<?php echo base_url();?>context/user/<?php echo $v['team_user1']?>"><?php echo $v['team_user1']." ".$std[$v['team_user1']]?></a><br>
						<?php if(!is_null($v['team_user2'])) echo '<a href="'.base_url().'context/user/'.$v['team_user2'].'">'.$v['team_user2']." ".$std[$v['team_user2']]."</a><br>" ?>
						<?php if(!is_null($v['team_user3'])) echo '<a href="'.base_url().'context/user/'.$v['team_user3'].'">'.$v['team_user3']." ".$std[$v['team_user3']]."</a><br>" ?>
				</td>
				<td><?php echo $v['team_solved']?></td>
				<td><?php echo $v['team_time']?></td>
				<td>
					<?php echo context_type_s($v['itsa_type'])?> <?php echo $v['team_name']?>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table>	

	</div>
</div>
<div class="ui tab segment" data-tab="statistics" style="text-align: center">
Deving....
</div>
