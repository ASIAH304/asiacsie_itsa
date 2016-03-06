<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
{
	"success": true,
	"results": [
		<?php foreach ($students as $key => $student) {?>
		{"name"  : "<?php echo $student->user_id?> <?php echo $student->user_name?>","value" : "<?php echo $student->user_id?>"},
		<?php }?>
		{"name"  : "null","value" : "null"}
	]
}