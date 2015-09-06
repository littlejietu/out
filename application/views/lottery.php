
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
  <meta content="yes" name="apple-mobile-web-app-capable">
  <meta content="black" name="apple-mobile-web-app-status-bar-style">
  <meta content="telephone=no" name="format-detection">
  <title>限时安家现金红包，抢抢抢</title>
  <link rel="stylesheet" type="text/css" href="<?php echo _get_cfg_path('css')?>style.css">
</head>
<body>

  <div class="container">
    <div class="logo">
      <img src="<?php echo _get_cfg_path('images')?>title.png">
    </div>
    <div class="dzp">
      <img class="dzpImg" src="<?php echo _get_cfg_path('images')?>dzp.png">
      <div class="pointer">
        <img src="<?php echo _get_cfg_path('images')?>pointer.png">
      </div>
    </div>
    <div class="text">
      <h3>奖品列表</h3>
      <table>
        <tr>
          <td>一等奖</td>
          <td>20000元安家现金红包</td>
        </tr>
        <tr>
          <td>二等奖</td>
          <td>10000元安家现金红包</td>
        </tr>
        <tr>
          <td>三等奖</td>
          <td>5000元安家现金红包</td>
        </tr>
        <tr>
          <td>四等奖</td>
          <td>1000元安家现金红包</td>
        </tr>
        <tr>
          <td>五等奖</td>
          <td>300元安家现金红包</td>
        </tr>
        <tr>
          <td>六等奖</td>
          <td>100元安家现金红包</td>
        </tr>
        <tr>
          <td>七等奖</td>
          <td>50元安家现金红包</td>
        </tr>
        <tr>
          <td>八等奖</td>
          <td>10元安家现金红包</td>
        </tr>
      </table>
    </div>
    <div class="text">
      <h3>奖品列表</h3>
      <p>1.活动时间：7月28日10:00—12:00</p>
      <p>2.活动期间，每人将有3次参与大转盘的机会</p>
      <p>3.安家现金红包将直接充值到个人账户，可在【个人中心】—【我的钱包】查看</p>
      <p>4.本活动最终解释权归杭州极瑞科技有限公司所有</p>
      <p class="addColor">如遇到问题，请联系客服400-987-6088</p>
    </div>
  </div>
</body>
</html>
<script type="text/javascript"  src="<?php echo _get_cfg_path('js')?>jquery-1.11.3.min.js"></script>
<script type="text/javascript">
  $(function () {
    var msg = function(text,fun){
      $('body').append('<div id="msg-full"><div id="msg"><p>' + text + '</p><span>好</span></div></div>');
      $('#msg span').on('click', function () {
        $('#msg-full').remove();
        fun && fun();
      });
    }
    var price = ["亲，没机会了哟","20000","10000","5000","1000","300","100","50","10"];
    $(".pointer img").bind('click', function() {
      $.ajax({ 
        url: "/lottery/start", 
        data: "", 
        success: function(res){console.log(res);console.log(res.code);
          if(res.code>0){//data.message
              var num = res.code;
              var deg = 45*(8 - num) -23;
              var rotateDeg = deg + 360 * 4;
              $('.dzpImg').css({"webkitTransition":" all 2s ease-out","webkitTransform":"rotate(" + rotateDeg +"deg)"});
              setTimeout(function(){//转完之后重置一下转动角度并弹框弹出相应信息
                $(".dzpImg").css({"webkitTransition":"all 0s ease-out","webkitTransform":"rotate("+ deg +"deg)"});
                msg("恭喜获得"+ price[num] +"元现金红包，<br>已充值到个人账户--"+data.message);
              },2000);

          }else{
              msg(price[0]);
          }
        }
      });
    });
  });
</script>