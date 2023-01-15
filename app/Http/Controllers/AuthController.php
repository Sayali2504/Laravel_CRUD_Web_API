<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\app_user;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
//use App\Http\Controllers\Helpers;
use App\Helpers;
use App\Models\Upload;
use App\Models\Adminlog;

class AuthController extends ApiController
{
    public function __construct() {
        $this->middleware('auth:app_api', ['except' => ['login', 'register']]);
    }

    public function register(Request $request) {
   
        $rules=[
            'email' => 'required|email|unique:users',
            'mobile' => 'required|min:10|max:10|unique:users',
            'password' => 'required'
        ];

$validator=Validator::make($request->all(),$rules);
if($validator->fails()){
   return ApiController::apiValidate($validator->errors());
}
            
        $fname = $request->firstname;
        $lname = $request->lastname;
        $email = $request->email;
        $mobile= $request->mobile;
        $password  =  Hash::make($request->password);

       
        $appuser = app_user::where('mobile', $mobile)->orWhere('email', $email)->first();

        if (!$appuser) {

                   
            $users = new app_user ;
            $users->first_name = $fname;
            $users->last_name = $lname;
            $users->email = $email;
            $users->mobile = $mobile;
            $users->password = $password;
            $users->save();
            return $this->apiSuccess("Registered Successfully");

        }else {
            return response()->json(
                        [
                            "statusCode" => 422,
                            "name" => 'ValidateErrorException',
                            "message" => 'User already exist',
                            "data" => ""
                        ], 422);

        }
      

        

    }

    public function login(Request $request){


      $rules=[
        'email' => 'required_without:mobile',
        'mobile' => 'required_without:email',
        'password' => 'required'
    ]; 
    
    

    $validator=Validator::make($request->all(),$rules);
    if($validator->fails()){
    return ApiController::apiValidate($validator->errors());
    }
        

    $mob = $request['mobile'];
    $email = $request['email'];
    $password  = $request->password;

    if($mob != '')
    {
        $user = DB::table('users')->where('mobile', $mob)->first();
        $credentials = ['mobile' => $mob, 'password' =>$password];
    }

    if($email !='')
    {
        $user = DB::table('users')->where('email', $email)->first();
        $credentials = ['email' => $email, 'password' =>$password];
    }

    $pwd = Hash::check($password, $user->password);
  
    if(!$pwd)
    {
         $data=array('error' => 'ValidateErrorException');
       return response()->json(
                        [
                            "statusCode" => 422,
                            "name" => 'ValidateErrorException',
                            "message" => 'Invalid credentials',
                            "data" => $data
                        ], 422);

    }
     else {
        
            $user = $this->retrieveByCredentials($credentials);
            if ($token = $this->guard('app_api')->login($user)) {
                return $this->createNewToken($token);
            }
    }
   
    }

   
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        
      auth('app_api')->logout();
        return response()->json(['message' => 'User successfully signed out']);
       
    }

    public function refresh() {
        return $this->createNewToken(auth('app_api')->refresh());
    }


     
  
    protected function createNewToken($token){
                        $user = auth('app_api')->user();
                        $id=$user['id'];
                        $name=$user['first_name'];
                        $email=$user['email'];
                        $mobile=$user['mobile'];
                        $profile_img = $user['profile_pic'];
                        $created_at=$user['created_at'];
                        $updated_at=$user['updated_at'];
                       
                        $data=array('access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('app_api')->factory()->getTTL() * 60,
            'id'=>$id,
            'name'=>$name,
            'email'=>$email,
            'mobile'=>$mobile,
            'created_at'=>$created_at,
            'updated_at'=>$updated_at,);

                        return response()->json([
                    'statusCode' => 200,
                    'message' =>'Data retrieval successfully',
                    'data' => $data,
                  
                        ], 200);
    
        
    }

    
    public function guard() {
        return Auth::guard('api');
    }

    public function retrieveByCredentials(array $credentials) {
        if (empty($credentials) ||
                (count($credentials) === 1 &&
                Str::contains($this->firstCredentialKey($credentials), 'password'))) {
            return;
        }

        
        $query = $this->newModelQuery();

        foreach ($credentials as $key => $value) {
            if (Str::contains($key, 'password')) {
                continue;
            }

            if (is_array($value) || $value instanceof Arrayable) {
                $query->whereIn($key, $value);
            } else {
                $query->where($key, $value);
            }
        }

        return $query->first();
    }
      protected function newModelQuery($model = null) {

     return is_null($model) ? $this->createModel()->newQuery() : $model->newQuery();
    }

  public function createModel() {
        $model = 'App\Models\ApplicationUser';
        $class = '\\' . ltrim($model, '\\');

        return new $class;
    } 

   

}

