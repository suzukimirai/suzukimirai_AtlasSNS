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

        // $following_id = $follow->countFollowing_id(Auth::id());
        // $followed_id = $follow->countFollowed_id(Auth::id());
        //dd($user);

        //投稿トップページ

        $following_id = Auth::user()->following()->pluck('followed_id');
        //dd($following_id);
        $posts = Post::with('user')->whereIn('user_id',$following_id)->orWhere('user_id',Auth::id())->get();

        // $posts = Post::get();
        // dd($posts);
        return view('posts.index', compact('posts'));

        //フォローリストページ

        //フォロワーリストページ
    }

    public function followList(){

        $following_id = Auth::user()->following()->pluck('followed_id');//ログインユーザーがフォローしているユーザーのID
        $followuserimages = User::whereIn('id',$following_id)->get();
        $followuserposts = Post::whereIn('user_id',$following_id)->get();
        return view('follows.followlist', compact('followuserimages','followuserposts'));
    }

    public function followerList(){

        $followed_id = Auth::user()->followed()->pluck('following_id');//ログインユーザーがフォローしているユーザーのIID
        $followeruserimages = User::whereIn('id',$followed_id)->get();
        $followeruserposts = Post::whereIn('user_id',$followed_id)->get();

        return view('follows.followerList', compact('followeruserimages','followeruserposts'));
    }

    public function newPost(Request $request, Post $post){

        $request->validate([//$requestで受け取ったものをバリデーションする。
            'newPost' => 'between:1,200',
        ]);

        $newPost = $request->input('newPost');//$requestでフォーム全体を送り、その中でnameの部分(newPost)を受け取り$postに代入する

        $post->postCreate($newPost);
         return redirect('top');
    }

    public function postEdit(Request $request, Post $post){
        $post_id = $request->input('post_id');
        $editedPost = $request->input('post');
        $post->postEdit($editedPost, $post_id);

        return redirect('top');
    }

    public function postDelete($id, Post $post){
        $post->postDelete($id);//PostモデルのpostDeleteメソッドを呼び出している。
        return redirect('top');
    }


}
