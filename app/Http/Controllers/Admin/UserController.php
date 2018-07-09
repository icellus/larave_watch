<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Breadcrumbs;
use App\Http\Controllers\Controller;

class UserController extends BaseController {

	/**
	 * Create a new controller instance.
	 * @return void
	 */
	public function __construct () {
		parent::__construct();

		// 面包屑样式
		Breadcrumbs::setView('admin._partials.breadcrumbs');

		Breadcrumbs::register('admin-users', function ($breadcrumbs) {

			$breadcrumbs->parent('dashboard');
			$breadcrumbs->push('会员中心', route('admin.user'));
		});
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index () {
		$data = DB::table('t_user')->orderBy('created_at', 'desc')->paginate(10);

		foreach ($data as $v) {
			$pay = DB::table('t_orders')
				->where('user_id', $v->id)
				->whereIn('status', [5, 6])
				->sum('price');

			$v->pay = $pay ? $pay : 0;
		}

		//		$users = $this->adminUser->paginate(10);
		return view('admin.user.index', [
			'data' => $data,
		]);
	}

	/**
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function reserve (Request $request) {
		Breadcrumbs::register('admin-users-reserve', function ($breadcrumbs) {

			$breadcrumbs->parent('admin-users');
			$breadcrumbs->push('预约记录', route('admin.user.reserve'));
		});

		$id = $request->get('id');

		$user = DB::table('t_user')->where('id', $id)->first();
		$data = DB::table('t_reserve')->where('user_id', $id)->paginate(10);

		return view('admin.user.reserve', [
			'user' => $user,
			'data' => $data,
		]);
	}

	/**
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function order (Request $request) {
		Breadcrumbs::register('admin-users-order', function ($breadcrumbs) {

			$breadcrumbs->parent('admin-users');
			$breadcrumbs->push('订单记录', route('admin.user.order'));
		});

		$id = $request->get('id');

		$user = DB::table('t_user')->where('id', $id)->first();
		$data = DB::table('t_orders')->where('user_id', $id)->paginate(10);
		// 月流水
		$sum = DB::table('t_orders')
			->whereIn('status', [5, 6])
			->where('user_id', $id)
			->sum('price');

		return view('admin.user.order', [
			'sum'  => $sum,
			'user' => $user,
			'data' => $data,
		]);
	}
}
