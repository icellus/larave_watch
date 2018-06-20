

var uploader = function () {
    var u = {};
    u.init = function () {
        var config = {
            url: '/image', //上传的服务器地址
            data: {},
            zoom: false, //允许放大
            allowType: ["gif", "jpeg", "jpg", "bmp",'png'], //允许上传图片的类型
            maxSize :2, //允许上传图片的最大尺寸，单位M
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

        var imageInput = $('.upload-input');
        var imageSection = imageInput.parent('.upload-section');
        var imageBox = imageInput.parent().parent(".image-box");
        var inputName = imageInput.attr('name');

        // 设置是否在上传中全局变量
        var isUploading = false;

        // 触发上传操作
        $('.upload-section').click(function () {

            $(this).children('.upload-input').change(function () {
                var imageSection = $("<section class='image-section image-loading'></section>");
                var imageShade = $("<div class='image-shade'></div>");
                var imageShow = $("<img class='image-show image-opcity' />");
                var imageInput = $("<input class='" + inputName + "' name='" + inputName + "[]' value='' type='hidden'>");
                var imageZoom = $("<div class='image-zoom'></div>");
                var imageDelete = $("<div class='image-delete'></div>");


                // 隐藏上传框
                $(this).children('.upload-input').hide();
                $(this).parent('.image-box').prepend(imageSection);


                imageShade.appendTo(imageSection);
                imageDelete.appendTo(imageSection);
                // 判断是否开启缩放功能
                if (config.zoom && config.zoom === true) {
                    imageZoom.appendTo(imageSection);
                }

                imageShow.appendTo(imageSection);
                imageInput.appendTo(imageSection);

                handleFileSelect();
            });
        });

        // 上传操作
        var handleFileSelect = function () {
            if (typeof FileReader == "undefined") {
                return false;
            }

            var postUrl = config.url;
            var maxSize = config.maxSize;

            if (!postUrl) {
                // todo 弹出样式优化
                alert('请设置要上传的服务端地址');
                return false;
            }


            var files = imageInput[0].files;
            var fileObj = files[0];

            // 只能上传图片文件
            if (!fileObj || !fileObj.type.match('image.*')) {
                return false;
            }


            var fileSize = (fileObj.size) / (1024 * 1024);
            if (fileSize > maxSize) {
                alert('上传图片不能超过' + maxSize + 'M，当前上传图片的大小为' + fileSize.toFixed(2) + 'M');
                return false;
            }

            if (isUploading == true) {
                alert('文件正在上传中，请稍候再试！');
                return false;
            }

            // 将上传状态设为正在上传中
            isUploading = true;

            // 执行前置函数
            var callback = config.before;
            if (callback && callback() === false) {
                return false;
            }


            ajaxUpload();
        };
        var ajaxUpload = function () {
            // 获取最新的
            var imageSection = $('.image-section:first');
            var imageShow = $('.image-show:first');

            var formData = new FormData();

            var fileData = imageInput[0].files;

            if (fileData) {
                // 目前仅支持单图上传
                formData.append(inputName, fileData[0]);
            }

            var postData = config.data;

            if (postData) {
                for (var i in postData) {
                    formData.append(i, postData[i]);
                }
            }

            // ajax提交表单对象
            $.ajax({
                url: config.url,
                type: "post",
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (data) {
                    if (data.code == 0) {
                        data = data.data;
                    }
                    if (!data.src) {
                        alert('服务器返回的json数据中必须包含src元素');
                        imageBox.children('.image-section').show();
                        imageSection.remove();
                        return false;
                    }

                    imageSection.removeClass("image-loading");
                    imageShow.removeClass("image-opcity");

                    imageShow.attr('src', data.src);
                    imageShow.siblings('input').val(data.src);
                    // 将上传状态设为非上传中
                    isUploading = false;

                    // 执行成功回调函数
                    var callback = config.success;
                    callback(data);

                },
                error: function (e) {
                    imageSection.remove();
                    imageBox.children('.image-section').show();
                    // 执行失败回调函数
                    var callback = config.error;
                    callback(e);

                }
            });

        };


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
                deleteImageSection.remove();
                imageBox.children('.upload-section').show();
                deleteModal.hide();
            });

            // 取消删除
            $(".cancel-btn").click(function () {
                deleteModal.hide();
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


