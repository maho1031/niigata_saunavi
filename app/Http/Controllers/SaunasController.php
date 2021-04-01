<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\City;
use App\Models\Sauna;
use App\Models\Holiday;
use App\Models\SaunaTag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSauna;
use App\Models\SaunaReview;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SaunasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tagList = Tag::all();
        $cities = City::all();


        $city_id = $request->city_id;
        $tag_ids = $request->tag_id;
        $sort_id = $request->sort_id;

        
    //    dd($sort_id);
         // 検索フォーム用
         $query = Sauna::query();

        //  地域検索
         if(!empty($city_id)){
                $query->where('city_id', $city_id);
         
         }

        //  タグ検索
         if(!empty($tag_ids)){
            $query->whereIn('id', $this->getSaunaIdByTags($tag_ids));
         }

         

        //  並び替え
         if($sort_id == 1 ){
            $saunas = $query->withCount('reviews')->orderBy('reviews_count','desc')->orderBy('updated_at','desc')->paginate(10);
            
         }else{
            $saunas = $query->orderBy('updated_at','desc')->paginate(10);
         }


        //  dd($query);

        //  $tags = $saunas->tags->pluck('id')->toArray();


        return view('sauna.index', compact('saunas', 'tagList', 'cities', 'city_id', 'tag_ids', 'sort_id'));
    }

    public function getSaunaIdByTags($tag_ids)
    {
        $query = SaunaTag::query();

        foreach($tag_ids as $id){
            $query->orWhere('tag_id', $id);
        }

        // sauna_idをキーにしてコレクションの全値を取得
        return $query->get()->pluck('sauna_id');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $cities = City::all();
        $holidays = Holiday::all();
        $tags = Tag::all();

        return view('sauna.create', compact('cities', 'holidays','tags'));
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSauna $request)
    {
        $sauna = new Sauna;

        $sauna->fill($request->all());



        // 送信された画像を格納
        $sauna_img = $request->file('pic1');
        

        if($sauna_img){
            // 元のファイルから拡張子を取ってくる
            $file_ext = $sauna_img->getClientOriginalExtension();

            // 画像のサイズを変更
            $img = \Image::make($sauna_img);
            $width = 500;
            $img->resize($width, null, function($constraint){
                $constraint->aspectRatio();
            });

            //画像名をランダムな文字列に変換
            $img_path = Str::random(30).'.'.$file_ext;  

            // $img_name = $img_path;
            // 画像のパスを取得
            $save_path = storage_path('app/public/uploads/'.$img_path);
            // storageへ保存
            $img->save($save_path);

            // DBへ保存
            $sauna->pic1 = $img_path;
            // $sauna->save();
        }

        // ユーザーID
        $sauna->user_id = Auth::user()->id;
        $sauna->save();

        // 中間テーブル
        $sauna->tags()->attach(request()->tags);


        return redirect('/')->with('flash_message', '新規登録が完了しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sauna_id)
    {
        // GETパラメータが数字かどうかチェックする
        if(!ctype_digit($sauna_id)){
            return redirect('/')->with('flash_message', __('Invalid operation was performed.'));
        }
        //  $user = Auth::user();
         $sauna = Sauna::find($sauna_id);

        //  $reviews = $sauna->reviews()->get();

         $reviews = Sauna::where('id', $sauna_id)->with('reviews.review_user')->get();
         
        
        //  dd($reviews);

         return view('sauna.show', compact('sauna','reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sauna_id)
    {
        // GETパラメータが数字かどうかチェックする
        if(!ctype_digit($sauna_id)){
            return redirect('/')->with('flash_message', __('Invalid operation was performed.'));
        }
        
        $sauna = Sauna::find($sauna_id);
        $cities = City::all();
        $holidays = Holiday::all();
        $tagList = Tag::all();

        // 該当サウナの持っているタグidを配列にする
        $tags = $sauna->tags->pluck('id')->toArray();

        return view('sauna.edit', compact('sauna', 'cities', 'holidays', 'tagList', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sauna_id)
    {
         // GETパラメータが数字かどうかチェックする
         if(!ctype_digit($sauna_id)){
            return redirect('/')->with('flash_message', __('Invalid operation was performed.'));
        }

        $sauna = Sauna::find($sauna_id);

        $sauna->fill($request->all());

        // 送信された画像を格納
        $sauna_img = $request->file('pic1');
        

        if($sauna_img){
            // 元のファイルから拡張子を取ってくる
            $file_ext = $sauna_img->getClientOriginalExtension();

            // 画像のサイズを変更
            $img = \Image::make($sauna_img);
            $width = 500;
            $img->resize($width, null, function($constraint){
                $constraint->aspectRatio();
            });

            //画像名をランダムな文字列に変換
            $img_path = Str::random(30).'.'.$file_ext;  

            // 画像のパスを取得
            $save_path = storage_path('app/public/uploads/'.$img_path);
            // storageへ保存
            $img->save($save_path);

            // DBへ保存
            $sauna->pic1 = $img_path;
            
        }

        // ユーザーID
        $sauna->user_id = Auth::user()->id;
        $sauna->save();

        // 中間テーブル
        $sauna->tags()->sync(request()->tags);



        return redirect('/')->with('flash_message', '編集が完了しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sauna_id)
    {
         // GETパラメータが数字かどうかチェックする
         if(!ctype_digit($sauna_id)){
            return redirect('/')->with('flash_message', __('Invalid operation was performed.'));
        }

        $sauna = Sauna::find($sauna_id);
        // 中間テーブルの値を削除
        $sauna->tags()->detach();
        $sauna->delete();
        

        return redirect('/')->with('flash_message', '1件削除しました。');
    }

    public function search(Request $request){

        $tagList = Tag::all();
        $cities = City::all();

        $city_id = $request->input('city_id');
        $tag_id = [];
        $tag_ids = $request->input('tag_id');


         // 検索フォーム用
         $query = DB::table('saunas');

         if(!empty($city_id)){
                 $query->where('city_id', $city_id);
         };

         $query->get();
         $saunas = $query->paginate(10);
 
         
         return view('sauna.index', compact('saunas', 'tagList', 'cities'));
    }

    public function review(Request $request){
        

        $review = new SaunaReview;

        $sauna_id = $request->id;
        $review->sauna_id = $request->id;
        // dd($request);

        $review->user_id = Auth::user()->id;
        
        $review->fill($request->all());

        $review->save();

        return redirect()->route('sauna.show', compact('sauna_id'))->with('flash_message', 'レビューを投稿しました！');
    }
}
