<?php

namespace App\Http\Middleware;

use Closure;
use Route;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	// 加入请求日志
//			if (!is_string($data)) {
//				$msg = var_export($data, true);
//			} else {
//				$msg = $data;
//			}

		$msg = $request->getUri();

			$timeStamp = time();
			$timeStr   = date('y-m-d G:i:s', $timeStamp);
			error_log("[$timeStr] $msg\n", '3', storage_path('logs/' . date('Y-m-d') . '.log'));

        return $next($request);
    }
}
