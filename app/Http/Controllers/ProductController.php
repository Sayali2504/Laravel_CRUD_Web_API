<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use Validator;
use  Illuminate\Support\Facades\DB;


class ProductController extends ApiController
{

 public function productList(Request $request) {
    	
    $search=$request->input('search');
    $orderr=$request->input('order');
    $category=$request->input('category_id');

    if($orderr=='')
    {
        $order='ASC';
    }else
    {
        $order=$orderr;
    }

 $products = DB::table('products');
 $total = $products->get()->count();
        if($search!='')
        {

            $products->where('product_title','like','%'.$search.'%')
            ->orderby('id',$order);

        }
      else if($search =='')
        {
            $products->orderby('id',$order);
        }
     
        if($category!='')
        {

            $products->where('categories','like','%'.$category.'%');
        }   
        
       if (array_key_exists('start', $request->all()) && !is_null($request->input('start'))) {

            $offset = $request->input('start');
            if (!$request->input('limit') || empty($request->input('limit'))) {
                $limit = 10;
            } else {
                $limit = $request->input('limit');
            }


            $products->offset($offset)->limit($limit);
            $temp = $products->get();
       
        } else {

            $temp = $products->get();
        }


        foreach ($temp as $value) {
$value->featured_img='';
            $featured_img = DB::table('uploads')->where('id', $value->featured_image)->get();
            if (!empty($featured_img) && !is_null($featured_img)) {
               
                foreach ($featured_img as $image) {
                    if (!empty($image->id) && !is_null($image->id)) {
                        $path = DB::table('uploads')->select('path')->where('id', $image->id)->first();
                        $value->featured_img = asset('/public/' . $path->path);
                    }
                }
}
        
} 

       return ApiController::apiCollection($temp,$total);

    }



    public function get_product_details(Request $request) {
    	
        $product_id=$request->input('product_id');
    
      
        $products = DB::table('products')->where('id',$product_id);
        $temp = $products->get();
        $total = count($temp);
            
           return ApiController::apiCollection($temp,$total);
    
        }

     
}