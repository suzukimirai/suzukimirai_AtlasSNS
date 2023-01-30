<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password', 'bio', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany('App\Post');
    }

    public function following()
    {
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
    }

    public function followed()
    {
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id' );
    }

    public function allusers($id){
        return User::where('id','<>', $id);
    }

    public function search($keyword){
        return User::where('username', 'LIKE', "%{$keyword}%")->Where('id','<>',Auth::id());
    }

    //フォローする
    public function follow(Int $user_id) 
    {
        return $this->following()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->following()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(Int $user_id) 
    {
        return (boolean) $this->following()->where('followed_id', $user_id)->first();
    }

    // フォローされているか
    public function isFollowed(Int $user_id) 
    {
        return (boolean) $this->followed()->where('following_id', $user_id)->first();
    }



}
