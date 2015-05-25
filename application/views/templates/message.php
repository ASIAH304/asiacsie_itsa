<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="ui message <?php echo $message['class']?>">
<?php echo $message['content']?>
</div>

<?php if(isset($message['time'])){?>
	<?php if($message['time']>0){?>
		<?php if(isset($message['url'])){?>
			<meta http-equiv="refresh" content="<?php echo $message['time']?>; url=<?php echo base_url();?><?php echo $message['url']?>" />
		<?php }else{?>
			<meta http-equiv="refresh" content="<?php echo $message['time']?>" />
		<?php }?>
	<?php }else{?>
		<meta http-equiv="refresh" content="2" />
	<?php }?>
<?php }?>