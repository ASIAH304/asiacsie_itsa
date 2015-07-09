<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="ui segment raised">
<?php echo form_open('admin/context/student',array('class'=>"ui form")) ?>
	<div class="field">
		<label>學號</label>
		<input type="text" name="user_id">
	</div>
	<div class="field">
		<label>姓名</label>
		<input type="text" name="user_name">
	</div>
	<div class="field">
		<label>入學年份</label>
		<input type="text" name="user_year">
	</div>
	<button type="submit" value="add" name="submit" class="ui button blue">新增學生</button>
</form>
</div>