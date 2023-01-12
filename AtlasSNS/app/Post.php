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
}
