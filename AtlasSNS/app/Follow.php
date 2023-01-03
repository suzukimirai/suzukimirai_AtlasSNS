<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    protected $fillable = [
        'following_id',
        'followed_id'
    ];

    public function user(){
        return $this->belongsToMany('App\User');
    }

    public function countFollowing_id (Int $id){
        $following_id = Follow::select('following_id')->where('id', $id)->count();
        //dd($following_id);
    }

    public function countFollowed_id (Int $id){
        $followed_id = Follow::select('followed_id')->where('id', $id)->count();
        //dd($following_id);
    }


}
