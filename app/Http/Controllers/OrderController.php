<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{

	/**
	 * @param int $status
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index ($status = 0)
	{
		$user   = session('user_Id');
		$orders = DB::table('t_order')->where('user_id', $user)->where('status', $status)->get();

		foreach ($orders as $order) {
			$info        = DB::table('t_watch')->where('order_id', $order->id)->first();
			$order->info = $info;
		}

		return view('index.order', [
			'status' => $status,
			'orders' => $orders,
		]);
	}

	// 下单
	public function order ()
	{

	}

	/**
	 * 上传图片
	 *
	 * @param \Illuminate\Http\Request $request
	 */
	public function image (Request $request) {
		$file = $request->file('image');

		$date = date('Y-m-d');
		$request->file('image')->move(public_path("images/{$date}/"),date('Ymd_His'). random_int(1,9999));
	}

}
