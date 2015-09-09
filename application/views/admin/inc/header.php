<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Blank Page - Ace Admin</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<?php echo _get_html_cssjs('admin_css','bootstrap.css,font-awesome.css,ace-fonts.css','css');?>

		<!-- page specific plugin styles -->

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo _get_cfg_path('admin_css')?>ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<?php echo _get_html_cssjs('admin_css','ace-part2.css,ace-ie.css','css');?>
			<link rel="stylesheet" href="<?php echo _get_cfg_path('admin_css')?>ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<?php echo _get_html_cssjs('admin_css','ace-extra.js','js');?>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<?php echo _get_html_cssjs('admin_css','html5shiv.js,respond.js','js');?>
		<![endif]-->
	</head>

<body class="no-skin">