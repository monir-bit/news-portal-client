<?php

namespace App\Http\Controllers;

use App\Models\SeoModel;
use App\Models\Image;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    function Page(){
        $seo = SeoModel::where('page_name','category')->get();
        return view('Pages.SubCategoryPage',["Seo" => $seo]);
    }
    public function imagedate ($date){
        
         $seo = SeoModel::where('page_name','category')->get();
        $image=Image::where('created_at','like', '%' . $date. '%')->orderBy('created_at','DESC')->get();
        //dd($image);
         return view('Pages.ImagePage',["Seo" => $seo,'image'=>$image]);
    }
}