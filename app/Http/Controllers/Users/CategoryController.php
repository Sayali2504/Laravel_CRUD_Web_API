<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Session;

class CategoryController extends Controller
{
    public function category_list(){

      $users=categories::get();
      $data= json_decode($users, true);          
      return view('category_list', compact('data'));
      
  }

  public function display_category(Request $request){

    $id= $request->id;
    $users=categories::where('id',$id)->get();
    $data= json_decode($users, true);          
    return view('add_category', compact('data'));
    
 } 

 public function view_category(Request $request){

  $id= $request->id;
  $users=categories::where('id',$id)->get();
  $data= json_decode($users, true);          
  return view('view_category', compact('data'));
  
} 

 public function add_category(Request $request){

  $title = $request->title;
  $status = $request->status;
 
  $users = new categories ;
  $users->title = $title;
  $users->status = $status;
  $users->slug = str_slug($request->title, '-');
  $users->save();

  
  $users=categories::get();
      $data= json_decode($users, true);          
      return view('category_list', compact('data'));

  
} 


public function update_category(Request $request){

  $title = $request->title;
  $status = $request->status;
  $id = $request->id;

  $users = categories::find($id) ;
  $users->title = is_null($request->title) ? $users->title : $request->title;
  $users->status = is_null($request->status) ? $users->status : $request->status;;
  $users->save();

  
  $users=categories::get();
  $data= json_decode($users, true);          
  return view('category_list', compact('data'));

  
}


public function deleteCategory(Request $request) {
  $id = $request->id;
  if(categories::where('id', $id)->exists()) {
    $app_user = categories::find($id);
    $app_user->delete();

    return true;

  }
}

  

 
}