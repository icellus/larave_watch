<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',function () {
	return redirect('/index');
});

Route::get('/index','IndexController@index');
Route::get('/charge','ChargeController@index');

route::any('/verify','ChargeController@verify'); // 校验验证码
Route::any('/reserve','ChargeController@reserve'); // 预约


// 订单详情页
Route::get('/order','OrderController@index');
// 下单
Route::get('/order/create','OrderController@order');
Route::get('/image','OrderController@image');


// 支付流程页面
Route::get('/goods','GoodsController@goods');
Route::get('/error','GoodsController@error');
Route::get('/contact','GoodsController@contact');



//联系我们  客服帮助
Route::get('/contactUs','ContactController@contact');
Route::get('/help','ContactController@help');
