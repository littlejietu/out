<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>登录 - <?=_get_config('site_name');?></title>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <?php echo _get_html_cssjs('admin_css','bootstrap.css,font-awesome.css,ace-fonts.css,ace.css','css');?>


        <!--[if lte IE 9]>
            <?php echo _get_html_cssjs('admin_css','ace-part2','css');?>
        <![endif]-->
        <?php echo _get_html_cssjs('admin_css','ace-rtl.css','css');?>

        <!--[if lte IE 9]>
          <?php echo _get_html_cssjs('admin_css','ace-ie.css','css');?>
        <![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <?php echo _get_html_cssjs('admin_js','html5shiv.js,respond.js','js');?>
        <![endif]-->
    </head>

    <body class="login-layout">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center">
                                <h1>
                                    <i class="ace-icon fa fa-leaf green"></i>
                                    <span class="red"><?=_get_config('site_name');?></span>
                                    <span class="white" id="id-text2">管理平台</span>
                                </h1>
                                <h4 class="blue" id="id-company-text">跨域 技术支持</h4>
                            </div>

                            <div class="space-6"></div>

                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger">
                                                <i class="ace-icon fa fa-coffee green"></i>
                                                请登录
                                            </h4>

                                            <div class="space-6"></div>

                                            <form action="" method="post">
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" />
                                                            <i class="ace-icon fa fa-user"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
                                                            <i class="ace-icon fa fa-lock"></i>
                                                        </span>
                                                    </label>

                                                    <div class="space"></div>

                                                    <div class="clearfix">
                                                        <label class="inline">
                                                            <span class="lbl" id="codeimg"> 
                                                                <img class="xtml-15" id="yzimg" src="/util/captcha_admin?<?php echo rand(10000,9999);?>" onclick="this.src='/util/captcha_admin?'+Math.random()" alt="验证码" >
                                                            </span>
                                                            </span>
                                                        </label>

                                                        <input type="text" name="code" id="code" class="pull-right form-control width-30" placeholder="验证码" />
                                                    </div>
                                                    <div class="clearfix">
                                                        <button type="button" class="width-35 pull-right btn btn-sm btn-primary" id="btnLogin">
                                                            <i class="ace-icon fa fa-key"></i>
                                                            <span class="bigger-110">登录</span>
                                                        </button>
                                                    </div>

                                                    <div class="space-4"></div>
                                                    <div id="resultMsg"></div>
                                                </fieldset>
                                            </form>

                                           

                                        </div><!-- /.widget-main -->

                                        <div class="toolbar clearfix">
                                            <div>
                                                <a href="/" target="_blank" data-target="#forgot-box" class="forgot-password-link">
                                                    <i class="ace-icon fa fa-arrow-left"></i>
                                                    首页
                                                </a>
                                            </div>

                                            <div>
                                                <a href="/reg" target="_blank" data-target="#signup-box" class="user-signup-link">
                                                    注册
                                                    <i class="ace-icon fa fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /.widget-body -->
                                </div><!-- /.login-box -->

                            </div><!-- /.position-relative -->

                            <div class="navbar-fixed-top align-right">
                                <br />
                               
                                &nbsp; &nbsp; &nbsp;
                            </div>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.main-content -->
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo _get_cfg_path('admin_js')?>jquery.js'>"+"<"+"/script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo _get_cfg_path('admin_js')?>jquery.mobile.custom.js'>"+"<"+"/script>");
        </script>

        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function($) {
            // $(document).on('click', '.toolbar a[data-target]', function(e) {
            //    e.preventDefault();
            //    var target = $(this).data('target');
            //    $('.widget-box.visible').removeClass('visible');//hide others
            //    $(target).addClass('visible');//show target
            // });
                $("#btnLogin").bind('click',function(){
                    var param = {};
                    param.username = $("#username").val();
                    param.password = $("#password").val();
                    param.code = $("#code").val();

                    $.ajax({
                        url:"/admin/login",
                        data:param,         //JSON.stringify()
                        type:"post",
                        dataType:"json",
                        //contentType: 'application/json; charset=utf-8',
                        success:function(data){
                            if(data.code == "Success"){
                                $("#username").val("");
                                $("#password").val("");
                                $("#code").val("");
                            }
                            else
                                $("#resultMsg").html(data.message);
                        }
                    });
                });//#btnLogin
            });
        </script>
    </body>
</html>


