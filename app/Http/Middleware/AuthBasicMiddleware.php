<?php

namespace App\Http\Middleware;

use Closure;

class AuthBasicMiddleware{
	
	public function handle($request, Closure $next){
		$envs = ['staging', 'production'];
		if(in_array(app()->environment(), $envs)){
			if($request->getUser() != env('USERNAME') || $request->getPassword() != env('PASSWORD')){
				$headers = array('WWW-Authenticate' => 'Basic');
				return response('Unauthorized', 401, $headers);
			}
		}
		return $next($request);
	}
}