<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Follow;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    public function profileEdit(Request $request){

        $request->validate([
            'username' => 'string|between:2,12|required',
            'mail' => 'string|email|between:5,40|required',
            'password' => 'string|between:8,20|required|confirmed',
            'bio' => 'string|max:150|nullable',
            'images' => 'mimes:jpg,png,bmp,gif,svg|nullable',
        ]);

        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        $inputImages = $request->file('images');
        // rename($image, $images);

        if(empty($inputImages)){
            $images = 'Atlas.png';
        }else{
            $images = $request->file('images')->getClientOriginalName();
            $image = $request->file('images')->storeAs('public/images',$images);
        }

        User::where('id', Auth::id())->update([
            'username' => $username,
            'mail' => $mail,
            'password' => bcrypt($password),
            'bio' => $bio,
            'images' => $images,
        ]);

        return redirect()->action('PostsController@index');
    }

    public function userProfile(){
        return view('users.profile');
    }

    public function index(Request $request, User $user){

        $keyword = $request->input('keyword');

        if(!empty($keyword)){//検索フォームに入力されたら

            $users = $user->search($keyword)->get();

        }else{

            $users = $user->allusers(Auth::id())->get();

        }

        return view('users.search', compact('users','keyword'));
    }

    public function follow(User $user){

        $follower = auth()->user();

        $is_following = $follower->isFollowing($user->id);//$followerにisFollolingメソッドを付けるやり方は多対多時に使える！！
        if(empty($is_following)) {//UserモデルのisFollowingメソッドの結果がtrueであれば実行！つまり、フォローしていなければ。
            $follower->follow($user->id);
        }

        return redirect('/search');

    }

    public function unfollow(User $user){

        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!empty($is_following)) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
        }

        return redirect('/search');

    }

}
