<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="ui message large info text-center">
			<div class="content">
				<h2 class="header">
					注意事項
				</h2>
				<p>本資源僅給 <strong class="text-success">亞洲大學</strong> 師生使用，故您在註冊前，需有亞洲大學 live.asia.edu.tw 信箱</p>
				<p class="text-danger">系統會寄驗證信至學校信箱，經驗證後始可使用線上練習系統。</p>
				<p>學生：學號@live.asia.edu.tw</p>
				<p>教師/職員：請洽系統管理者開設帳號</p>
		  </div>
		</div>
		<div class="ui raised segment">
			<div class="page-header text-center">
				<h2>帳號註冊</h2>
			</div>
			<?php echo validation_errors('<div class="ui message red">', '</div>');?>
			<?php echo form_open(site_url("oj"),array("class"=>"form-horizontal"))?>
				<div class="form-group">
					<label class="col-sm-2 control-label">學號</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo set_value('user_id'); ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label"><strong class="text-success">亞洲大學</strong><br>校園信箱</label>
					<div class="col-sm-10">
						<div class="input-group">
							<input type="text" class="form-control" readonly id="asia_acc">
							<span class="input-group-addon" id="basic-addon2">@live.asia.edu.tw</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">密碼</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="user_pwd">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">確認密碼</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="user_pwd2">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">姓名</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="user_name" value="<?php echo set_value('user_name'); ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="ui button blue">註冊帳號</button>
					</div>
				</div>
			<?php echo form_close()?>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>
<script>
$(function(){
	$("#user_id").change(function(){
		$("#asia_acc").val($("#user_id").val());
	})
});
</script>