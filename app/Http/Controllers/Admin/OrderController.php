<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB,Breadcrumbs;
use App\Http\Requests;

class OrderController extends BaseController
{
	/**
	 * Create a new controller instance.
	 * @return void
	 */
	public function __construct () {
		parent::__construct();
		// 面包屑样式
		Breadcrumbs::setView('admin._partials.breadcrumbs');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index () {

		Breadcrumbs::register('admin-order', function ($breadcrumbs) {
			$breadcrumbs->parent('dashboard');
			$breadcrumbs->push('财务统计', route('admin.order'));
		});
		// 月流水
		$count = DB::table('t_orders')
			->where('status',6)
			->where('finish_time','like','%'.date('Y-m').'%')
			->sum('price');
		$month = DB::table('t_orders')
			->where('status',6)
			->where('finish_time','like','%'.date('Y-m').'%')
			->sum('price');
		$order = DB::table('t_orders')
			->where('status',6)
			->paginate(10);


		foreach ($order as $v) {
			$v->user = DB::table('t_user')->where('id',$v->user_id)->first();
		}


		$count = $count ? $count : 0;
		$month = $month ? $month : 0;
		return view('admin.order.index',[
			'count' => $count,
			'month' => $month,
			'order' => $order
		]);
	}
}
