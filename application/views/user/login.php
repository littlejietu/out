<?php $this->load->view('inc/header');?>

<div class="login_box">
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
        <form class="form_login">
        	<input class="username" type="text" placeholder="用户名&nbsp;/&nbsp;邮箱" />
            <input class="username password" type="password" placeholder="密码" />
            <li>
            	<p><input class="checkbox" type="checkbox" /></p><span class="jizhuwo">记住我</span><span class="wangjmm">忘记密码</span>
            </li>
        </form>
        <dl>
        	<button>登陆</button>
            <button>免费注册</button>
        </dl>
    </div>  
</div>

<?php $this->load->view('inc/footer');?>
