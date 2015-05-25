<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="ui segment raised">
<?php echo form_open('admin/context/new',array('class'=>"ui form")) ?>
	<h4 class="ui dividing header">編輯競賽資訊</h4>
	<?php
	if(!empty(validation_errors())){
		echo '<div class="ui error message">';
		echo validation_errors();
		echo '</div>';
	}
	?>
	<div class="two fields">
		<div class="field">
			<label>比賽屆數</label>
			<input type="text" name="itsa_th">
		</div>
		<div class="field">
			<label>比賽類型</label>
			<select name="itsa_type">
				<option value="1">ITSA</option>
				<option value="2">PTC</option>
				<option value="3">大學程式能力檢定(CPE)</option>
			</select>
		</div>
	</div>
	<div class="three fields">
		<div class="field">
			<label>比賽日期</label>
			<input type="date" name="itsa_date">
		</div>

		<div class="field">
			<label>比賽地點</label>
			<input type="text" name="itsa_place">
		</div>
		<div class="field">
			<label>比賽題數</label>
			<input type="text" name="exam_num">
		</div>
	</div>
	<button class="ui blue button">新增</button>
</form>
</div>