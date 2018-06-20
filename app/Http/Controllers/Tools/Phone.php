<?php

namespace App\Http\Controllers\Tools;
use LogicException;

class Phone
{

	public static function send ($mobile, $text)
	{

		$apikey = 'xxxxxxxxxxx'; //修改为您的apikey(https://www.yunpian.com)登录官网后获取
		$ch     = curl_init();
		/* 设置验证方式 */
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Accept:text/plain;charset=utf-8',
			'Content-Type:application/x-www-form-urlencoded',
			'charset=utf-8',
		]);
		/* 设置返回结果为流 */
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		/* 设置超时时间*/
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		/* 设置通信方式 */
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		// 发送短信
		$data = ['text' => $text, 'apikey' => $apikey, 'mobile' => $mobile];

		curl_setopt($ch, CURLOPT_URL, 'https://sms.yunpian.com/v2/sms/single_send.json');
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		$result = curl_exec($ch);
		$error  = curl_error($ch);
		if ($result === false) {
			throw new LogicException('curl error!' . $error);
		}

		$array = json_decode($result, true);
		curl_close($ch);

		return $array;
	}

}

