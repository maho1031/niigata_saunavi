<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Sauna;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use App\Http\Requests\StoreUser;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // GETパラメータが数字かどうかチェックする
        // if(!ctype_digit($user_id)){
        //     return redirect('/')->with('flash_message', __('Invalid operation was performed.'));
        // }

        // $user = Auth::user();
        // // dd($user);
        // $saunas = $user->saunas()->get();

        // // $reviews = Sauna::where('id', $sauna_id)->with('reviews.review_user')->get();
        // $reviews = User::where('id', $user_id)->with('user_reviews')->get();

        // dd($reviews);

        // return view('user.show',compact('user', 'saunas', 'reviews'));
        
        return view('user.show');
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // GETパラメータが数字かどうかチェックする
        // if(!ctype_digit($user_id)){
        //     return redirect('/')->with('flash_message', __('Invalid operation was performed.'));
        // }

        // $user = Auth::user()->find($user_id);

        // return view('user.edit', compact('user'));
        return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUser $request)
    {
        // GETパラメータが数字かどうかチェックする
        // if(!ctype_digit($user_id)){
        //     return redirect('/')->with('flash_message', __('Invalid operation was performed.'));
        // }

        $user = Auth::user();

        $user->fill($request->all())->save();

        // 送信された画像を格納
        $user_img = $request->file('prof_pic');
        

        if($user_img){
            // 元のファイルから拡張子を取ってくる
            $file_ext = $user_img->getClientOriginalExtension();

            // 画像のサイズを変更
            $img = \Image::make($user_img);
            $width = 300;
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
            $user->prof_pic = $img_path;
            $user->save();
        }

        // dd($user_img, $request->prof_pic);

        return redirect('/users/show/')->with('flash_message', 'プロフィールを更新しました！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function withDrawal()
    {
        // GETパラメータが数字かどうかチェックする
        // if(!ctype_digit($user_id)){
        //     return redirect('/')->with('flash_message', __('Invalid operation was performed.'));
        // }
        // $user = Auth::user();

        return view('user.destroy');

        // return view('user.destroy',compact('user'));
    }

    public function destroy()
    {
        // GETパラメータが数字かどうかチェックする
        // if(!ctype_digit($user_id)){
        //     return redirect('/')->with('flash_message', __('Invalid operation was performed.'));
        // }

        $user = Auth::user();
        $user->delete();


        return redirect('/');
        // return redirect('/')->with('flash_message', '退会申請が完了しました');
    }
}
