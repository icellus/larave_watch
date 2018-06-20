<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Tools\Phone;
use DB;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
	//

	public function index ()
	{
		return view('index.charge');
	}

	/**
	 * todo 添加手机短信验证码验证
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function reserve (Request $request)
	{
		// 图片验证码
		$this->validate($request, [
			'captcha' => 'required|captcha',
		]);

		$phone = $request->get('phone');

		$userId = DB::table('t_user')->where('phone', $phone)->value('id');

		if (!$userId) {
			// 写入用户表
			$name   = '';
			$userId = DB::table('t_user')->insertGetId([
				'phone'      => $phone,
				'username'   => $name,
				'created_at' => date('Y-m-d H:i:s'),
			]);

			// 存一下cookie
			session(['user_id' => $userId, 'phone' => $phone, 'username' => $name]);
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

		$check = DB::table('t_verify_codes')
			->where('phone', $phone)
			->where('code', $code)
			->where('used', 0)
			->where('expire_at', '>', date('Y-m-d H:i:s'))
			->first();
		if ($check != null) {
			return $this->response();
		}

		return $this->response(1, 'error code');
	}


	public function sendSms (Request $request)
	{
		$phone = $request->get('phone');

		$code    = $checkCode = random_int(1000, 9999);//验证码
		$message = "【xxx】您的验证码是 " . $code . ",验证码将于5分钟后失效。如非本人操作，请忽略本短信";
		$result  = Phone::send($phone, $message);

		if ($result['code'] == 0) {
			// 写入验证码表
			$info = [
				'phone'      => $phone,
				'code'       => $code,
				'data'       => $message,
				'expire_at'  => date('Y-m-d H:i:s', time() + 5 * 60),
				'created_at' => date('Y-m-d H:i:s', time()),
			];

			DB::table("t_verify_codes")->insert($info);

			return $this->response();
		}

		return $this->response(-1,'request fail!',[],'发送短信失败');
	}
}
