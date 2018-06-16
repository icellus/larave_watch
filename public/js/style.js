$(function () {
    $('.right-menu').click(function () {
        $('.right-sub-menu').fadeToggle(500)
    })
    $('.watch-case-list span').click(function () {
        // $(this).addClass("wacth-active").siblings().removeClass("wacth-active");
        if ($(this).is('.wacth-active')) {
            $(this).removeClass("wacth-active");
        } else {
            $(this).addClass("wacth-active").siblings().removeClass("wacth-active");
        }
    })

    var orderList = function () {
        var t = {};
        t.init = function () {
            $('.orderListPart').click(function () {
                $("#order").removeClass("active");
                $(this).addClass("active");
                $(".watch-detail").removeClass("active");
                $(this).children(".watch-detail").addClass("active");
                $(".watch-detail:not(.active)").hide(300);

                $(this).children('.watch-detail').hide(100);
                if ($(this).children('.watch-detail').is(':hidden')) {
                    $(this).children('.watch-detail').css('display', 'block');
                }
            })
            var t = $(this).data('id');
            if (t) {
                $(".#order[data-id=" + t + "]").click()
            }
        };
        return t
    }();
    orderList.init();


    // $('.WorkOrderDetails-list>div>div').click(function () {
    //     $('.WorkOrderDetails-intial').css('display', 'none');
    //     $('.WorkOrderDetails-list>div>div').removeClass("WorkOrderDetails-active");
    //     $(this).addClass("WorkOrderDetails-active");
    //     // console.log($(this).index());
    //     switch ($(this).index()) {
    //         case 0:
    //             $('.watch-Totality>div').eq(0).css('display', 'block').siblings().css('display', 'none');
    //             break;
    //         case 1:
    //             $('.watch-Totality>div').eq(1).css('display', 'block').siblings().css('display', 'none');
    //             break;
    //         case 2:
    //             $('.watch-Totality>div').eq(2).css('display', 'block').siblings().css('display', 'none');
    //             break;
    //         case 3:
    //             $('.watch-Totality>div').eq(3).css('display', 'block').siblings().css('display', 'none');
    //             break;
    //         case 4:
    //             $('.watch-Totality>div').eq(4).css('display', 'block').siblings().css('display', 'none');
    //             break;
    //         case 5:
    //             $('.watch-Totality>div').eq(5).css('display', 'block').siblings().css('display', 'none');
    //             break;
    //     }
    // })
    $('#img-captcha').click(function () {
        // $('.right-sub-menu').fadeToggle(500)
        $('#img-captcha').attr('src', "http://watch.com/captcha/default?OTF0v3P2" + Math.random())
    })

    // 预约表单验证
    $(".bookingform").Validform({
        btnSubmit: ".bookingSubmit",
        ajaxPost: true,
        postonce: true,
        callback: function (data) {
            // 刷新验证码
            $('#img-captcha').attr('src', "http://watch.com/captcha/default?OTF0v3P2" + Math.random())
        }
    });

    $('#goodsSubmit').click(function () {
        var movement='';
        var watch_case='';
        var watch_face='';
        var watch_band='';
        var watch_clasp='';
        var height=$("input[name='height']").val();
        var comment=$("input[name='comment']").val();
        $('#movement span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                movement = $(this).data('id');
                return;
            }
        })
        $('#watch_case span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                watch_case = $(this).data('id');
                return;
            }
        })
        $('#watch_face span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                watch_face = $(this).data('id');
                return;
            }
        })
        $('#watch_band span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                watch_band = $(this).data('id');
                return;
            }
        })
        $('#watch_clasp span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                watch_clasp = $(this).data('id');
                return;
            }
        })


        $.post('/error',{
            movement : movement,
            watch_case : watch_case,
            watch_band : watch_band,
            watch_face : watch_face,
            watch_band : watch_band,
            watch_clasp : watch_clasp,
            height : height,
            watch_comment : comment,
        },function (data) {
            window.location.href = '/errorpage';
        })
    })

    $('#errorSubmit').click(function () {
        var error_movement='';
        var error_case='';
        var error_bezel='';
        var error_cover='';
        var error_bade='';
        var error_screws='';
        var error_glass='';
        var error_pin='';
        var error_face='';
        var error_band='';
        var error_clasp='';
        var error_function='';
        var courier='';
        var error_comment=$("input[name='error_comment']").val();
        var number=$("input[name='number']").val();
        var id=$("input[name='id']").val();
        $('#error_movement span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                error_movement = $(this).data('id');
                return;
            }
        })
        $('#error_case span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                error_case = $(this).data('id');
                return;
            }
        })
        $('#error_bezel span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                error_bezel = $(this).data('id');
                return;
            }
        })
        $('#error_cover span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                error_cover = $(this).data('id');
                return;
            }
        })
        $('#error_bade span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                error_bade = $(this).data('id');
                return;
            }
        })
        $('#error_screws span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                error_screws = $(this).data('id');
                return;
            }
        })
        $('#error_glass span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                error_glass = $(this).data('id');
                return;
            }
        })
        $('#error_pin span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                error_pin = $(this).data('id');
                return;
            }
        })
        $('#error_face span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                error_face = $(this).data('id');
                return;
            }
        })
        $('#error_band span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                error_band = $(this).data('id');
                return;
            }
        })
        $('#error_clasp span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                error_clasp = $(this).data('id');
                return;
            }
        })
        $('#error_function span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                error_function = $(this).data('id');
                return;
            }
        })
        $('#courier span').each(function (index, element) {
            if ($(element).is('.wacth-active')) {
                courier = $(this).data('id');
                return;
            }
        })


        if (!id) {
            alert('请先填写腕表详细情况');
        }
        $.post('/contact',{
            error_movement : error_movement,
            error_case : error_case,
            error_bezel : error_bezel,
            error_cover : error_cover,
            error_bade : error_bade,
            error_screws : error_screws,
            error_glass : error_glass,
            error_pin : error_pin,
            error_face : error_face,
            error_band : error_band,
            error_clasp : error_clasp,
            error_function : error_function,
            error_comment : error_comment,
            number : number,
            courier : courier,
            id : id
        },function (data) {
            window.location.href = '/watch';
        })
    })


    $('html').click(function () {
        if ($('#Validform_msg').css('display') == 'block') {
            $('#Validform_msg').css('display', 'none');
        }
    })
})