<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心 - <?=_get_config('site_name');?></title>

<?php echo _get_html_cssjs('css','reset.css,style.css,index.css,gerenzhongxin.css','css');?>
</head>

<body>
<?php $this->load->view('inc/m_header');?>


<?php $this->load->view('inc/m_top');?>
<div class="main">
	<?php $this->load->view('inc/m_menu');?>

    

    <div class="main_R">
        <div class="sixin_box">
            <ul class="shoujianx">
                <li class="shoujx">收件箱</li>
                <dl class="delete">删除</dl>
                <dl class="biaoji">标记已读</dl>
                <dl class="xiesixin">写私信</dl>
            </ul>
            <ul class="fajianr">
                <h1></h1>
                <h2></h2>
                <h3>发件人</h3>
                <h4>主题</h4>
                <h5>时间</h5>
            </ul>
            <ul class="fajianr fajianr1">
                <dl>
                    <h1></h1>
                    <h2 class="message"></h2>
                    <h3 class="xitong">系统</h3>
                    <h4 class="xitongxx"><span>系统信息：</span>恭喜您完成实名认证！线赠送您100局币，您可...</h4>
                    <h5>5分钟前</h5>
                </dl>
                <dl>
                    <h1></h1>
                    <h2 class="message"></h2>
                    <h3 class="xitong">局外人</h3>
                    <h4 class="xitongxx"><span>怎么提现：</span>我有好多的局币了，这个怎么提现出来呢？你不...</h4>
                    <h5>2分钟前</h5>
                </dl>
                <dl>
                    <h1></h1>
                    <h2 class="message_open"></h2>
                    <h3 class="xitong">阿凡达</h3>
                    <h4 class="xitongxx"><span>可以开几个直播间：</span>我现在有一个直播间，我还想开个房间...</h4>
                    <h5>1天前</h5>
                </dl>
                 <dl>
                    <h1></h1>
                    <h2 class="message_open"></h2>
                    <h3 class="xitong">阿凡达</h3>
                    <h4 class="xitongxx"><span>回复：</span>在哪里开啊，我看了下，没有找到你说的那个房间2...</h4>
                    <h5>1天前</h5>
                </dl>
                 <dl>
                    <h1></h1>
                    <h2 class="message_open"></h2>
                    <h3 class="xitong">阿凡达</h3>
                    <h4 class="xitongxx"><span>回复：</span>哦，我看到了，为什么我用局币增加不了房间啊！2...</h4>
                    <h5>1天前</h5>
                </dl>
                 <dl class="afanda">
                    <h1></h1>
                    <h2 class="message_open"></h2>
                    <h3 class="xitong">阿凡达</h3>
                    <h4 class="xitongxx"><span>回复：</span>哦，找到了，每个账号只能开一个频道是吧，子房间...</h4>
                    <h5>1天前</h5>
                </dl>
                <ul>
                    <li class="page1">跳至</li>
                    <li class="page2">1</li>
                    <li class="page3">2</li>
                    <li class="page4">3</li>
                    <li class="page5">4</li>
                    <li class="page2"></li>
                    <li class="page7">页</li>
                </ul>
            </ul>
        </div>
    </div>


     
</div>


<?php $this->load->view('inc/footer');?>

<?php echo _get_html_cssjs('js','jquery-1.11.3.min.js,jquery.form.js,page/common/header.js,page/common/show.js,page/user/login.js','js');?>

</body>
</html>