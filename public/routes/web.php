<?php

use Illuminate\Http\Request;
use App\User;
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
//Route::get('/login_email', ['as' => 'login.email', 'uses' =>'IndexController@loginemail']);

Route::get('/log/{user}', function ($userId, Request $request) {
    if ($request->hasValidSignature()) {

        $user = User::find($userId);
        Auth::login($user);

        return redirect('/chat');

    }
})->name('log');

Auth::routes();

Route::get('/', 'IndexController@index');

Route::get('/chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');


