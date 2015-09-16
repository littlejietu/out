<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config['site_name'] = '局外人';


$config['cfg_path'] = array(
	'css'=>'/assets/src/css/',
	'js'=>'/assets/src/js/',
	'images'=>'/assets/src/images/',
	'lib'=>'/assets/src/lib/',
	'admin_css'=>'/assets/admin/css/',
	'admin_js'=>'/assets/admin/js/',
	'admin_images'=>'/assets/admin/images/',
);

$config['nav_list'] = array(
	1=>array(
		'icon'=>'fa-tachometer',
		'title'=>'首页',
		'page'=>'/admin/index',
		'open'=>'',
	),
	2=>array(
		'icon'=>'fa-desktop',
		'title'=>'裸单实盘',
		'page'=>'/admin/aa',
		'open'=>'',
		'submenu'=>array(
				10=>array(
					'icon'=>'fa-caret-right',
					'title'=>'裸单实盘',
					'page'=>'/admin/aab',
					'parentid'=>2,
					),
				11=>array(
					'icon'=>'fa-caret-right',
					'title'=>'裸单实盘2',
					'page'=>'/admin/aaa',
					'parentid'=>2,
					),
			),
	),
	3=>array(
		'icon'=>'fa-list',
		'title'=>'图说公司',
		'page'=>'',
		'open'=>'',
		'submenu'=>array(
				12=>array(
					'icon'=>'fa-caret-right',
					'title'=>'裸单实盘',
					'page'=>'/admin/media',
					'parentid'=>3,
					),
				13=>array(
					'icon'=>'fa-caret-right',
					'title'=>'裸单实盘2',
					'page'=>'/admin/bbb',
					'parentid'=>3,
					),
			),
	),
	4=>array(
		'icon'=>'fa-pencil-square-o',
		'title'=>'财经锐评',
		'page'=>'/admin/index',
		'open'=>'',
	),
	5=>array(
		'icon'=>'fa-tag',
		'title'=>'系统管理',
		'page'=>'/admin/sys',
		'open'=>'',
		'submenu'=>array(
				14=>array(
					'icon'=>'fa-caret-right',
					'title'=>'管理员管理',
					'page'=>'/admin/admin',
					'parentid'=>5,
					),
				15=>array(
					'icon'=>'fa-caret-right',
					'title'=>'角色管理',
					'page'=>'/admin/role',
					'parentid'=>5,
					),
			),
	),
);



$config['encrypt_open'] = true;
$config['md5_prefix']                       = 'myxt';


$config['lottery_id'] = 1;
$config['lottery_key'] = 'aa';
$config['lotterywin_key'] = 'testkey';