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
	}

	public function index () {

		Breadcrumbs::register('admin-users', function ($breadcrumbs) {

			$breadcrumbs->parent('dashboard');
			$breadcrumbs->push('会员中心', route('admin.user'));
		});

		$data = DB::table('t_user')->orderBy('created_at', 'desc')->paginate(10);

		foreach ($data as $v) {
			$pay = DB::table('t_orders')
				->whereIn('status',[5,6])
				->sum('price');

			$v->pay = $pay ? $pay : 0;
		}

		//		$users = $this->adminUser->paginate(10);
		return view('admin.user.index', [
			'data' => $data,
		]);
	}
}
