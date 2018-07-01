<?php

namespace App\Http\Controllers;

use DB;
use Image;
use Illuminate\Http\Request;
use Storage;

class OrderController extends Controller {

	public $watch = [
		"movement"    => [
			'name' => '机芯',
			0      => '石英机芯',
			1      => '机械机芯',
			2      => '多功能机芯',
		],
		"watch_case"  => [
			'name' => '表壳',
			0      => '不锈钢',
			1      => '18K金',
			2      => '千足金',
			3      => '钻石',
		],
		"watch_face"  => [
			'name' => '字面',
			0      => '普通字面',
			1      => '时位钻字面',
			2      => '满天星字面',
			3      => '多功能字面',
		],
		"watch_band"  => [
			'name' => '表带',
			0      => '牛皮',
			1      => '鳄鱼皮',
			2      => '不锈钢',
			3      => '18K金',
			4      => '千足金',
			5      => '钻石',
		],
		"watch_clasp" => [
			'name' => '表扣',
			0      => '不锈钢',
			1      => '18K金',
			2      => '钻石',
		],

		'error_movement' => [
			0 => '机芯',
			1 => '换电池',
			2 => '停',
			3 => '快',
			4 => '慢',
			5 => '走走停停',
		],
		'error_case'     => [
			0 => '表壳',
			1 => '翻新',
			2 => '补钻',
			3 => '后加钻',
			4 => '更换',
			5 => '定制',
		],
		'error_bezel'    => [
			0 => '表圈',
			1 => '翻新',
			2 => '补钻',
			3 => '后加钻',
			4 => '更换',
			5 => '定制',
		],
		'error_cover'    => [
			0 => '底盖',
			1 => '翻新',
			2 => '更换',
			3 => '定制',
		],

		'error_bade'   => [
			0 => '巴的',
			1 => '翻新',
			2 => '补钻',
			3 => '更换',
			4 => '定制',
		],
		'error_screws' => [
			0 => '螺丝',
			1 => '翻新',
			2 => '更换',
			3 => '定制',
		],
		'error_glass'  => [
			0 => '玻璃',
			1 => '更换',
			2 => '定制',
		],
		'error_pin'    => [
			0 => '表针',
			1 => '更换',
			2 => '定制',
		],
		'error_face'   => [
			0 => '字面',
			1 => '补钻',
			2 => '后加钻',
			3 => '更换',
			4 => '定制',
		],

		'error_band'     => [
			0 => '表带',
			1 => '翻新',
			2 => '补钻',
			3 => '后加钻',
			4 => '更换',
			5 => '定制',
		],
		'error_clasp'    => [
			0 => '表扣',
			1 => '翻新',
			2 => '补钻',
			3 => '后加钻',
			4 => '更换',
			5 => '定制',
		],
		'error_function' => [
			0 => '功能',
			1 => '不防水了',
		],

	];

	/**
	 * @param int $status
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index ($status = 0) {
		$userId = session('user_id', 3);
		$orders = DB::table('t_orders')->where('user_id', $userId)->where(function ($query) use ($status) {
			if($status >= 5) $query->where('status', '>=', 5);
			if($status < 5) $query->where('status', $status);
		})->get();


		foreach ($orders as $order) {
			$watch  = DB::table('t_watch')->where('id', $order->watch_id)->first();
			$user   = DB::table('t_user')->where('id', $userId)->first();
			$images = [];
			$images[1] = DB::table('t_image')->where('watch_id', $watch->id)->where('uploader',1)->get();
			$images[2] = DB::table('t_image')->where('watch_id', $watch->id)->where('uploader',2)->get();

			$courier = null;
			if($watch) {

				$courier = DB::table('t_courier')->where('watch_id', $watch->id)->get();
			}

			$watch = json_decode(json_encode($watch), true);

			foreach ($watch as $k => $v) {
				if(array_key_exists($k, $this->watch)) {
					if(array_key_exists('name', $this->watch[ $k ])) {
						$watch[ $this->watch[ $k ]['name'] ] = $this->watch[ $k ][ $v ];
					} else if($v > 0) {
						$watch[ $this->watch[ $k ][0] ] = $this->watch[ $k ][ $v ];
					}
					unset($watch[ $k ]);
				}
			}

			$order->watch   = $watch;
			$order->user    = $user;
			$order->courier = $courier;
			$order->images = $images;
		}

		return view('index.order', [
			'status' => $status,
			'orders' => $orders,
		]);
	}

	/**
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function close (Request $request) {
		$id     = $request->get('id');
		$update = DB::table('t_orders')->where('id', $id)->update(['status' => 7]);

		if($update) {
			return $this->response();
		}

		return $this->response(-1, '更新订单失败');
	}

	/**
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function submit (Request $request) {
		$id     = $request->get('id');
		$update = DB::table('t_orders')->where('id', $id)->update(['status' => 3]);

		if($update) {
			return $this->response();
		}

		return $this->response(-1, '更新订单失败');
	}

	/**
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function pay (Request $request) {
		$id     = $request->get('id');
		$update = DB::table('t_orders')->where('id', $id)->update(['status' => 5]);

		if($update) {
			return $this->response();
		}

		return $this->response(-1, '更新订单失败');
	}

	/**
	 * 上传图片
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function image (Request $request) {
		$file = $request->file('image');

		// 先保存文件到本地磁盘
		$date = date('Y-m-d');
		$path = "images/{$date}/";

		// 生成随机数名  22位，7位随机数
		$chars = '0123456789';
		$name = date('Ymd_His');
		while (strlen($name) < 22) {
			$name .= substr($chars, (mt_rand() % strlen($chars)), 1);
		}
		$ext  = '.' . $file->getClientOriginalExtension();
		$url  = $path . $name . $ext;
		Storage::put($url, file_get_contents($file->getRealPath()));

		return $this->response(0, 'success', ['src' => '/uploads/' . $url]);
	}

}
