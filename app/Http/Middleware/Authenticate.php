<?php


namespace App\Http\Middleware;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Closure;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$roles)
    {
        
        try {
        //Access token from the request        
            $token = JWTAuth::parseToken();
            //Try authenticating user       
            $user = $token->authenticate();
        } catch (TokenExpiredException $e) {
            //Thrown if token has expired        
            return $this->unauthorized('Your token has expired. Please, login again.');
        } catch (TokenInvalidException $e) {
            //Thrown if token invalid
            return $this->unauthorized('Your token is invalid. Please, login again.');
        }catch (JWTException $e) {
            //Thrown if token was not found in the request.
            return $this->unauthorized('Please, attach a Bearer Token to your request');
        }
        //If user was authenticated successfully and user is in one of the acceptable roles, send to next request.
        // if($user)
        // {
        //     print_r($user);exit;
        //       print_r($role = preg_grep('/^'.$user->type.'/', $roles));exit;
        // }
        if ($user && $role = preg_grep('/^'.$user->type.'/', $roles)) {

            $key = array_keys($role);
            $get_role = explode(':', $role[$key[0]]);
            if ( count($get_role) == 2 ){
                $get_function = explode('@', $get_role[1]);
                if (!in_array($request->route()->getActionMethod(), $get_function)){
                    return $this->unauthorized();
                }
            }
            return $next($request);
        }

        return $this->unauthorized();
    }

    private function unauthorized($message = null){
        return response()->json([
            'message' => $message ? $message : 'You are unauthorized to access this resource',
            'success' => false
        ], 401);
    }
}