<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    //protected $redirectTo = '/top';//変更　redirect先の変更できるかな？

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()//guestの場合のみ実行される。ログイン済みならposts/indexに遷移する。(RedirectIfAuthenticated.php)
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    // public function redirectPath()
    // {
    //     return '/top';
    // }

    public function login(Request $request){
        if($request->isMethod('post')){

            $data=$request->only('mail','password');//ログイン認証時に使うカラム
            // ログインが成功したら、トップページへ
            //↓ログイン条件は公開時には消すこと
            if(Auth::attempt($data)){
                return redirect('/top');
            }
        }
        return view("auth.login");//トップページからログインページに移動したとき。GET通信で来る。
    }

    public function logout(){
        Auth::logout();//ログアウトさせる
        return redirect('/login');
      
    }

}
