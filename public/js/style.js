$(function(){
  	$('.right-menu').click(function(){
    	$('.right-sub-menu').fadeToggle(500)
  	})
  	$('.watch-case-list span').click(function(){
  		// $(this).addClass("wacth-active").siblings().removeClass("wacth-active");
  		if ($(this).is('.wacth-active')) {
  			$(this).removeClass("wacth-active");
  		}else{
  			$(this).addClass("wacth-active").siblings().removeClass("wacth-active");
  		}
  	})
	$('.WorkOrderDetails-list>div>div').click(function(){
	  	$('.WorkOrderDetails-intial').css('display','none');
	  	$('.WorkOrderDetails-list>div>div').removeClass("WorkOrderDetails-active");
	  	$(this).addClass("WorkOrderDetails-active");
	  	// console.log($(this).index());
	  	switch($(this).index()){
			case 0:
			  $('.watch-Totality>div').eq(0).css('display','block').siblings().css('display','none');
			  break;
			case 1:
			  $('.watch-Totality>div').eq(1).css('display','block').siblings().css('display','none');
			  break;
			
			case 2:
			  $('.watch-Totality>div').eq(2).css('display','block').siblings().css('display','none');
			  break;
			case 3:
			  $('.watch-Totality>div').eq(3).css('display','block').siblings().css('display','none');
			  break;
			case 4:
			  $('.watch-Totality>div').eq(4).css('display','block').siblings().css('display','none');
			  break;
			case 5:
			  $('.watch-Totality>div').eq(5).css('display','block').siblings().css('display','none');
			  break;
		}
	})
  	$('.watch-Totality .order-Cancel-determine a').click(function(){
  		$('.order-Cancel-determine a').removeClass("order-active");
  		$(this).addClass("order-active");
  	})

    $('#img-captcha').click(function(){
        // $('.right-sub-menu').fadeToggle(500)
		$('#img-captcha').attr('src',"http://watch.com/captcha/default?OTF0v3P2" + Math.random())
    })

    // 预约表单验证
    var v = $(".bookingform").Validform({
        btnSubmit:".bookingSubmit",
		ajaxPost:true,
		postonce:true,
		callback:function (data) {
            // 刷新验证码
            $('#img-captcha').attr('src',"http://watch.com/captcha/default?OTF0v3P2" + Math.random())
		}
    });




    $('html').click(function(){
        if ($('#Validform_msg').css('display')=='block') {
            $('#Validform_msg').css('display','none');
        }
    })
})