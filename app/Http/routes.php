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
Route::group(['middleware' => ['admin']], function() {
	Route::get('/', function() {
		return redirect('/index');
	});

	Route::get('/index', 'IndexController@index');
	Route::get('/charge', 'ChargeController@index');

	route::any('/verify', 'ChargeController@verify'); // 校验验证码
	route::any('/sendsms','ChargeController@sendSms');
	Route::any('/reserve', 'ChargeController@reserve'); // 预约

	// 下单
	Route::post('/image', 'OrderController@image');

	// 支付流程页面
	Route::get('/goods', 'GoodsController@goods');
	Route::any('/error', 'GoodsController@error');
	Route::get('/errorpage', 'GoodsController@errorPage');
	Route::any('/contact', 'GoodsController@contact');
	Route::any('/watch', 'GoodsController@watch');

	// 订单详情页
	Route::get('/order/{status?}', 'OrderController@index');

	//联系我们  客服帮助
	Route::get('/contactUs', 'ContactController@contact');
	Route::get('/help', 'ContactController@help');
});