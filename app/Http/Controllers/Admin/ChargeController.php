<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Breadcrumbs;
use DB;
use Illuminate\Http\Request;

class ChargeController extends BaseController
{

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

		Breadcrumbs::register('admin-reserve', function($breadcrumbs) {

			$breadcrumbs->parent('dashboard');
			$breadcrumbs->push('预约工单', route('admin.reserve'));
		});

		$data = DB::table('t_reserve')->paginate(10);

		foreach ($data as $v) {
			$v->info = DB::table('t_user')->where('id', $v->user_id)->first();
		}

		//		$users = $this->adminUser->paginate(10);
		return view('admin.charge.index', [
			'data' => $data,
		]);
	}


	public function handle (Request $request) {
		$id = $request->get('id');

		$update = DB::table('t_reserve')->where('id',$id)->update([
			'handle_time' => date('Y-m-d H:i:s'),
			'status' => 1
		]);

		if ($update) {
			return $this->response();
		}

		return $this->response(-1,'提交失败');
	}
}
