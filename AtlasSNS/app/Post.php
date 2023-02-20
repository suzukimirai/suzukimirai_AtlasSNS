<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    //
    protected $fillable = [
        'post',
        'user_id'
    ];


    public function user(){
       return $this->belongsTo('App\User');
    }

    public function postCreate($newPost){
        return Post::create(['user_id' => Auth::id(), 'post' => $newPost ]);
    }

    public function postEdit($editedPost, $post_id){
        return Post::where('id', $post_id)->update(['post' => $editedPost]);
    }

    public function postDelete($id){
        return Post::where('id', $id)->delete();
    }

    //降順 フォローリストの投稿
    public static function followUserPostAsc($id){
        return Post::whereIn('user_id', $id)->orderBy('updated_at', 'desc')->get();
    }

    //降順 ユーザープロフィールの投稿
    public static function userPostAsc($id){
        return Post::where('user_id', $id)->orderBy('updated_at', 'desc')->get();
    }


    //topページの降順
    public static function postAsc($following_id){
        return Post::with('user')->whereIn('user_id',$following_id)->orWhere('user_id',Auth::id())->orderBy('updated_at', 'desc')->get();
    }

}
