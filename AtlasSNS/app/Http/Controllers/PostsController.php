<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Follow;


class PostsController extends Controller
{
    //
    // public function __construct()//各ページを読み込む前にまず初めに読み込まれる。ログインできていない場合はここで止まり、下記に記述してあるメソッドは実行されない。
    // {
    //     $this->middleware('auth');
    // }



    public function index(Follow $follow){

        //トップページ共通ヘッダー
        $user = Auth::user()->first();

        $following_id = $follow->countFollowing_id(Auth::id());
        $followed_id = $follow->countFollowed_id(Auth::id());
        //dd($following_id);

        //投稿トップページ
        $posts = Post::get();
        // dd($posts);
        return view('posts.index', compact('user', 'posts', 'following_id','followed_id'));

        //フォローリストページ

        //フォロワーリストページ

    }

    public function newPost(Request $request, Post $post){

        $request->validate([
            'newPost' => 'between:1,200',
        ]);

        $post = $request->input('newPost');//$requestでフォーム全体を送り、その中でnameの部分(newPost)を受け取り$postに代入する

        Post::create(['user_id' => Auth::id(), 'post' => $post ]);//左側はpostテーブルのカラム名
         return redirect('top');
    }


}
