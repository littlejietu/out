$(function(){
	$(".right .top a").click(function(){
		$(".right .top a").removeClass("the")
		$(this).addClass("the")	
	})
	function moveup(){
			$(".gund_box .gd_left ul").animate({top:-33},1000,function(){
				$(".gund_box .gd_left ul li:first").insertAfter(".gund_box .gd_left ul li:last")
				$(this).css({top:0})
			})
			$(".gund_box .gd_right ul").animate({top:-33},1000,function(){
				$(this).css({top:0})
					$(".gund_box .gd_right ul li:first").insertAfter(".gund_box .gd_right ul li:last")	
				})
			
	}
	setInterval(moveup,3500)
	$(".form .text").focus(function(){
			$(this).val("")
		}).blur(function(){
			$(this).val("关键字/股票代码")	
		})
	$(".main .main_R .jibenzl_box li").click(function(){
		$(".main .main_R .jibenzl_box li").removeClass("current");
		$(this).addClass("current");	
	})
	$(".main .main_R .sqzbj_box .radio_box div").click(function(){
		$(".main .main_R .sqzbj_box .radio_box div").removeClass("bgimg1");
		$(this).addClass("bgimg1");	
	})
	$(".main .main_R .sqzbj_box .shenfzzp_box .gushi_box ul").hide();
	$(".main .main_R .sqzbj_box .shenfzzp_box .gushi_box").toggle(function(){
		$(".main .main_R .sqzbj_box .shenfzzp_box .gushi_box ul").show();	
	},function(){
			$(".main .main_R .sqzbj_box .shenfzzp_box .gushi_box ul").hide();
		})
	$(".login_box .login dl:first dt:last-child").click(function(){
		$(".login_box").hide();	
	})
		
})