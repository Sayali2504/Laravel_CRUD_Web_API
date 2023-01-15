<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use Validator;
use  Illuminate\Support\Facades\DB;

class CategoryController extends ApiController
{

 public function categoryList(Request $request) {
    	
    $search=$request->input('search');
    $orderr=$request->input('order');
    if($orderr=='')
    {
        $order='ASC';
    }else
    {
        $order=$orderr;
    }

 $categories = DB::table('categories');
 $total = $categories->get()->count();
        if($search!='')
        {

            $categories->where('title','like','%'.$search.'%')
            ->orderby('id',$order);

        }
      else if($search =='')
        {
            $categories->orderby('id',$order);
        }
     
       if (array_key_exists('start', $request->all()) && !is_null($request->input('start'))) {

            $offset = $request->input('start');
            if (!$request->input('limit') || empty($request->input('limit'))) {
                $limit = 10;
            } else {
                $limit = $request->input('limit');
            }


            $categories->offset($offset)->limit($limit);
            $temp = $categories->get();
       
        } else {

            $temp = $categories->get();
        }


       return ApiController::apiCollection($temp,$total);

    }

     
}