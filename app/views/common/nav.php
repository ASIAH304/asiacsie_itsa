<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<nav class="navbar navbar-inverse navbar-static-top">
	<div class="container-fluid"> 
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
		</div>
		
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo site_url()?>">首頁</a></li>
				<li><a href="http://120.108.113.80/">線上練習</a></li>
				<li><a href="<?php echo site_url("oj")?>">線上練習註冊</a></li>
			</ul>
			<!-- <form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="請輸入學號 查詢個人紀錄">
				</div>
				<button type="submit" class="btn btn-primary btn-sm">查詢</button>
			</form> -->
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo site_url("admin")?>">管理</a></li>
			</ul>
		</div>
		<!-- /.navbar-collapse --> 
	</div>
	<!-- /.container-fluid --> 
</nav>
