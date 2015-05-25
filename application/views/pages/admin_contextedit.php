<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="ui segment raised">
<?php
if(!empty(validation_errors())){
	echo '<div class="ui error message">';
	echo validation_errors();
	echo '</div>';
}
?>
<?php echo form_open('admin/context/edit/'.$exam_detail['itsa_id'],array('class'=>"ui form")) ?>
	<h2 class="ui dividing header">編輯競賽資訊</h2>

	<div class="two fields">
		<div class="field">
			<label>比賽屆數</label>
			<input type="text" name="itsa_th" value="<?php echo $exam_detail['itsa_th'];?>">
		</div>
		<div class="field">
			<label>比賽類型</label>
			<select name="itsa_type">
				<option value="1"<?php if($exam_detail['itsa_type']==1){?> selected<?php }?>>ITSA</option>
				<option value="2"<?php if($exam_detail['itsa_type']==2){?> selected<?php }?>>PTC</option>
				<option value="3"<?php if($exam_detail['itsa_type']==3){?> selected<?php }?>>大學程式能力檢定(CPE)</option>
			</select>
		</div>
	</div>
	<div class="three fields">
		<div class="field">
			<label>比賽日期</label>
			<input type="date" name="itsa_date" value="<?php echo $exam_detail['itsa_date'];?>">
		</div>

		<div class="field">
			<label>比賽地點</label>
			<input type="text" name="itsa_place" value="<?php echo $exam_detail['itsa_place'];?>">
		</div>
		<div class="field">
			<label>比賽題數</label>
			<input type="text" name="exam_num" value="<?php echo $exam_detail['exam_num'];?>">
		</div>
	</div>
	<button class="ui blue button">更新</button>
</form>
</div>