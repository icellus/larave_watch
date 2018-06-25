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
Route::group(['middleware' => ['admin']], function () {
	Route::get('/', function () {
		return redirect('/index');
	});

	Route::get('/index', 'IndexController@index');
	Route::get('/charge', 'ChargeController@index');

	Route::any('/verify', 'ChargeController@verify'); // 校验验证码
	Route::any('/sendsms', 'ChargeController@sendSms');
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
	Route::post('/order/close', 'OrderController@close');
	Route::post('/order/submit', 'OrderController@submit');

	//联系我们  客服帮助
	Route::get('/contactUs', 'ContactController@contact');
	Route::get('/help', 'ContactController@help');

	Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
		Route::get('/', function () {
			return redirect('/admin/login');
		});
		Route::auth();

		// 预约工单
		Route::get('/reserve', ['as' => 'admin.reserve', 'uses' => 'ChargeController@index']);
		Route::any('/reserve/handle', 'ChargeController@handle');

		// 维修工单
		Route::any('/goods', ['as' => 'admin.goods', 'uses' => 'GoodsController@index']);
		Route::any('/goods/detail', ['as' => 'admin.goods.detail', 'uses' => 'GoodsController@detail']);
		Route::any('/goods/submit', ['as' => 'admin.goods.submit', 'uses' => 'GoodsController@submit']);
		Route::any('/goods/price', ['as' => 'admin.goods.price', 'uses' => 'GoodsController@price']);
		Route::any('/goods/close', ['as' => 'admin.goods.close', 'uses' => 'GoodsController@close']);

		Route::get('/home', ['as' => 'admin.home', 'uses' => 'HomeController@index']);
		Route::resource('admin_user', 'AdminUserController');
		Route::post('admin_user/destroyall', ['as' => 'admin.admin_user.destroy.all', 'uses' => 'AdminUserController@destroyAll']);
		Route::resource('role', 'RoleController');
		Route::post('role/destroyall', ['as' => 'admin.role.destroy.all', 'uses' => 'RoleController@destroyAll']);
		Route::get('role/{id}/permissions', ['as' => 'admin.role.permissions', 'uses' => 'RoleController@permissions']);
		Route::post('role/{id}/permissions', ['as' => 'admin.role.permissions', 'uses' => 'RoleController@storePermissions']);
		Route::resource('permission', 'PermissionController');
		Route::post('permission/destroyall', ['as' => 'admin.permission.destroy.all', 'uses' => 'PermissionController@destroyAll']);
		Route::resource('blog', 'BlogController');
	});
});