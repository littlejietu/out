
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
        	<?php if(!empty($this->loginID)):?>
                <a href="/m/">个人中心</a>/<a href="/user/login/out">退出</a>
            <?php else:?>
                <a href="/reg">注册</a>/<a href="/user/login">登录</a>
            <?php endif?>
        </div>
    </div>
</div>