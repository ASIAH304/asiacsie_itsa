<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<button href="#" class="ui basic button blue"><i class="add user icon"></i> 新增學生</button>
<table class="ui celled table">
	<thead>
		<tr>
			<th class="two wide center aligned">操作</th>
			<th>學生資訊</th>
		</tr>
	</thead>
	<?php if(is_array($itsa_user)){?>
	<tbody>
		<?php foreach ($itsa_user as $key => $user) {?>
		<tr>
			<td class="two wide center aligned">
				<a href="#"><i class="circular edit icon"></i></a>
				<a href="#"><i class="circular remove user icon"></i></a>
			</td>
			<td>
				<?php echo $user['user_id']?>
				<?php echo $user['user_name']?>
			</td>
		</tr>
		<?php }?>
	</tbody>
	<?php }?>
</table>
