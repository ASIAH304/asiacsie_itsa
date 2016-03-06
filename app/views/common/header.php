<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--[if IE 8]>
<html xmlns="http://www.w3.org/1999/xhtml" class="ie8">
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html xmlns="http://www.w3.org/1999/xhtml">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<?php echo $this->assets->show_title()?>
<?php echo $this->assets->show_meta()?>
<?php echo $this->assets->show_css();?>
<?php echo $this->assets->show_js();?>
<!--[if lt IE 9]>
<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	$('[data-toggle="popover"]').popover();
})
</script>
</head>

<body>
<div class="container-fluid">
<h1><i class="fa fa-code text-success"></i> <?php echo $this->site_name?></h1>