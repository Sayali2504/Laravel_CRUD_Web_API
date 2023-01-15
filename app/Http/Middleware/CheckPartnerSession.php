<?php

namespace App\Http\Middleware;

/**
 * Description of Pertner Login
 * 
 * @author Leometric
 * 
 * developed by Akshay 
 * Copyright 2018 Leometric Technology Pvt. Ltd. All Rights Reserved.
 */
use App\Models\User;
use Closure;
use Session;

class CheckPartnerSession {

    public function handle($request, Closure $next) {
        $is_login = FALSE;
        if (Session::has('user_id')) {
            $partner = User::where('id', Session::get('user_id'))->first();
            if ($partner) {
                $is_login = TRUE;
            }
        }
        if ($is_login) {
            return $next($request);
        } else {
            return redirect()->to('/')->with('error', 'Session time out please login to continue');
        }
    }

}