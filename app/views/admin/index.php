<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header">
	<h1>系統管理登入</h1>
</div>
<?php echo form_open('admin/',array('class'=>"form-horizontal")) ?>
	<div class="form-group">
		<label class="col-sm-2 control-label">帳號</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="user_login" name="user_login">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">密碼</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="user_pwd" name="user_pwd">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="ui primary button">登入</button>
		</div>
	</div>
<?php echo form_close()?>