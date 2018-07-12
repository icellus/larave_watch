$(function () {
    $('.list-inline li').click(function () {
        if ($(this).is('.question_but')) {
            if ($(this).is('.question_but-active')) {
                $(this).removeClass("question_but-active");
            } else {
                $(this).addClass("question_but-active").siblings().removeClass("question_but-active")
            }
        }
    })
    $('.new-pick li').click(function () {
        if ($(this).is('.question_but')) {
            $(this).addClass("question_but-active").siblings().removeClass("question_but-active")
        }
    })
    // 验证码
    var times = 60;
    $('.SendCode').click(function () {
        if ($(this).text() == "发送验证码") {
            var phone = $("input[name='phone']").val();
            if (phone.length == 0) {
                alert("请输入手机号码");
                return false
            }
            if (!/^1[345789]\d{9}$/.test(phone)) {
                alert("请输入正确的手机号码");
                return false
            }
            $.get('/sendsms', {phone: phone}, function (data) {
                if (data.code == 0) {
                    var getcode = setInterval(function () {
                        $('.SendCode').text("发送成功(" + times + ")");
                        times--;
                        if (times == 0) {
                            clearInterval(getcode);
                            $('.SendCode').text("发送验证码");
                            times = 60;
                        }
                    }, 1000)
                }
            })
        }
    })

    $('.new-login-bg').click(function () {
        $(this).fadeOut();
        $($('.new-login')).fadeOut();
    })
    $('.new-login-header span').click(function () {
        $('.new-login-bg').fadeOut();
        $($('.new-login')).fadeOut();
    })

//old.js
    $('.right-menu').click(function () {
        $('.right-sub-menu').fadeToggle(500)
    })

    var orderList = function () {
        var t = {};
        t.init = function () {
            $('.orderListPart').click(function () {
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

    $('#img-captcha').click(function () {
        // $('.right-sub-menu').fadeToggle(500)
        $('#img-captcha').attr('src', "/captcha/default?OTF0v3P2" + Math.random())
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
        var movement = '';
        var watch_case = '';
        var watch_face = '';
        var watch_band = '';
        var watch_clasp = '';
        var height = $("input[name='height']").val();
        var comment = $("#comment").val();
        $('#movement li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                movement = $(this).data('id');
                return;
            }
        })
        $('#watch_case li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                watch_case = $(this).data('id');
                return;
            }
        })
        $('#watch_face li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                watch_face = $(this).data('id');
                return;
            }
        })
        $('#watch_band li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                watch_band = $(this).data('id');
                return;
            }
        })
        $('#watch_clasp li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                watch_clasp = $(this).data('id');
                return;
            }
        })

        //所有图片是否上传完毕
        var allUploaded = false;
        //用户没选择图片直接设置为true
        if ($('.upload-box .image-box .upload-section .image-section.waiting-upload').length === 0)
            allUploaded = true;
        //手表照片上传
        $('.upload-box').find('.image-box .upload-section').each(function () {
            var _this = this;
            var image_section = $(_this).find('.image-section');
            if (image_section.length === 0)//未选择图片
                return;

            var img = image_section.find('img.image-show');
            if (img.attr('src').substring(0, 10) !== 'data:image')//data:image开头表示还未上传
                return;//图片已上传跳出本次循环

            //开始上传
            var formData = new FormData();
            var fileData = $(_this).closest('.upload-section').find('.upload-btn input[type="file"]').get(0).files[0];//取得该input框中文件对象
            formData.append('image', fileData);
            img.hide();//隐藏图片
            image_section.find('.image-delete').hide();//隐藏删除图标
            $(_this).addClass('image-loading');//显示loading
            $.ajax({
                url: '/image',
                type: "post",
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (data) {
                    $(_this).removeClass('image-loading');
                    img.attr('src', data.data.src).show();
                    image_section.removeClass('waiting-upload').find('.image-delete').show();//去掉图片还未上传标志，隐藏删除图标

                    //检查是否所有图片上传完毕
                    if ($('.upload-box .image-box .upload-section .image-section.waiting-upload').length === 0)
                        allUploaded = true;
                },
                error: function (e) {
                    imageSection.remove();
                    imageBox.children('.image-section').show();
                    // 执行失败回调函数
                    var callback = config.error;
                    callback(e);

                }
            });

        });

        //等待图片上传完毕，才能执行页面跳转操作
        var timer = setInterval(function () {
            if (allUploaded) {
                clearInterval(timer);

                //收集图片src
                var imgs = [];
                $('.wacth-up-photo .image-section .image-show').each(function () {
                    imgs.push($(this).attr('src'));
                });
                imgs = imgs.join(',');//数组转字符串

                var id = $("input[name='id']").val();

                if (!id) {
                    alert('请先填写腕表详细情况');
                }
                $.post('/contact', {
                    id: id,
                    img: imgs,
                    movement: movement,
                    watch_case: watch_case,
                    watch_band: watch_band,
                    watch_face: watch_face,
                    watch_band: watch_band,
                    watch_clasp: watch_clasp,
                    height: height,
                    watch_comment: comment,
                }, function (data) {
                    window.location.href = '/watch';
                })
            }
        }, 200);


    });

    $('#errorSubmit').click(function () {
        var error_movement = '';
        var error_case = '';
        var error_bezel = '';
        var error_cover = '';
        var error_bade = '';
        var error_screws = '';
        var error_glass = '';
        var error_pin = '';
        var error_face = '';
        var error_band = '';
        var error_clasp = '';
        var error_function = '';
        var courier = '';
        var error_comment = $("#error_comment").val();
        $('#error_movement li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                error_movement = $(this).data('id');
                return;
            }
        })
        $('#error_case li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                error_case = $(this).data('id');
                return;
            }
        })
        $('#error_bezel li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                error_bezel = $(this).data('id');
                return;
            }
        })
        $('#error_cover li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                error_cover = $(this).data('id');
                return;
            }
        })
        $('#error_bade li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                error_bade = $(this).data('id');
                return;
            }
        })
        $('#error_screws li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                error_screws = $(this).data('id');
                return;
            }
        })
        $('#error_glass li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                error_glass = $(this).data('id');
                return;
            }
        })
        $('#error_pin li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                error_pin = $(this).data('id');
                return;
            }
        })
        $('#error_face li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                error_face = $(this).data('id');
                return;
            }
        })
        $('#error_band li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                error_band = $(this).data('id');
                return;
            }
        })
        $('#error_clasp li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                error_clasp = $(this).data('id');
                return;
            }
        })
        $('#error_function li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                error_function = $(this).data('id');
                return;
            }
        })
        $('#courier li').each(function (index, element) {
            if ($(element).is('.question_but-active')) {
                courier = $(this).data('id');
                if (!courier) {
                    courier = ''
                }
                return;
            }
        })


        $.post('/error', {
            error_movement: error_movement,
            error_case: error_case,
            error_bezel: error_bezel,
            error_cover: error_cover,
            error_bade: error_bade,
            error_screws: error_screws,
            error_glass: error_glass,
            error_pin: error_pin,
            error_face: error_face,
            error_band: error_band,
            error_clasp: error_clasp,
            error_function: error_function,
            error_comment: error_comment,
            courier: courier
        }, function (data) {
            window.location.href = '/goods';
        })
    })

    $('#register-button').click(function () {
        var captcha = $("input[name='imgcode']").val();
        var phone = $("input[name='phone']").val();
        var code = $("input[name='code']").val();
        $.ajax({
            type: "POST",
            url:'/register',
            data:{
                captcha:captcha,
                phone:phone,
                code:code,
            },
            dataType:'json',
            success: function(data) {
                $('#img-captcha').attr('src', "http://watch.com/captcha/default?OTF0v3P2" + Math.random())
                if (data.code == 1) {
                    alert('短信验证码错误')
                }
                if (data.code == 0) {
                    window.location.href = '/user';
                }
            },
            error : function (msg) {
                $('#img-captcha').attr('src', "http://watch.com/captcha/default?OTF0v3P2" + Math.random())
                if (msg.status == 422) {
                    alert('图片验证码错误');
                } else {
                    alert('服务器连接失败');
                    return ;
                }
            }
        });
    })


    $('html').click(function () {
        if ($('#Validform_msg').css('display') == 'block') {
            $('#Validform_msg').css('display', 'none');
        }
    })
})