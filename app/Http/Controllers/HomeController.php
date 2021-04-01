<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\City;
use App\Models\Sauna;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $tagList = Tag::all();
        $cities = City::all();


        $city_id = $request->city_id;
        $tag_ids = $request->tag_id;
        $sort_id = $request->sort_id;

        
    //    dd($tag_ids);
         // 検索フォーム用
         $query = Sauna::query();


        //  地域検索
         if(!empty($city_id)){
                $query->where('city_id', $city_id);
         
         };

        //  タグ検索
         if($tag_ids){
            $query->whereIn('id', $this->getSaunaIdByTags($tag_ids));
         }

         $saunas = $query->orderBy('created_at','desc')->paginate(4);

        //  並び替え
         if($sort_id == 1 ){
            $saunas = $query->withCount('reviews')->orderBy('reviews_count', 'desc')->paginate(4);
            
         }

        //  $tags = $saunas->tags->pluck('id')->toArray();


        return view('home', compact('saunas', 'tagList', 'cities', 'city_id', 'tag_ids', 'sort_id'));
        // return view('home');
    }
}
