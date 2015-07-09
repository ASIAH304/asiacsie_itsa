<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="<?php echo base_url();?>css/semantic.min.css" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="<?php echo base_url();?>js/semantic.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" />
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>favicon.png"/>

	<meta name="thumbnail" content="<?php echo base_url();?>logo.png" />

	<meta name="og:title" content="<?php echo $title ?>" />
	<meta name="og:type" content="website" />
	<meta name="og:image" content="<?php echo base_url();?>logo.png" />
	<meta property="og:description" content="<?php echo $title ?>"/>
</head>
<body>
<h1><i class="code icon green"></i> 亞洲大學 資訊工程學系 程式設計競賽平台</h1>


<div class="ui large menu inverted green">
	<a class="item" href="<?php echo base_url();?>">首頁</a>
	<!--<a class="item" href="<?php echo base_url();?>" title="排名">誰是程設王</a>
	<a class="item" href="<?php echo base_url();?>">統計資料</a>-->
	<a class="item" href="#">線上練習 <div class="floating ui red label">DEV</div></a>
	<div class="right menu">
		<a class="item" href="<?php echo base_url();?>admin">管理</a>
		
	</div>
</div>
