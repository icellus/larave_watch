$('.submitBtn').on('click',function(){
    var price = parseFloat($('#price').val()).toFixed(2);
    if( isNaN(price) )
    {
        swal('价格输入框请输入合法数字');
        return false;
    }
    price = price * 100;
    $('#price').val(price);
});