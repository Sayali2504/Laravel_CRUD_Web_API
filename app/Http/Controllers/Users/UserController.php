<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\app_user;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Session;

class UserController extends Controller
{
    public function user_list(){
     
      $session_id = Session::get('user_id');

      $users=app_user::get();
      $data= json_decode($users, true);          
      return view('user_data', compact('data'));
      
  }

  public function view_user(Request $request){

    $id= $request->id;
    $users=app_user::where('id',$id)->get();
    $data= json_decode($users, true);          
    return view('view_customer', compact('data'));
    
 } 

 public function display_user(Request $request){

  $id= $request->id;
  $users=app_user::where('id',$id)->get();
  $data= json_decode($users, true);          
  return view('display_user', compact('data'));
  
} 

 public function add_user(Request $request){

  $fname = $request->firstname;
  $lname = $request->lastname;
  $email = $request->email;
  $phone= $request->phone;

  $users = new app_user ;
  $users->first_name = $fname;
  $users->last_name = $lname;
  $users->email = $email;
  $users->mobile = $phone;
  $users->save();

  
  $users=app_user::get();
  $data= json_decode($users, true);          
  return view('user_data', compact('data'));

  
} 


public function update_user(Request $request){

  $fname = $request->firstname;
  $lname = $request->lastname;
  $email = $request->email;
  $phone = $request->phone;
  $id = $request->id;

  $users = app_user::find($id) ;
  $users->first_name = is_null($request->firstname) ? $users->first_name : $request->firstname;
  $users->last_name = is_null($request->last_name) ? $users->last_name : $request->last_name;;
  $users->email = is_null($request->email) ? $users->email : $request->email;;
  $users->mobile = is_null($request->phone) ? $users->mobile : $request->phone;;
  $users->save();

  
  $users=app_user::get();
  $data= json_decode($users, true);          
  return view('user_data', compact('data'));

  
}


public function deleteUser(Request $request) {
  $id = $request->id;
  if(app_user::where('id', $id)->exists()) {
    $app_user = app_user::find($id);
    $app_user->delete();

    return true;

  // $users=app_user::get();
  // $data= json_decode($users, true);          
  // return view('user_data', compact('data'));
  }
}

  

 
}