<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AssignGuard {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        if ($guard != null) {
            $user = auth($guard)->user();
            if (!$user) {

                return response()->json(
                        [
                            "statusCode" => 401,
                            "message" => 'Token is Invalid'
        ],401);
               // return response()->json(['status' => 'Token is Invalids']);
            }
            auth()->shouldUse($guard);
        }
        return $next($request);
    }

}
