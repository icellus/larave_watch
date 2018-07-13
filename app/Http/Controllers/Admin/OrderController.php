<?php

namespace App\Http\Controllers\Admin;

use DB, Breadcrumbs;
use Illuminate\Http\Request;

class OrderController extends BaseController {
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
			->whereIn('status', [5, 6])
			->where('finish_time', 'like', '%' . date('Y-m') . '%')
			->sum('price');
		$month = DB::table('t_orders')
			->whereIn('status', [5, 6])
			->where('finish_time', 'like', '%' . date('Y-m') . '%')
			->sum('price');
		$order = DB::table('t_orders')
			->whereIn('status', [5, 6])->orderBy('created_at', 'desc')
			->paginate(10);

		foreach ($order as $v) {
			$v->user = DB::table('t_user')->where('id', $v->user_id)->first();
		}

		$count = $count ? $count : 0;
		$month = $month ? $month : 0;

		return view('admin.order.index', [
			'count' => $count,
			'month' => $month,
			'order' => $order,
		]);
	}

	public function month (Request $request) {
		Breadcrumbs::register('admin-order-month', function ($breadcrumbs) {
			$breadcrumbs->parent('dashboard');
			$breadcrumbs->push('月度统计', route('admin.order.month'));
		});

		//
		$page = $request->get('page', 1);
		// 算一下月份

		$order = DB::table('t_orders')
			->whereIn('status', [5, 6])->orderBy('created_at', 'desc')
			->get();
		$list  = [];
//		$now   = strtotime(date('Y-m'));
//		// 一年十二月的月份
//		for ($i = 0; $i < 10; $i++) {
//			$list[ date('Y-m', strtotime("-{$i} months", $now)) ] = [
//				'count' => 0,
//				'price' => 0,
//			];
//		}

		foreach ($order as $v) {
			if($v->pay_time) {
				$list[ date('Y-m', strtotime($v->pay_time)) ][] = $v;
			} else {
				$list[ date('Y-m', strtotime($v->created_at)) ][] = $v;
			}
		}

		foreach ($list as &$v) {
			$price = 0;
			foreach ($v as $k1 => $v1) {
				if(is_numeric($k1)) {
					$price += $v1->price;
				}
			}

			$v['count'] = count($v);
			$v['price'] = $price;

			unset($v);
		}

		$listData = [];

		return view('admin.order.month', [
			'order' => $list,
		]);
	}
}
