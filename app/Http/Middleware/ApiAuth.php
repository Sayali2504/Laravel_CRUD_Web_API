<?php

namespace App\Http\Middleware;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Closure;
use App\Models\Api;

class ApiAuth {

    protected $helper;

    public function __construct() {
        
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!isset($_SERVER['HTTP_APP_KEY']) || !isset($_SERVER['HTTP_APP_SECRET'])) {
            return response()->json([
                        "statusCode" => FALSE,
                        "message" => "App key or Secret not provided"
                            ], 401);
        }

        $app_key = $_SERVER['HTTP_APP_KEY'];
        $app_secret = $_SERVER['HTTP_APP_SECRET'];
        if (empty($app_key) || empty($app_secret)) {
            return response()->json([
                        "statusCode" => FALSE,
                        "message" => "invalid App key or Secret "
                            ], 401);
        }
        $check = Api::where('app_key', $app_key)->where('secret_key', $app_secret)->first();
//        $isAdmin = $this->helper->AuthenticateUser(array("user" => $user, "pass" => $pass));
        if (!$check) {
            return response()->json([
                        "statusCode" => FALSE,
                        "message" => "invalid App key or Secret "
                            ], 401);
        }
        

        return $next($request);
    }

}
