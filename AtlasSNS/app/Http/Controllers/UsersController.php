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
        $images = $request->file('images')->getClientOriginalName();
        $image = $request->file('images')->storeAs('public/images',$images);
        // rename($image, $images);

        if(empty($images)){
            $images = 'Atlas.png';
        }

        User::where('id', Auth::id())->update([
            'username' => $username,
            'mail' => $mail,
            'password' => $password,
            'bio' => $bio,
            'images' => $images,
        ]);

        return redirect()->action('PostsController@index');
    }

    public function search(){
        return view('users.search');
    }
}
