<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心 - <?=_get_config('site_name');?></title>

<?php echo _get_html_cssjs('css','reset.css,style.css,index.css,gerenzhongxin.css','css');?>
</head>

<body>
<?php $this->load->view('inc/header');?>


<?php $this->load->view('inc/m_top');?>
<div class="main">
	<?php $this->load->view('inc/m_menu');?>
    <div class="main_R">
    	<div class="weirenzheng_box">
        	<ul>
            	<li><img src="images/tup_07.png" /></li>
                <li class="text01">
                	<span>这里是偶的用户名</span>
                    <span>关注<h6>45</h6></span>
                </li>
                <li><img src="images/weirenz_person.png" />未认证</li>
            </ul>
            <ul>
            	<li class="dengji"><h1>等级9</h1><h2>股农</h2><h3><span></span></h3><h4>股神</h4></li>
                <li><h1>当前经验234/567</h1><h2>下一级</h2><h4>股神</h4></li>
            </ul>
        </div>
        <ul class="jibenzl_box">
        	<li class="current">基本资料</li>
            <li>修改头像</li>
            <li>修改密码</li>
            <li>实名认证</li>
			<li>修改用户名</li>
        </ul>
        <div class="yonghuming">
        	<ul><img src="images/tup_08.png" /></ul>
            <ul>
            	<li class="yhm">这里是偶的用户名<img src="images/bi.png" /></li>
                <li class="phone">1585858558<span>已验证</span></li>
                <li class="e-mail">1234**78@qq.com<span>尚未进行验证</span></li>
                <li class="qq"><input type="text" placeholder="1234****78" /></li>
                <li class="shenfyz">点击此处进行身份验证</li>
            </ul>
        </div>
    </div>
</div>


<?php $this->load->view('inc/footer');?>

<?php echo _get_html_cssjs('js','jquery-1.11.3.min.js,jquery.form.js,page/common/header.js,page/common/show.js,page/user/login.js','js');?>

</body>
</html>