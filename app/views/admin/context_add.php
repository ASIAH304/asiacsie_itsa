<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header">
	<h1>競賽資料新增</h1>
</div>
<?php echo form_open(site_url("admin/context/add"),array('class'=>"form-horizontal")) ?>
	<div class="form-group">
		<label class="col-sm-2 control-label">競賽屆數</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="itsa_th" name="itsa_th">
			<span class="help-block">
				<ul>
					<li>ITSA: 屆數</li>
					<li>PTC: Ym</li>
					<li>CPE: Ymd</li>
				</ul>
			</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">競賽類型</label>
		<div class="col-sm-10">
			<select id="itsa_type" name="itsa_type" class="form-control">
				<option value="1">ITSA</option>
				<option value="2">PTC</option>
				<option value="3">CPE</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">競賽日期</label>
		<div class="col-sm-10">
			<input type="date" class="form-control" id="itsa_date" name="itsa_date">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">競賽地點</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="itsa_place" name="itsa_place">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">競賽學期</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" id="itsa_semeter" name="itsa_semeter">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">競賽題數</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" id="exam_num" name="exam_num">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">參賽數</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" id="team_num" name="team_num">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="ui primary button">新增資料</button>
		</div>
	</div>
<?php echo form_close()?>