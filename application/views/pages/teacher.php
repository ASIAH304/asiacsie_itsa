<div style="margin: 3em 0;">
	<h2 class="ui dividing header"><?php echo $teacher['user_name']?> 老師 帶隊資訊</h2>
	<a class="ui primary button disabled" href="#" onclick="alert('別急！！開發ing')">匯出帶隊紀錄</a>
	<a class="ui teal button disabled" href="#" onclick="alert('別急！！開發ing')">列印帶隊紀錄</a>
</div>
<div class="ui inverted segment attached">
<div class="ui statistics six column grid tiny">
	<div class="column">
	<div class="ui inverted teal statistic">
		<div class="label">
			帶隊隊伍數
		</div>
		<div class="value">
			<?php echo $stat['count']?>
		</div>
	</div>
	</div>
	<div class="column">
	<div class="ui inverted yellow statistic">
		<div class="label">
			隊伍最佳解題數
		</div>
		<div class="value">
			<?php echo $stat['solved']?>
		</div>
	</div>
	</div>
	<div class="column">
	<div class="ui inverted orange statistic">
		<div class="label">
			隊伍最佳排名
		</div>
		<div class="value">
			<?php echo $stat['rank']?>
		</div>
	</div>
	</div>
	<div class="column">
	<div class="ui inverted pink statistic">
		<div class="label">
			隊伍最佳解題時間
		</div>
		<div class="value">
			<?php echo $stat['teamtime']?><!--??-->
		</div>
	</div>
	</div>
	<div class="column">
	<div class="ui inverted blue statistic">
		<div class="label">
			隊伍平均解題時間
		</div>
		<div class="value">
			<?php echo round($stat['avgtime'],1)?>
		</div>
	</div>
	</div>
	<div class="column">
	<div class="ui inverted green statistic">
		<div class="label">
			隊伍平均解題數
		</div>
		<div class="value">
			<?php echo round($stat['avgsolved'],1)?>
		</div>
	</div>
	</div>
</div>
</div>
<div class="ui top attached segment center aligned">
	<h3>帶隊記錄</h3>
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
		<?php foreach ($team as $key => $v) {?>
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
				<?php
				if($v['itsa_type'] == 3){
						switch( $v['team_solved'] ){
							case 5:
							case 4:
								echo '<span class="ui green label" title="熟悉各種基礎的演算法、資料結構，並具有良好的程式編寫能力。">專業級</span><br>';
							break;
							case 3:
								echo '<span class="ui blue label" title="熟悉程式設計的邏輯概念，能以程式克服一般常見的問題。">進階級</span><br>';
							break;
							case 2:
								echo '<span class="ui teal label" title="具備基礎的程式編寫能力，能以程式處理簡單問題。">中級</span><br>';
							break;
							case 1:
								echo '<span class="ui purple label" title="具有簡單的程式編寫能力，但尚不足以應付不同種類的問題。">初級</span><br>';
							break;
							case 0:
								echo '<span class="ui black label" title="無法理解題意，或無程式編寫能力。">零級</span><br>';
							break;
							default:
								echo '<span class="ui orange label" title="熟悉各種進階演算法、資料結構，並具有優異的程式編寫能力。">專業級</span><br>';
						}
					break;
				}else{
					if( $v['team_solved'] >=3){?><span class="ui green label">榮獲績優團隊</span><?php }
				}?>
				<?php echo context_type_s($v['itsa_type'])?> <?php echo $v['team_name']?>
			</td>
		</tr>
		<?php }?>
	</tbody>
</table>	

</div>