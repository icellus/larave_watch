<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

	/**
	 * 生成 json 响应
	 *
	 * @param int    $code
	 * @param string $msg
	 * @param string $data
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function response ($code = 0, $msg = 'request success',$data = '',$info = '提交成功')
	{
		return response()->json([
			'code' => $code,
			'msg'  => $msg,
			'data' => $data,
			'info' => $info,
		]);
	}
}
