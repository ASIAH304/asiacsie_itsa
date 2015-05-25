<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>404 Page Not Found</title>
	<link rel="stylesheet" href="<?php echo base_url();?>css/semantic.min.css" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="<?php echo base_url();?>js/semantic.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" />
</head>
<body>
<h1>亞洲大學 資訊工程學系 程式設計競賽平台</h1>
<div class="ui large menu blue">
	<a class="item" href="<?php echo base_url();?>">首頁</a>
	<a class="item" href="<?php echo base_url();?>" title="排名">誰是程設王</a>
	<a class="item" href="<?php echo base_url();?>">統計資料</a>
</div>
</head>
<body>
	<div class="ui info message huge">
		<div class="header"><?php echo $heading; ?></div>
		<?php echo $message; ?>
	</div>
</body>
</html>