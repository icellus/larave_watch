<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Breadcrumbs;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');

        Breadcrumbs::register('dashboard', function ($breadcrumbs) {
            $breadcrumbs->push('Dashboard', route('admin.home'));
        });
    }
}
