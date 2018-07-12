<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session, DB;

class UserController extends Controller {
	public function index () {
		$userId = session('user_id');

		$user = DB::table('t_user')->where('id', $userId)->first();

		return view('index.user', [
			'user' => $user,
		]);
	}

	public function logout () {
		Session::flush();

		return redirect('/user');
	}

	public function register (Request $request) {
		$data = $request->all();
//
//		// 验证验证码
//		$this->validate($request, [
//			'captcha' => 'required|captcha',
//		]);
//		unset($data['captcha']);

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
				'username'   => '',
				'created_at' => date('Y-m-d H:i:s'),
			];
			// 写入用户表
			$user['id'] = DB::table('t_user')->insertGetId($user);
		}

		session(['user_id' => $user['id'], 'phone' => $user['phone'], 'username' => $user['username']]);

		return $this->response();
	}
}
