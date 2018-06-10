<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class GoodsController extends Controller
{

	public function goods () {

		return view('index.goods');
	}

	public function error () {
		return view('index.error');
	}

	public function contact () {
		return view('index.contact');
	}
}
