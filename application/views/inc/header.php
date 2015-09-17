<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo _get_html_cssjs('js','jquery.js,header.js','js');?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=empty($page_title)?'':$page_title; ?> - <?=_get_config('site_name');?></title>

<?php echo _get_html_cssjs('css','reset.css,style.css,index.css,zhuceye.css','css');?>
</head>

<body>
<div class="header">
	<div class="w1158">
    	<div class="logo fl"><a href="#"><img src="<?php echo _get_cfg_path('images')?>logo.png" /></a></div>
        <ul class="nav fl">
        	<li class="shouy"><a href="">首页</a></li>
        	<li class="the">
            	<a href="">股市资讯</a>
                <img src="<?php echo _get_cfg_path('images')?>rectangle.png" />
                <div class="the_menu">
                	<dd><a href="">财经锐评</a></dd>
                    <dt><a href="">图说公司</a></dt>
                </div>
            </li>
        	<li class="sssp"><a href="/">实时实盘</a></li>
        </ul>
        <form class="form">
        	<input class="text" type="text" value="关键字/股票代码" />
            <input class="button" type="button" />
        </form>
        <div class="reg fr">
        	<a href="#">注册</a>/<a href="#">登录</a>
        </div>
    </div>
</div>