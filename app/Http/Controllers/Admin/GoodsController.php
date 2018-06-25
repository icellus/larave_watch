<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Breadcrumbs;
use DB;
use Illuminate\Http\Request;

class GoodsController extends BaseController
{

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
	 * Create a new controller instance.
	 * @return void
	 */
	public function __construct ()
	{
		parent::__construct();

		// 面包屑样式
		Breadcrumbs::setView('admin._partials.breadcrumbs');
	}

	public function index ()
	{

		Breadcrumbs::register('admin-goods', function($breadcrumbs) {
			$breadcrumbs->parent('dashboard');
			$breadcrumbs->push('预约工单', route('admin.reserve'));
		});

		$data = DB::table('t_orders')->paginate(10);

		foreach ($data as $v) {
			//			$v->info = DB::table('t_watch')->where('id', $v->watch_id)->first();
			//			$v->courier = DB::table('t_courier')->where('watch_id',$v->info->id)->get();
			$v->user = DB::table('t_user')->where('id', $v->user_id)->first();
		}

		//		$users = $this->adminUser->paginate(10);
		return view('admin.goods.index', [
			'data' => $data,
		]);
	}

	public function detail (Request $request)
	{
		Breadcrumbs::register('admin-goods-detail', function($breadcrumbs) {
			$breadcrumbs->parent('dashboard');
			$breadcrumbs->push('预约工单', route('admin.reserve'));
		});

		$id    = $request->get('id');
		$order = DB::table('t_orders')->where('id', $id)->first();

		$watch = DB::table('t_watch')->where('id', $order->watch_id)->first();
		$watch = json_decode(json_encode($watch), true);

		foreach ($watch as $k => $v) {
			if (array_key_exists($k, $this->watch)) {
				if (array_key_exists('name', $this->watch[ $k ])) {
					$watch['watch'][ $this->watch[ $k ]['name'] ] = $this->watch[ $k ][ $v ];
				} else if ($v > 0) {
					$watch['error'][ $this->watch[ $k ][0] ] = $this->watch[ $k ][ $v ];
				}
				unset($watch[ $k ]);
			}
		}

		$courier = DB::table('t_courier')->where('watch_id', $watch['id'])->get();

		return view('admin.goods.detail', [
			'order'   => $order,
			'watch'   => $watch,
			'courier' => $courier,
		]);
	}

	public function submit (Request $request)
	{
		$id = $request->get('id');

		// 查询当前订单状态
		$update = false;
		$status = DB::table('t_orders')->where('id', $id)->value('status');
		if ($status === null) {
			return $this->response(-1, '无效订单');
		} else if ($status == 1) {
			$update = DB::table('t_orders')->where('id', $id)->update(['status' => 2]);
		} else if ($status == 3) {
			$update = DB::table('t_orders')->where('id', $id)->update(['status' => 5]);
		}

		if ($update) {
			return $this->response();
		}

		return $this->response(-1, '更新订单失败');
	}

	public function price (Request $request) {
		$id = $request->get('id');
		$price = $request->get('price');

		$order = DB::table('t_orders')->where('id',$id)->first();
		if ($order->status < 3) {
			$update = DB::table('t_orders')->where('id', $id)->update(['repair_price' => $price]);
		}else{
			$update = DB::table('t_orders')->where('id', $id)->update(['extra_price' => $price]);
		}

		return $this->response();
	}
}