<?php 
$detail_header="";
$context_site="";
$context_info="";
$context_type="";
switch($exam_detail->itsa_type){
	case 1:
		$context_site="https://sites.google.com/site/itsancku/";
		$context_info="https://sites.google.com/site/itsancku/home";
		$detail_header="第 ".$exam_detail->itsa_th." 次競賽";
		$context_type='<div class="ui teal button">ITSA 線上程式設計競賽</div>';
	break;
	case 2:
		$context_site="https://sites.google.com/site/itsancku/";
		$context_info="https://sites.google.com/site/itsancku/home";
		$detail_header=date("Y年m月競賽",strtotime($exam_detail->itsa_date));
		$context_type='<div class="ui orange button">PTC 線上程式設計競賽</div>';
	break;
	case 3:
		$context_site="https://cpe.cse.nsysu.edu.tw/";
		$context_info="https://cpe.cse.nsysu.edu.tw/newest.php";
		$detail_header=$exam_detail->itsa_date." CPE";
		$context_type='<div class="ui red button">大學程式能力檢定(CPE)</div>';
	break;
	default:
		$context_site="#";
		$context_info="#";
		$detail_header="null";
		$context_type="null";
}

?>
<div style="margin: 3em 0;">
	<h2 class="ui dividing header"><?php echo $detail_header?></h2>
	<?php echo $context_type?>
	<a href="<?php echo $context_site;?>" class="ui blue button" target="_blank"><i class="fa fa-bookmark"></i> 競賽網站</a>
	<a href="<?php echo $context_info;?>" class="ui green button" target="_blank"><i class="fa fa-exclamation-circle"></i> 競賽資訊</a>
	<?php if($exam_detail->itsa_type==3){?>
	<table class="ui celled table"><!--<table class="mtable level">-->
		<thead>
			<tr>
				<th>等級</th>
				<th>答對題數</th>
				<th>能力說明</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>專家級</td>
				<td>6 題或以上</td>
				<td>熟悉各種進階演算法、資料結構，並具有優異的程式編寫能力。</td>
			</tr>
			<tr>
				<td>專業級</td>
				<td>4~5 題</td>
				<td>熟悉各種基礎的演算法、資料結構，並具有良好的程式編寫能力。</td>
			</tr>
			<tr>
				<td>進階級</td>
				<td>3 題</td>
				<td>熟悉程式設計的邏輯概念，能以程式克服一般常見的問題。</td>
			</tr>
			<tr>
				<td>中級</td>
				<td>2 題</td>
				<td>具備基礎的程式編寫能力，能以程式處理簡單問題。</td>
			</tr>
			<tr>
				<td>初級</td>
				<td>1 題</td>
				<td>具有簡單的程式編寫能力，但尚不足以應付不同種類的問題。</td>
			</tr>
			<tr>
				<td>零級</td>
				<td>0 題</td>
				<td>無法理解題意，或無程式編寫能力。</td>
			</tr>
		</tbody>
	</table>
	<?php }?>
</div>
<div class="ui top inverted attached segment center aligned">
	<h3>本次競賽資訊</h3>
</div>

<div class="ui inverted segment attached">
<?php if(strtotime($exam_detail->itsa_date)>0 ){?>
<div class="ui statistics seven column grid tiny">
	<div class="column">
	<div class="ui inverted statistic">
		<div class="label">
			<i class="fa fa-calendar"></i> 競賽日期
		</div>
		<div class="value" style="font-size: 30px">
			<?php echo $exam_detail->itsa_date;?>
		</div>
	</div>
	</div>
	<div class="column">
	<div class="ui inverted statistic">
		<div class="label">
			<i class="fa fa-building-o"></i> 地點
		</div>
		<div class="value" style="font-size: 36px">
			<?php echo $exam_detail->itsa_place;?>
		</div>
	</div>
	</div>
	<div class="column">
	<div class="ui inverted blue statistic">
		<div class="value" style="font-size: 36px">
			<i class="fa fa-users icon"></i> <?php echo count($itsa_team)?>
		</div>
		<div class="label">
			參賽隊數 
		</div>
	</div>
	</div>
	<div class="column">
	<div class="ui inverted red statistic">
		<div class="value" style="font-size: 36px">
			<i class="fa fa-thumbs-up"></i> <?php echo $best_team?>
		</div>
		<div class="label">
			<?php if($exam_detail->itsa_type==3){?>進階級<?php }else{?>榮獲績優團隊<?php }?>
		</div>
	</div>
	</div>
	<div class="column">
	<div class="ui inverted teal statistic">
		<div class="value" style="font-size: 36px">
			<i class="fa fa-user-secret"></i> <?php echo $exam_detail->team_num;?>
		</div>
		<div class="label">
			總參賽隊(人)數 
		</div>
	</div>
	</div>
	
	<div class="column">
	<div class="ui inverted green statistic">
		<div class="value" style="font-size: 36px">
			<i class="fa fa-star"></i> <?php if(count($team_solved)==1){echo round($team_solved->team_avg,1);}else{echo "?";}?> / <?php echo $exam_detail->exam_num?>
		</div>
		<div class="label">
			平均解題數
		</div>
	</div>
	</div>
	<div class="column">
	<div class="ui inverted yellow statistic">
		<div class="value" style="font-size: 36px">
			<i class="fa fa-thumbs-o-up"></i> 
			<?php 
				if(empty($team_bestsolved->bestsolved)){
					echo "0";
				}else{
					if($team_bestsolved->bestsolved>=0){
						echo $team_bestsolved->bestsolved;
					}else{
						echo "?";
					}
				}
			?>
			/
			<?php echo $exam_detail->exam_num?>
		</div>
		<div class="label">
			最佳解題數
		</div>
	</div>
	</div>
	
</div>
<?php }else{?>
<div class="ui bottom attached message">
	比賽尚未開始，暫無資訊
</div>
<?php }?>
</div>
<br>

<div class="ui top attached segment center aligned">
	<h3>參賽人員</h3>
</div>
<div class="ui segment attached blue">
<?php switch($exam_detail->itsa_type){
	case 3:?>
	<table class="ui celled table">
		<thead>
			<tr>
				<th>排名</th>
				<th>姓名</th>
				<th>解題題數</th>
				<th>解題時間(分鐘)</th>
				<th>備註</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($itsa_team as $key => $v) {?>
			<tr>
				<td><?php echo $v['team_rank']?></td>
				<td><a href="<?php echo base_url();?>context/user/<?php echo $v['team_user1']?>"><?php echo $v['team_user1']." ".$user[$v['team_user1']]?></a></td>
				<td><?php echo $v['team_solved']?></td>
				<td><?php echo $v['team_time']?></td>
				<td>
					<?php switch( $v['team_solved'] ){
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

					}?>
					<?php echo $v['tean_note']?>
				</td>
			</tr>
		<?php }?>
	</table>
	<?php break;
	default:?>
	<table class="ui celled table sortable">
		<thead>
			<tr>
				<th>排名</th>
				<th>隊名</th>
				<th>隊員</th>
				<th>解題題數</th>
				<th>解題時間(分鐘)</th>
				<th>指導教練</th>
				<th>備註</th>
			</tr>
		</thead>
		<?php if(count($itsa_team)>0){?>
		<?php foreach ($itsa_team as $key => $v) {?>
			<tr>
				<td><?php echo $v['team_rank']?></td>
				<td><?php echo $v['team_name']?></td>
				<td>
					<a href="<?php echo base_url();?>context/user/<?php echo $v['team_user1']?>"><?php echo $v['team_user1']." ".$user[$v['team_user1']]?></a><br>
					<?php if(!is_null($v['team_user2'])) echo '<a href="'.base_url().'index.php/context/user/'.$v['team_user2'].'">'.$v['team_user2']." ".$user[$v['team_user2']]."</a><br>" ?>
					<?php if(!is_null($v['team_user3'])) echo '<a href="'.base_url().'index.php/context/user/'.$v['team_user3'].'">'.$v['team_user3']." ".$user[$v['team_user3']]."</a><br>" ?>
				</td>
				<td><?php echo $v['team_solved']?></td>
				<td><?php echo $v['team_time']?></td>
				<td><a href="<?php echo base_url();?>context/teacher/<?php echo $v['team_teacher']?>"><?php echo $teacher[$v['team_teacher']]?></a></td>
				<td>
					<?php if( $v['team_solved'] >=3){?><span class="ui green label">榮獲績優團隊</span><br><?php }?>
					<?php echo $v['tean_note']?>
				</td>
			</tr>
		<?php }?>
		<?php }else{?>
			<tr class="center aligned">
				<td>競賽資料統整中</td>
			</tr>
		<?php }?>
	</table>
	<?php }?>
</div>
