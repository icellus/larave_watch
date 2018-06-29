<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class GoodsController extends Controller
{

	public function goods ()
	{

		return view('index.goods');
	}

	public function error (Request $request)
	{
		dd($request->all());
		$id = DB::table('t_watch')->insertGetId($request->all());
		session(['watch_id' => $id]);

		return $this->response();
	}

	public function errorPage (Request $request)
	{
		$id      = session('watch_id');
		$info    = null;
		$courier = null;
		if ($id) {
			$info    = DB::table('t_watch')->where('id', $id)->first();
			$courier = DB::table('t_courier')->where('watch_id', $id)->where('payment_type', 0)->first();
		}

		session(['watch_id' => $id]);

		return view('index.error', [
			'info'    => $info,
			'courier' => $courier,
		]);
	}

	public function contact (Request $request)
	{
		$data = $request->all();
		$id   = $data['id'];
		unset($data['id']);

		$courier = [
			'watch_id' => $id,
			'type'     => $data['courier'],
			'number'   => $data['number'],
		];
		unset($data['courier']);
		unset($data['number']);

		$update = DB::table('t_watch')->where('id', $id)->update($data);
		$insert = DB::table('t_courier')->insert($courier);

		return $this->response();
	}

	public function watch (Request $request)
	{
		if ($request->method() == 'POST') {
			$data = $request->all();
			$id   = $data['id'];
			unset($data['id']);

			$order = DB::table('t_orders')->where('id', $id)->value('id');

			if ($order) {
				return $this->response(0, '', [], '您已经提交过该腕表的维修工单啦！');
			}

			// 验证验证码
			$this->validate($request, [
//				'captcha' => 'required|captcha',
			]);
			unset($data['captcha']);


			// 验证手机验证码
			$check = DB::table('t_verify_codes')
				->where('phone', $data['phone'])
				->where('code', $data['code'])
				->where('used', 0)
				->where('expire_at', '>', date('Y-m-d H:i:s'))
				->first();
			if ($check == null) {
//				return $this->response(1, 'error code',[],'短信验证码错误');
			}
//			DB::table('t_verify_codes')->where('code', $data['code'])->where('phone', $data['phone'])->update(['used' => 1]);
			unset($data['code']);

			$phone = $data['phone'];
			$user  = (array)$user = DB::table('t_user')->where('phone', $phone)->first();
			if (!$user) {
				$user = [
					'phone'      => $phone,
					'username'   => $data['name'],
					'created_at' => date('Y-m-d H:i:s'),
				];
				// 写入用户表
				$user['id'] = DB::table('t_user')->insertGetId($user);

			}
			if (!$user['username']) {
				DB::table('t_user')->where('phone', $phone)->update(['username' => $data['name']]);
				$user['username'] = $data['name'];
			}
			// 存一下session
			session(['user_id' => $user['id'], 'phone' => $user['phone'], 'username' => $user['username']]);
			unset($data['name']);
			unset($data['phone']);

			// 生成一笔订单
			$chars = '0123456789';
			$code  = date('YmdHis');
			while (strlen($code) < 10) {
				$code .= substr($chars, (mt_rand() % strlen($chars)), 1);
			}
			$order   = [
				'uid'        => $code,
				'user_id'    => $user['id'],
				'watch_id'   => $id,
				'created_at' => date('Y-m-d H:i:s'),
			];
			DB::table('t_orders')->insert($order);

			return $this->response(0, 'request success', [], '提交成功，请前往维修工单查看订单详情');
		}

		return view('index.contact');
	}

}
