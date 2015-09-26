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
                <?php foreach ($list['rows'] as $key => $a):?>
                <dl>
                    <h1></h1>
                    <h2 class="message"></h2>
                    <h3 class="xitong"><?=$a['type']?></h3>
                    <h4 class="xitongxx"><span><?=$a['title']?>：</span><?=$a['message']?></h4>
                    <h5>5分钟前</h5>
                </dl>
                <?php endforeach;?>

                <ul class="page">
                      <?=$list['pages']?>
                </ul>                
            </ul>
        </div>
    </div>
</div>
<?php $this->load->view('inc/m_footer');?>

<?php echo _get_html_cssjs('js','jquery-1.11.3.min.js,jquery.form.js,page/common/header.js,page/common/show.js,page/user/login.js','js');?>
</body>
</html>