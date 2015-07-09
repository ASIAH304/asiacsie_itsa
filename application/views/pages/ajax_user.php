<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php foreach ($itsa_user as $key => $user) {?>
<div class="item" data-value="<?php echo $user['user_id']?>"><?php echo $user['user_id']?> <?php echo $user['user_name']?></div>
<?php }?>