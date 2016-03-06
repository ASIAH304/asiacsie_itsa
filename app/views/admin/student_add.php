<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header">
	<h1>新增學生資料</h1>
</div>
<?php echo form_open(site_url("admin/student/add"),array('class'=>"form-horizontal")) ?>
	<div class="form-group">
		<label class="col-sm-2 control-label">學號</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="user_id" name="user_id">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">姓名</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="user_name" name="user_name">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="ui primary button">新增</button>
		</div>
	</div>
<?php echo form_close()?>