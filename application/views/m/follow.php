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
        <div class="wodegz_box">
            <ul>
                <?php foreach ($list['rows'] as $key => $a):

/*print_r($a);*/
                 ?>
                <li>

                    <dl>
                        <img src="<?php echo _get_cfg_path('images')?>toux.png">
                        <div class="play"></div>
                    </dl>
                    <dt>
                        <h1><?=$a['room']?></h1>
                        <h2>房主名字</h2>
                        <h3><p>已开播22分钟</p><span>4455</span></h3>
                        <h4><p>正在直播</p><span>取消关注</span></h4>
                    </dt>
                </li>
                <li>
                
                    <dl>
                        <img src="<?php echo _get_cfg_path('images')?>toux.png">
                        <div class="play"></div>
                    </dl>
                    <dt>
                        <h1><?=$a['room']?></h1>
                        <h2>房主名字</h2>
                        <h3><p>已开播22分钟</p><span>4455</span></h3>
                        <h4><p>正在直播</p><span>取消关注</span></h4>
                    </dt>
                </li>
                <li>
                
                    <dl>
                        <img src="<?php echo _get_cfg_path('images')?>toux.png">
                        <div class="play"></div>
                    </dl>
                    <dt>
                        <h1><?=$a['room']?></h1>
                        <h2>房主名字</h2>
                        <h3><p>已开播22分钟</p><span>4455</span></h3>
                        <h4><p>正在直播</p><span>取消关注</span></h4>
                    </dt>
                </li>
                <li>
                
                    <dl>
                        <img src="<?php echo _get_cfg_path('images')?>toux.png">
                        <div class="play"></div>
                    </dl>
                    <dt>
                        <h1><?=$a['room']?></h1>
                        <h2>房主名字</h2>
                        <h3><p>已开播22分钟</p><span>4455</span></h3>
                        <h4><p>正在直播</p><span>取消关注</span></h4>
                    </dt>
                </li>
                <?php endforeach;?>
                

            </ul>
        </div>
    </div>
</div>


<?php $this->load->view('inc/m_footer');?>

<?php echo _get_html_cssjs('js','jquery-1.11.3.min.js,jquery.form.js,page/common/header.js,page/common/show.js,page/user/login.js','js');?>

</body>
</html>