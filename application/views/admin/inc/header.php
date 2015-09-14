<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?=empty($page_title)?'':$page_title; ?> - <?=_get_config('site_name');?>后台管理平台</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!--[if !IE]> -->
		<link rel="stylesheet" href="<?php echo _get_cfg_path('admin_css')?>pace.css" />

		<script data-pace-options='{ "ajax": true, "document": true, "eventLag": false, "elements": false }' src="<?php echo _get_cfg_path('admin_js')?>pace.js"></script>

		<!-- <![endif]-->

		<?php echo _get_html_cssjs('admin_css','bootstrap.css,font-awesome.css,ace-fonts.css','css');?>

		<link rel="stylesheet" href="<?php echo _get_cfg_path('admin_css')?>ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo _get_cfg_path('admin_css')?>ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <?php echo _get_html_cssjs('admin_css','ace-ie.css','css');?>
		<![endif]-->

		<!-- ace settings handler -->
		<?php echo _get_html_cssjs('admin_js','ace-extra.js','js');?>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<?php echo _get_html_cssjs('admin_js','html5shiv.js,respond.js','js');?>
		<![endif]-->
	</head>


<body class="no-skin">

	<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="/admin" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							<?=_get_config('site_name');?> 管理
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						

						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<?php $xt_loginUser = $this->session->userdata['loginUser'];
								if(!empty($xt_loginUser)):
									$name = !empty($xt_loginUser['realname'])?$xt_loginUser['realname']:$xt_loginUser['username'];?>
									<span class="user-info">
										<small>欢迎,</small>
										<?=$name?>
									</span>

								<i class="ace-icon fa fa-caret-down"></i>
								<?php endif;?>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										修改密码
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="/admin/login/logout">
										<i class="ace-icon fa fa-power-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>