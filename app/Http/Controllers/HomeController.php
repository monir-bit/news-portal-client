<?php

namespace App\Http\Controllers;

use App\Models\SeoModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function Page(){
        $seo = SeoModel::where('page_name','home')->get();
        //dd($seo);
        return view('Pages.HomePage',["Seo" => $seo]);
    }
	function Latest(){
        $seo = SeoModel::where('page_name','home')->get();
        //dd($seo);
        return view('Pages.lastupdate',["Seo" => $seo]);
    }
    function Allvideo(Request $request){
            $seo = [
                [
                    'title'=> "breakingnews.com.bd",
                    'share_title'=> "breakingnews.com.bd",
                    'description'=> "breakingnews.com.bd",
                    'keywords' => "breakingnews.com.bd",
                    'page_img' => "https://breakingnews.com.bd/bangla-admin/public/images/2023-05-30/1685386994shahajan-mp-02.jpg",
                ]
            ];
        return view('Pages.Allvideo',["Seo" => $seo]);
    
}
}