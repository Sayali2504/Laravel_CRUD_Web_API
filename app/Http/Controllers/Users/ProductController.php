<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\products;
use App\Models\Upload;
use App\Models\categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Session;

class ProductController extends Controller
{
    public function product_list(){

      $users=products::get();
      $data= json_decode($users, true);          
      return view('product_list', compact('data'));
      
  }

  public function display_product(Request $request){

    $users=categories::get();
    $data= json_decode($users, true);                 
    return view('display_product', compact('data'));
    
 } 

 public function view_product(Request $request){

  $id= $request->id;
  $users=products::where('id',$id)->get();
  $data= json_decode($users, true);  
  
  $cat=categories::get();
  $category= json_decode($cat, true);      

  return view('view_product', compact('data','category'));
  
} 

 public function add_product(Request $request){

    $validator = Validator::make($request->all(), [
        'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
]);

  $category = $request->category;
  $title = $request->title;
  $file = $request->file;
  $images = $request->images;
  $summernote = $request->summernote;
  $status = $request->status;
  $cat = implode(",",$category);

  $destination = public_path('uploads');

  if ($validator->fails()) {
      return $validator->errors();
  }



  if ($request->hasFile('file')) {
    $file = $request->file('file');
    $extension = $file->getClientOriginalExtension();
    $file_name = strtolower(time() . md5(rand()) . '.' . $extension);
    $filesize = $file->getSize();
    $filepath = "uploads/" . $file_name;
    $filetype = $file->getMimeType();

    if ($file->move($destination, $file_name)) {

        $upload = new Upload();
        $upload->name = $file_name;
        $upload->size = $filesize;
        $upload->type = $filetype;
        $upload->path = $filepath;

        if ($upload->save()) {

          $last_id =  $upload->id;
          
        } else {
           $error = 'Error while aving file';
        }
    } else {
           $error = 'File unable to move on folder';
    }
}


  $users = new products ;
  $users->product_title = $title;
  $users->categories = $cat;
  $users->product_description = $summernote;
  $users->status = $status;
  $users->featured_image =  $last_id;
  $users->product_slug = str_slug($request->title, '-');
  $users->save();

  
  $users=products::get();
      $data= json_decode($users, true);          
      return view('product_list', compact('data'));

  
} 


public function update_product(Request $request){

  $id = $request->id;
  
  $validator = Validator::make($request->all(), [
    'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
]);

$category = $request->category;
$title = $request->title;
$file = $request->file;
$images = $request->images;
$summernote = $request->summernote;
$status = $request->status;
$cat = implode(",",$category);

$destination = public_path('uploads');

if ($validator->fails()) {
  return $validator->errors();
}



if ($request->hasFile('file')) {
$file = $request->file('file');
$extension = $file->getClientOriginalExtension();
$file_name = strtolower(time() . md5(rand()) . '.' . $extension);
$filesize = $file->getSize();
$filepath = "uploads/" . $file_name;
$filetype = $file->getMimeType();

if ($file->move($destination, $file_name)) {

    $upload = new Upload();
    $upload->name = $file_name;
    $upload->size = $filesize;
    $upload->type = $filetype;
    $upload->path = $filepath;

    if ($upload->save()) {

      $last_id =  $upload->id;
      
    } else {
       $error = 'Error while aving file';
    }
} else {
       $error = 'File unable to move on folder';
}
}


$users = products::find($id) ;
$users->product_title = $title;
$users->categories = $cat;
$users->product_description = $summernote;
$users->status = $status;
$users->featured_image =  $last_id;
$users->product_slug = str_slug($request->title, '-');
$users->save();


$users=products::get();
  $data= json_decode($users, true);          
  return view('product_list', compact('data'));


  
}


public function deleteProduct(Request $request) {
  $id = $request->id;
  if(products::where('id', $id)->exists()) {
    $app_user = products::find($id);
    $app_user->delete();

    return true;

  }
}

 
}