<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header">
	<h1>學生資料編輯</h1>
</div>
<?php echo form_open(site_url("admin/student/edit?id=".$student->user_id),array('class'=>"form-horizontal")) ?>
	<div class="form-group">
		<label class="col-sm-2 control-label">學號</label>
		<div class="col-sm-10">
			<p class="form-control-static"><?php echo $student->user_id?></p>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">姓名</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $student->user_name?>">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="ui primary button">更改資料</button>
		</div>
	</div>
<?php echo form_close()?>