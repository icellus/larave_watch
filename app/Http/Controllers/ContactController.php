<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends Controller
{
	public function contact () {
		return view('index.contact_us');
	}

	public function help () {
		return view('index.help');
	}
}
