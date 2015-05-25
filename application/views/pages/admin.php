<div class="ui two column centered grid">
	<?php
	if(!empty(validation_errors())){
		echo '<div class="ui error message">';
		echo validation_errors();
		echo '</div>';
	}
	?>
	<div class="column">
		<?php echo form_open('admin/',array('class'=>"ui form")) ?>
			<h4 class="ui dividing header">管理 登入</h4>
			<div class="field">
				<label>帳號</label>
				<input type="text" id="user_login" name="user_login">
			</div>
			<div class="field">
				<label>密碼</label>
				<input type="password" id="user_pwd" name="user_pwd">
			</div>
			<button class="ui primary button">登入</button>
		</form>
	</div>
</div>
