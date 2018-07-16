

var uploader = function () {
    var u = {};
    u.init = function () {
        var config = {
            url: '/image', //上传的服务器地址
            data: {},
            zoom: false, //允许放大
            allowType: ["gif", "jpeg", "jpg", "bmp",'png'], //允许上传图片的类型
            maxSize :5, //允许上传图片的最大尺寸，单位M
            before: function () {
                // alert('上传前回调函数');
            },
            success:function(data){
                // alert('上传成功回调函数');
                console.log(data);
            },
            error:function (e) {
                // alert('上传失败回调函数');
                console.log(e);
            }
        };

        var imageInput = $('.upload-btn');
        var imageBox = imageInput.parent().parent(".image-box");



        // 触发上传操作
        imageInput.click(function () {
            var _this =  this;
            var $input = $('<input type="file" name="image" accept="image/*" style="display:none">');
            $input.get(0).click();//选择文件
            $input.change(function () {
                var imageSection = $("<section class='image-section waiting-upload'></section>");
                var imageShade = $("<div class='image-shade'></div>");
                var imageShow = $("<img class='image-show ' />");
                var imageZoom = $("<div class='image-zoom'></div>");
                var imageDelete = $("<div class='image-delete'></div>");

                imageShade.appendTo(imageSection);
                imageDelete.appendTo(imageSection);

                // 判断是否开启缩放功能
                if (config.zoom && config.zoom === true) {
                    imageZoom.appendTo(imageSection);
                }

                imageShow.appendTo(imageSection);
                //预览图片
                var file = this.files[0];
                var size = file.size;
                //检测图片大小
                if( size > config.maxSize * 1024 * 1024 )
                {
                    alert('图片不能大于2');
                    return false;
                }
                var fr = new FileReader();
                fr.onloadend = function(e) {
                    imageSection.find('img').attr('src',e.target.result);
                    $(_this).hide();//隐藏上传按钮
                    $(_this).after(imageSection);
                    $(_this).html($input);//input放到页面，方便上传图片时搜集文件
                };
                fr.readAsDataURL(file);

            });
        });






        var createDeleteModal = function () {

            var deleteModal = $("<aside class='delete-modal'><div class='modal-content'><p class='modal-tip'>您确定要删除作品图片吗？</p><p class='modal-btn'> <span class='confirm-btn'>确定</span><span class='cancel-btn'>取消</span></p></div></aside>");
            // 创建删除模态框
            deleteModal.appendTo('.image-box');

            // 显示弹框
            imageBox.delegate(".image-delete", "click", function () {
                // 声明全局变量
                deleteImageSection = $(this).parent();
                deleteModal.show();
            });

            // 确认删除
            $(".confirm-btn").click(function () {
                deleteImageSection.parent().find('.upload-btn').show();
                deleteImageSection.closest('.upload-section').find('.upload-btn').html('');//删除图片同时删除对应input框

                deleteImageSection.remove();
                deleteModal.hide();
            });

            // 取消删除
            $(".cancel-btn").click(function () {
                deleteModal.remove();
            });
        };

        var createImageZoom = function () {

            var zoomWindow = $("<div id='zoom-window'></div>");
            var zoomShade = $("<div id='zoom-shade'></div>");
            var zoomBox = $("<div id='zoom-box'></div>");
            var zoomContent = $("<img src='http://www.jq22.com/demo/jqueryfancybox201707292345/example/4_b.jpg'>");

            zoomWindow.append(zoomShade);
            zoomWindow.append(zoomBox);
            zoomContent.appendTo(zoomBox);
            $("body").append(zoomWindow);

            // 显示弹框
            imageBox.delegate(".image-zoom", "click", function () {

                var src = $(this).siblings('img').attr('src');
                zoomBox.find('img').attr('src', src);
                zoomWindow.show();

            });

            // 关闭弹窗
            $("body").delegate("#zoom-shade", "click", function () {
                zoomWindow.hide();
            });

        };


        // 判断是否开启缩放功能
        if (config.zoom && config.zoom === true) {
            createImageZoom();
        }

        createDeleteModal();
    };
    return u;
}();
uploader.init();


