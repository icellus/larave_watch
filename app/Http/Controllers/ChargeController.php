<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
	//

	public function index ()
	{
		return view('index.charge');
	}

	// 预约
	public function reserve (Request $request)
	{
		// 验证验证码
		$this->validate($request, [
			'captcha' => 'required|captcha',
		]);

		$phone = $request->get('phone');

		$userId = DB::table('t_user')->where('phone', $phone)->value('id');

		if (!$userId) {
			// 写入用户表
			$userId = DB::table('t_user')->insertGetId([
				'phone'      => $phone,
				'username'   => '',
				'created_at' => date('Y-m-d H:i:s'),
			]);
		}

		$insert = DB::table('t_reserve')->insert([
			'user_id'    => $userId,
			'phone'      => $phone,
			'created_at' => date('Y-m-d H:i:s'),
		]);

		return $this->response();
	}

	public function verify (Request $request)
	{
		$phone = $request->input('phone', '');
		$code  = $request->input('code', '');

		$check = DB::table('t_verify_code')
			->where('phone', $phone)
			->where('code', $code)
			->where('used', 0)
			->where('expire_at', '>', date('Y-m-d H:i:s'))
			->first();
		if ($check != null) {
			DB::table('t_verify_code')->where('code', $code)->where('phone', $phone)->update(['used' => 1]);

			return $this->response();
		}

		return $this->response(1, 'error code');
	}
}
