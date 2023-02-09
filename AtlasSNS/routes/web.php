<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//ログアウト中のページ
Route::group(["middleware" => "guest"], function() {

// Route::post('login/auth' => 'Auth\LoginController@loginAuth');

//ログイン最初のページ
Route::post('/login', 'Auth\LoginController@login');//ログイン画面からトップページへ
Route::get('/login', 'Auth\LoginController@login');

//ユーザー登録画面
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

//登録完了ページ
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

});

//ログイン中のページ

//投稿トップページ

Route::group(["middleware" => "auth"], function() {

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/top','PostsController@index')->name('top');
Route::post('/top','PostsController@index')->name('top');

Route::get('/top/{id}/postDelete', 'PostsController@postDelete');
Route::post('/top/postEdit', 'PostsController@postEdit');

Route::post('/newPost','PostsController@newPost');


Route::get('/profile','UsersController@profile');
Route::post('/profile/edit', 'UsersController@profileEdit');

Route::get('/{id}/userProfile', 'UsersController@userProfile');

Route::get('/search','UsersController@index');

Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');//フォローする
Route::delete('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');//フォロー解除

Route::post('profile/{user}/profileFollow', 'UsersController@profileFollow');
Route::delete('profile/{user}/profileUnFollow', 'UsersController@profileUnFollow');


Route::get('/follow-list','PostsController@followList');
Route::get('/follower-list','PostsController@followerList');

});