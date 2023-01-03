<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)//認証済みかどうか
    {
        if (Auth::guard($guard)->check()) {
            return redirect()->route('top');//ログイン済みならredirect('/top')される。
        }

        return $next($request);//guestならmiddlewareで囲まれた次のメソッドを実行する。通常通りのコントローラーが始まる。
        }
}
