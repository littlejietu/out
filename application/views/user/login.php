<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=empty($page_title)?'':$page_title; ?> - <?=_get_config('site_name');?></title>

<?php echo _get_html_cssjs('css','reset.css,style.css,index.css,login.css','css');?>
</head>

<body>

<?php $this->load->view('inc/header');?>

<div class="login_box" style="position:;">
	<div class="login">
    	<dl>
        	<dt>登录</dt>
            <dt></dt>
        </dl>
        <dl class="qq_login">
        	<dd>
            	<p></p>
                <p>QQ账号登陆</p>
            </dd>
            <dd>
            	<p></p>
                <p>新浪微博登陆</p>
            </dd>
        </dl>
        <form class="form_login" id="xtform" action="" method="post">
            <input class="username" id="username" name="username" type="text" placeholder="用户名 / 邮箱"/>
        	
            <input class="username password" id="password" name="password" type="password" placeholder="密码" />
            <li>
            	<p><input class="checkbox" checked="checked" type="checkbox"  name="rem" id="rem" value="rem" /></p><span class="jizhuwo">记住我</span><span class="wangjmm">忘记密码</span>
            </li>
        
        <dl>
        	<button type="submit">登陆</button>
            <button>免费注册</button>
        </dl>
        </form>
    </div>  
</div>
<br /><br /><br /><br /><br /><br />
<?php $this->load->view('inc/footer');?>

<?php echo _get_html_cssjs('js','jquery-1.11.3.min.js,jquery.form.js,page/common/header.js,page/common/show.js,page/user/login.js','js');?>

</body>
</html>
