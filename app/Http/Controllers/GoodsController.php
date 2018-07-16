<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class GoodsController extends Controller {

	public function goods () {
		return view('index.goods');
	}

	/**
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function error (Request $request) {
		$data = $request->all();

		foreach ($data as &$v) {
			if($v && $v[0] == ',') {
				$v = substr($v, 1);
				unset($v);
			}
		}

		$courier = [
			'type' => $data['courier'],
		];

		$id = DB::table('t_watch')->insertGetId($data);

		$courier['watch_id']     = $id;
		$courier['payment_type'] = 1;
		DB::table('t_courier')->insert($courier);

		session(['watch_id' => $id]);

		return $this->response();
	}

	public function errorPage () {
		$id      = session('watch_id');
		$info    = null;
		$courier = null;
		if($id) {
			$info    = DB::table('t_watch')->where('id', $id)->first();
			$courier = DB::table('t_courier')->where('watch_id', $id)->where('payment_type', 0)->first();
		}

		session(['watch_id' => $id]);

		return view('index.error', [
			'info'    => $info,
			'courier' => $courier,
		]);
	}

	public function contact (Request $request) {

		$data = $request->all();

		foreach ($data as &$v) {
			if($v && $v[0] == ',') {
				$v = substr($v, 1);
				unset($v);
			}
		}

		$id = $data['id'];
		unset($data['id']);

		$image = $data['img'];
		unset($data['img']);

		DB::table('t_watch')->where('id', $id)->update($data);

		$images = explode(',', $image);
		foreach ($images as $v) {
			if($v) {
				DB::table('t_image')->insert([
					'watch_id'   => $id,
					'uploader'   => 1,
					'img_url'    => $v,
					'created_at' => date('Y-m-d H:i:s'),
				]);
			}
		}

		return $this->response();
	}

	public function watch (Request $request) {
		if($request->method() == 'POST') {
			$data = $request->all();
			$id   = $data['id'];
			unset($data['id']);

			$order = DB::table('t_orders')->where('watch_id', $id)->value('id');

			if($order) {
				return $this->response(0, '', [], '您已经提交过该腕表的维修工单啦！');
			}

			//			// 验证验证码
			//			$this->validate($request, [
			//				'captcha' => 'required|captcha',
			//			]);
			//			unset($data['captcha']);

			// 验证手机验证码
			$check = DB::table('t_verify_codes')
				->where('phone', $data['phone'])
				->where('code', $data['code'])
				->where('used', 0)
				->where('expire_at', '>', date('Y-m-d H:i:s'))
				->first();
			if($check == null) {
				return $this->response(1, 'error code', [], '短信验证码错误');
			}
			DB::table('t_verify_codes')->where('code', $data['code'])->where('phone', $data['phone'])->update(['used' => 1]);
			unset($data['code']);

			// 查询用户信息 如果不在就更新用户信息
			$phone = $data['phone'];
			$user  = (array)$user = DB::table('t_user')->where('phone', $phone)->first();
			if(!$user) {
				$user = [
					'phone'      => $phone,
					'username'   => $data['name'],
					'created_at' => date('Y-m-d H:i:s'),
				];
				// 写入用户表
				$user['id'] = DB::table('t_user')->insertGetId($user);

			}
			if(!$user['username']) {
				DB::table('t_user')->where('phone', $phone)->update(['username' => $data['name']]);
				$user['username'] = $data['name'];
			}
			// 存一下session
			session(['user_id' => $user['id'], 'phone' => $user['phone'], 'username' => $user['username']]);
			unset($data['name']);
			unset($data['phone']);

			// 更新用户地址信息
			DB::table('t_watch')->where('id', $id)->update([
				'user_id'  => $user['id'],
				'province' => $data['province'],
				'city'     => $data['city'],
				'district' => $data['district'],
				'area'     => $data['area'],
			]);

			// 生成一笔订单  2位随机数
			$chars = '0123456789';
			$code  = date('YmdHis');
			while (strlen($code) < 16) {
				$code .= substr($chars, (mt_rand() % strlen($chars)), 1);
			}
			$order = [
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
